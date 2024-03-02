<?php

declare(strict_types=1);

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
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
        return view('adm.index');
    }
}
