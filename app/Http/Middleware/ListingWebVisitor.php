<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\WebVisitor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class ListingWebVisitor
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $cacheName = 'guest:'.$request->getClientIp();

        if (!Cache::has($cacheName)) {
            Cache::remember($cacheName, 60*60*24,
                function () use ($request, $response) {
                    return [
                        'session_id' => session()->getId(),
                        'user_id' => $request->user()->id ?? null,
                        'ip' => $request->getClientIp(),
                        'ajax' => $request->ajax(),
                        'url' => $request->fullUrl(),
                        'payload' => $request->all(),
                        'status_code' => $response->getStatusCode()
                    ];
                }
            );

            WebVisitor::create(Cache::get($cacheName));
        }

        return $response;
    }
}
