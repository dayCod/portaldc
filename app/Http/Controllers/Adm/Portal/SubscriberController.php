<?php

declare(strict_types=1);

namespace App\Http\Controllers\Adm\Portal;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $subscribers = Subscriber::latest()
            ->get()
            ->unique('email');

        return view('adm.portal.subs.index', [
            'subscribers' => $subscribers,
        ]);
    }

    /**
     * @param string $email
     * @return RedirectResponse
     */
    public function delete(string $email): RedirectResponse
    {
        Subscriber::where('email', $email)->delete();

        return redirect()
            ->back()
            ->with('success', __('notifications.delete', ['prop' => 'Subscriber']));
    }
}
