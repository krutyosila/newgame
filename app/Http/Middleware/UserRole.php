<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserRole
{
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check()) {
            if (Auth::user()->role == Str::lower($role)) {
                if ((Auth::user()->user && Auth::user()->user->role == 'banned')) {
                    Auth::logout();
                    return redirect(route('login'))->with(['error_msg' => 'Yetkisiz Giriş']);
                }
                return $next($request);
            }
            Auth::logout();
        }
        return redirect(route('login'))->with(['error_msg' => 'Yetkisiz Giriş']);
    }
}
