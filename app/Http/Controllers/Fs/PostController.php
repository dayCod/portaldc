<?php

declare(strict_types=1);

namespace App\Http\Controllers\Fs;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $reqeust): View
    {
        return view('fs.index');
    }
}
