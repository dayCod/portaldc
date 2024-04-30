<?php

declare(strict_types=1);

namespace App\Http\Controllers\Fs;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $articles = Article::latest();

        if ($request->ctg == "original") {
            $articles = $articles->where('categories', 0)->paginate(5);
        } elseif ($request->ctg == "social") {
            $articles = $articles->where('categories', 1)->paginate(5);
        } else {
            $articles = $articles->paginate(5);
        }

        return view('fs.index', [
            'articles' => $articles
        ]);
    }

    /**
     * @param string $slug
     * @return View
     */
    public function detail(string $slug): View
    {
        $article = Article::where('slug', $slug)->first();

        Article::updateStatsField($article->id, 'views_counter', 1);

        return view('fs.detail', ['article' => $article]);
    }
}
