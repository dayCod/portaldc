<?php

declare(strict_types=1);

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Role;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\WebVisitor;
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

        $yearly_visitor_chart = array();

        foreach (WebVisitor::orderBy('created_at', 'asc')->get() as $visitor) {
            $yearly_visitor_chart[] = [
                'year' => $visitor->created_at->format('Y'),
                'month' => $visitor->created_at->format('M-Y'),
                'count' => WebVisitor::whereMonth('created_at', $visitor->created_at->format('m'))->count(),
            ];
        }

        $set_yearly_visitor_chart = collect($yearly_visitor_chart)
            ->unique()
            ->sortBy('year', SORT_NATURAL)
            ->take(12);

        return view('adm.index', [
            'counts' => $counts,
            'yearly_visitor_chart' => $set_yearly_visitor_chart->values()->all(),
        ]);
    }
}
