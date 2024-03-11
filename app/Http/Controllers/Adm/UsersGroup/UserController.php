<?php

declare(strict_types=1);

namespace App\Http\Controllers\Adm\UsersGroup;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $users = User::latest()
            ->with('role')
            ->whereHas('role', fn ($query) => $query->where('name', '!=', Role::ADMIN))
            ->get();

        return view('adm.ug.user.index', [
            'users' => $users,
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $actions = [
            'url' => route('adm.user.store'),
            'method' => 'POST',
            'act' => 'Submit'
        ];

        $roles = Role::latest()
            ->where('name', '!=', Role::ADMIN)
            ->get();

        return view('adm.ug.user.form', [
            'actions' => $actions,
            'roles' => $roles,
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $user = User::create($request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'role_id' => ['required', 'string', 'exists:roles,id']
        ]) + ['email_verified_at' => now()]);

        return redirect()
            ->route('adm.user.index')
            ->with('success', __('notifications.store', ['prop' => 'User']));
    }

    /**
     * @param string $id
     * @return View
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->first();
        $roles = Role::latest()
            ->where('name', '!=', Role::ADMIN)
            ->get();

        $actions = [
            'url' => route('adm.user.update', $id),
            'method' => 'PUT',
            'act' => 'Update'
        ];

        return view('adm.ug.user.form', [
            'user' => $user,
            'actions' => $actions,
            'roles' => $roles,
        ]);
    }

    /**
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $user = User::where('id', $id)->first();
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,'.$id],
            'password' => ['nullable', 'string', 'min:8'],
            'role_id' => ['required', 'string', 'exists:roles,id']
        ]);
        $data['password'] ??= $user->password;
        $user->update($data);

        return redirect()
            ->route('adm.user.index')
            ->with('success', __('notifications.update', ['prop' => 'User']));
    }

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function delete(string $id): RedirectResponse
    {
        User::where('id', $id)->delete();

        return redirect()
            ->route('adm.user.index')
            ->with('success', __('notifications.delete', ['prop' => 'User']));
    }
}
