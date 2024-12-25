<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class BlockFormSubmission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId = Auth::id();
        $routeName = $request->route()->getName();
        $cacheKey = "form-submit-block-{$userId}-{$routeName}";

        if (Cache::has($cacheKey)) {
            session()->flash("error",'Form submission is blocked. Please wait a few minutes before trying again.');
            return redirect()->back();
        }

        return $next($request);
    }
}
