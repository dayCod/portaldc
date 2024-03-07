<?php

declare(strict_types=1);

namespace App\Http\Controllers\Adm\GuestActivities;

use App\Http\Controllers\Controller;
use App\Models\WebVisitor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VisitorLogController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $visitors = WebVisitor::latest()->get();

        return view('adm.gstact.visitor.index', [
            'visitors' => $visitors,
        ]);
    }
}
