<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Ensure the user is authenticated has the 'admin' user_type
        if (Auth::check() && Auth::user()->user_type === 'user'){
            return $next($request);
        }

        // Redirect to the user login page if not a admin
        return redirect()->route('user.login')->with('error','Unauthorized access.');
    }
}

