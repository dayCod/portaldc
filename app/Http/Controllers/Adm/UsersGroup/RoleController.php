<?php

declare(strict_types=1);

namespace App\Http\Controllers\Adm\UsersGroup;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $roles = Role::latest()
            ->where('name', '!=', 'admin')
            ->get();

        return view('adm.ug.role.index', [
            'roles' => $roles
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $actions = [
            'url' => route('adm.role.store'),
            'method' => 'POST',
            'act' => 'Submit'
        ];

        return view('adm.ug.role.form', [
            'actions' => $actions
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        Role::create($request->validate([
            'name' => ['required', 'unique:roles,name']
        ]));

        return redirect()
            ->route('adm.role.index')
            ->with('success', __('notifications.store', ['prop' => 'Role']));
    }

    /**
     * @param string $id
     * @return View
     */
    public function edit(string $id): View
    {
        $actions = [
            'url' => route('adm.role.update', $id),
            'method' => 'PUT',
            'act' => 'Update'
        ];

        $role = Role::where('id', $id)->first();

        return view('adm.ug.role.form', [
            'actions' => $actions,
            'role' => $role
        ]);
    }

    /**
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        Role::where('id', $id)->update($request->validate([
            'name' => ['required', 'unique:roles,name,'.$id]
        ]));

        return redirect()
            ->route('adm.role.index')
            ->with('success', __('notifications.update', ['prop' => 'Role']));
    }

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function delete(string $id): RedirectResponse
    {
        Role::where('id', $id)->delete();

        return redirect()
            ->route('adm.role.index')
            ->with('success', __('notifications.delete', ['prop' => 'Role']));
    }
}
