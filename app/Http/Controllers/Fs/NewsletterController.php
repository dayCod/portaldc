<?php

declare(strict_types=1);

namespace App\Http\Controllers\Fs;

use App\Http\Controllers\Controller;
use App\Mail\Fs\FirstSubscriptionMail;
use App\Models\Subscriber;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('fs.subs');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function submit(Request $request): RedirectResponse
    {
        $subscriber = Subscriber::create($request->validate([
            'email' => ['required', 'email']
        ]));

        Mail::to($subscriber->email)
            ->send(new FirstSubscriptionMail($subscriber->email));

        return redirect()
            ->back()
            ->with('success', 'Thanks For Your Subscription');
    }
}
