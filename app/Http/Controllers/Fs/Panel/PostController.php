<?php

declare(strict_types=1);

namespace App\Http\Controllers\Fs\Panel;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $articles = Article::where('user_id', auth()->id())->paginate(5);

        return view('fs.panel.my-post.index', [
            'articles' => $articles,
        ]);
    }
}
