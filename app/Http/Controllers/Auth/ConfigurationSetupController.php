<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Mail\Fs\GetToken;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PersonalAccessToken;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;

class ConfigurationSetupController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        abort_if(PersonalAccessToken::where('name', 'configuration_setup')
        ->where('last_used_at', '!=', null)
        ->first(), 404);

        return view('adm.auth.config.index');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function sendToken(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            abort_if(PersonalAccessToken::where('name', 'configuration_setup')
            ->where('last_used_at', '!=', null)
            ->first(), 404);

            $pat = PersonalAccessToken::create([
                'name' => 'configuration_setup',
                'token' => Str::upper(Str::random(6)),
                'abilities' => 'configuration',
                'expires_at' => now()->addHour(),
            ]);

            cache()->remember('config-user-info', 60*60*24, function () use ($request) {
                return [
                    'name' => explode('@', $request->email)[0],
                    'email' => $request->email
                ];
            });

            Mail::to($request->email)
                ->send(new GetToken([
                    'email' => $request->email,
                    'token' => $pat->token
                ]));

            DB::commit();

            return redirect()
                ->route('auth.config.token_confirmation_form')
                ->with('Code Successfully Sent to your Mailbox!');
        } catch (\Exception $th) {
            DB::rollBack();

            return redirect()
                ->back()
                ->with('fail', $th->getMessage());
        }
    }

    /**
     * @return View
     */
    public function tokenConfirmationForm(): View
    {
        abort_if(PersonalAccessToken::where('name', 'configuration_setup')
        ->where('last_used_at', '!=', null)
        ->first(), 404);

        return view('adm.auth.config.token-confirmation');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function tokenConfirmation(Request $request)
    {
        DB::beginTransaction();
        try {
            abort_if(PersonalAccessToken::where('name', 'configuration_setup')
            ->where('last_used_at', '!=', null)
            ->first(), 404);

            $pat = PersonalAccessToken::where('token', $request->token)
                ->where('last_used_at', null)
                ->whereTime('expires_at', '>', now())
                ->first();

            if (empty($pat)) {
                return redirect()
                    ->back()
                    ->with('errors', 'Something Went Wrong with Token');
            }

            $pat->update(['last_used_at' => now()]);

            $admin_role = Role::create([
                'name' => 'admin'
            ]);

            $get_user_info = cache()->get('config-user-info');

            User::create([
                'name' => $get_user_info['name'],
                'email' => $get_user_info['email'],
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'role_id' => $admin_role->id
            ]);

            cache()->forget('config-user-info');

            DB::commit();

            return redirect()
                ->route('auth.login')
                ->with('success', 'Configuration Setup Successfully');
        } catch (\Exception $th) {
            DB::rollBack();

            return redirect()
                ->back()
                ->with('errors', $th->getMessage());
        }
    }
}
