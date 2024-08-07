<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Admin\User\Role;

class DashboardController extends Controller {
    public function index() {
        if (Auth::check()) {
            return view('admin.dashboard.dashboard', [
                'baseUrl' => env("BASE_URL") .'resources/views/admin/dashboard/',
                'user' => User::find(Auth::id())
            ]);
        } else {
            return redirect()->route('admin.login')->with('error', 'Vui lòng sử dụng tài khoản Admin để sử dụng chức năng này!');
        }
    }
}
