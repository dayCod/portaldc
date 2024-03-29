<?php

declare(strict_types=1);

namespace App\Http\Controllers\Fs\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('fs.panel.index');
    }
}
