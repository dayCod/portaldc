<?php

declare(strict_types=1);

namespace App\Http\Controllers\Fs\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('fs.auth.register');
    }

    /**
     * @param Request $reqeust
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }
}
