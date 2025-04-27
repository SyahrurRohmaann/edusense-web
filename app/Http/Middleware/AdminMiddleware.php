<?php
// app/Http/Middleware/AdminMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
{
    if (Auth::check() && User::isAdmin()) {
        return $next($request);
    }
    
    return redirect('/')->with('error', 'You do not have access to this page.');
}

}