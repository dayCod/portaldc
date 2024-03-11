<?php

declare(strict_types=1);

namespace App\Http\Controllers\Fs\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        DB::beginTransaction();
        try {
            $role = Role::where('name', Role::WRITER)->first();

            if (empty($role)) {
                $role = Role::create(['name' => Role::WRITER]);
            }

            User::create($request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email'],
                'password' => ['required', 'string', 'min:8'],
            ]) + ['role_id' => $role->id]);

            DB::commit();

            return redirect()
                ->route('fs.login.index')
                ->with('success', 'Registration Complete!');
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()
                ->back()
                ->with('fail', $ex->getMessage());
        }
    }
}
