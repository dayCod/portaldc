<?php

declare(strict_types=1);

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Role;
use App\Models\Subscriber;
use App\Models\User;
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
            'roles' => Role::where('name', '!=', 'admin')->count(),
            'users' => User::whereHas('role', fn ($q) => $q->where('name', '!=', 'admin'))->count(),
        ];

        return view('adm.index', [
            'counts' => $counts,
        ]);
    }
}
