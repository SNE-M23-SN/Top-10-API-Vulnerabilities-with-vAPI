<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class LogHttpRequestResponse
{
    public function handle($request, Closure $next)
    {
        // Log request details
        Log::channel('json')->info('Request:', [
            'method' => $request->getMethod(),
            'url' => $request->fullUrl(),
            'headers' => $request->headers->all(),
            'body' => $request->all()
        ]);

        // Get the response
        $response = $next($request);

        // Log response details
        Log::channel('json')->info('Response:', [
            'status' => $response->status(),
            'headers' => $response->headers->all(),
            'body' => $response->getContent()
        ]);

        return $response;
    }
}
