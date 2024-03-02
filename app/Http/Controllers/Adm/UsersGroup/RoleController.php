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
        return view('adm.ug.role.index');
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $actions = [
            'url' => '',
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
}
