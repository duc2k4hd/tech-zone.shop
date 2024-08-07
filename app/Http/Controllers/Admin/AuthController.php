<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller {
    public function index() {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view("admin.login.login");
    }

    public function HandleLogin(LoginRequest $request) {
        if (User::count() <= 0) {
            return redirect()->route('admin.login')->with('error', 'Tài khoản không tồn tại!');
        }
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        // dd($credentials);
    
        // Xác thực người dùng trước
        if (Auth::attempt($credentials)) {
            // Xác thực thành công, kiểm tra vai trò
            $user = Auth::user(); // Lấy thông tin người dùng đã xác thực
    
            if ($user->role === 'admin') {
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công!');
            } else {
                Auth::logout(); // Đăng xuất người dùng nếu không phải admin
                return redirect()->route('admin.login')->with('error', 'Vui lòng sử dụng tài khoản admin!');
            }
        } else {
            // Xác thực không thành công
            return redirect()->route('admin.login')->with('error', 'Tài khoản hoặc mật khẩu không chính xác!');
        }
        
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success','Đăng xuất thành công');
    }
}
