<?php

declare(strict_types=1);

namespace App\Http\Controllers\Adm\Portal;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $articles = Article::latest()->get();

        return view('adm.portal.article.index', [
            'articles' => $articles,
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $actions = [
            'url' => route('adm.article.store'),
            'method' => 'POST',
            'act' => 'Submit'
        ];

        return view('adm.portal.article.form', [
            'actions' => $actions,
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'reference_url' => ['nullable'],
                'description' => ['required', 'string', 'max:255'],
                'long_text' => ['nullable']
            ]);

            if (is_null($data['reference_url']) && is_null($data['long_text'])) return back()->with('fail', 'Both URL & Long Text Can`t be Null');

            $article = Article::create($data + [
                'categories' => Article::ORIGINAL_CATEGORY,
                'user_id' => auth()->id()
            ]);

            if (empty($data['reference_url'])) $article->contentArticle()->create([
                'long_text' => $data['long_text'
            ]]);

            $article->update([
                'reference_url' => empty($data['long_text'])
                    ? $data['reference_url']
                    : route('fs.post.detail', $article->slug),
            ]);

            DB::commit();

            return redirect()
                ->route('adm.article.index')
                ->with('success', __('notifications.store', ['prop' => 'Article']));
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()
                ->back()
                ->with('fail', $ex->getMessage());
        }
    }

    /**
     * @param string $id
     * @return View
     */
    public function edit(string $id): View
    {
        $article = Article::where('id', $id)->first();

        $actions = [
            'url' => route('adm.article.update', $id),
            'method' => 'PUT',
            'act' => 'Update'
        ];

        return view('adm.portal.article.form', [
            'article' => $article,
            'actions' => $actions,
        ]);
    }

    /**
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'reference_url' => ['nullable'],
                'description' => ['required', 'string', 'max:255'],
                'long_text' => ['nullable']
            ]);

            if (is_null($data['reference_url']) && is_null($data['long_text'])) return back()->with('fail', 'Both URL & Long Text Can`t be Null');

            $article = Article::where('id', $id)->first();
            $article = tap($article)->update($data);

            if (empty($data['reference_url'])) {
                $actions = empty($article->contentArticle) ? 'create' : 'update';
                $article->contentArticle()->{$actions}(['long_text' => $data['long_text']]);
            } else {
                $article?->contentArticle()->delete();
            }

            $article->update([
                'reference_url' => empty($data['long_text'])
                    ? $data['reference_url']
                    : route('fs.post.detail', $article->slug),
            ]);

            DB::commit();

            return redirect()
                ->route('adm.article.index')
                ->with('success', __('notifications.update', ['prop' => 'Article']));
        } catch (\Exception $ex) {
            DB::rollBack();

            dd($ex);

            return redirect()
                ->back()
                ->with('fail', $ex->getMessage());
        }
    }

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function delete(string $id): RedirectResponse
    {
        $article = Article::with('contentArticle')
            ->where('id', $id)
            ->first();

        tap($article, function ($article) {
            $article?->contentArticle()->delete();
            $article->delete();
        });

        return redirect()
            ->back()
            ->with('success', __('notifications.delete', ['prop' => 'Article']));
    }
}
