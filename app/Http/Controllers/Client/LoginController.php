<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\LoginRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index() {
        $check = false;
        $categories = Category::all();
        if (Auth::check()) {
            $check = true;
            return redirect()->route("home.index")->with("success","Bạn đã đăng nhập trước đó");
        }
        return view('client.login.login', [
            'check' => $check,
            'products' => [],
            'categories' => $categories
        ]);
    }

    public function HandleLogin(LoginRequest $request) {
        // Lấy thông tin đăng nhập từ yêu cầu
        $credentials = [
            'email' => $request->input('email-login'),
            'password' => $request->input('password-login')
        ];
    
        
        if (Auth::attempt($credentials, true)) {
            $user = Auth::user();
            if ($user->status === 'active') {
                $request->session()->regenerate();
                return redirect()->route('home.index')->with('success', 'Đăng nhập thành công!');
            } elseif($user->status === 'inactive') {
                Auth::logout();
                return redirect()->back()->with('error', 'Tài khoản của bạn hiện đang tạm dừng!');
            } else {
                Auth::logout(); // Đăng xuất người dùng nếu không phải admin
                return redirect()->back()->with('error', 'Tài khoản của bạn đã bị cấm vĩnh viễn!');
            }
        } else {
            return redirect()->route('login.index')->with('error', 'Tài khoản hoặc mật khẩu không chính xác');
        }
    }
    
}
