<?php

declare(strict_types=1);

namespace App\Http\Controllers\Fs\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $user = auth()->user();
        $user['firstname'] = $this->getOnlyFirstname($user->name);

        return view('fs.panel.profile.index', [
            'user' => $user,
        ]);
    }

    /**
     * @return View
     */
    public function edit(): View
    {
        $user = auth()->user();
        $user['firstname'] = $this->getOnlyFirstname($user->name);

        return view('fs.panel.profile.edit', [
            'user' => $user,
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $user = User::find(auth()->id());
        $user->update($request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,'.$user->id],
        ]));

        return redirect()
            ->route('fs.panel.profile.index')
            ->with('success', 'Profile Successfully Update!');
    }

    /**
     * @param string $fullname
     * @return string
     */
    private function getOnlyFirstname(string $fullname): string
    {
        return explode(' ', $fullname)[0];
    }
}
