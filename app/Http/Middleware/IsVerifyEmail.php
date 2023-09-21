<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsVerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
{
    // Check if the authenticated user is a company user and if their email is not verified
    if (!Auth::user()->is_email_verified) {
        auth()->logout();
        return redirect()->route('auth.Company.login.index')
                ->with('message', 'You need to confirm your account. please check your email.');
    }

    return $next($request);
}




}
