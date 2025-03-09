<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->usertype !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to access the admin panel.');
        }

        session()->flash('success', 'Welcome to the Admin Panel!');
        
        return $next($request);
    }
}
