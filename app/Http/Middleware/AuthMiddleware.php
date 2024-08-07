<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (User::where('email', Auth::user()->email)->first()->role !== 'admin') {
            Auth::logout();
    
            $request->session()->invalidate();
        
            $request->session()->regenerateToken();
            return redirect()->route('admin.login')->with('error', 'Vui lòng đăng nhập tài khoản ADMIN để sử dụng tính năng này!');
        }

        return $next($request);
    }
}
