<?php

declare(strict_types=1);

namespace App\Http\Controllers\Fs\Auth;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('fs.auth.login');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()
                ->route('fs.post.index')
                ->with('success', 'Login Successfully!');
        }

        return redirect()
            ->back()
            ->with('fail', 'Please Enter Correct Email / Password!');
    }
}
