<?php

declare(strict_types=1);

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Subscriber;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $counts = [
            'articles' => Article::count(),
            'subscribers' => Subscriber::all()->unique('email')->count(),
        ];

        return view('adm.index', [
            'counts' => $counts,
        ]);
    }
}
