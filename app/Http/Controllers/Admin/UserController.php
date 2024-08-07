<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    public function index() {
        if (Auth::check() ) {
            return view('admin.dashboard.users.user', [
                'baseUrl' => env("BASE_URL") .'resources/views/admin/dashboard/',
                'user' => User::find(Auth::id()),
                'allUsers' => User::all(),
            ]);
        } else {
            return redirect()->route('admin.login')->with('error', 'Vui lòng đăng nhập để sử dụng chức năng này!');
        }
    }

    public function CreateUser(RegisterRequest $request) {
        if (Auth::check()) {
            $email = $request->input('email');
            $password = Hash::make($request->input('password'));

            try {
                DB::table('users')->insert([
                    'email' => $email,
                    'password' => $password,
                ]);
            
                // Thực hiện hành động thành công nếu cần thiết
            
                return redirect()->route('admin.dashboard.users.user')->with('success', 'Thêm người dùng thành công.');
            } catch (QueryException $e) {
                // Xử lý lỗi khi insert vào cơ sở dữ liệu không thành công
                return redirect()->route('admin.dashboard.users.user')->with('error', 'Thêm người dùng thất bại. Lỗi: ' . $e->getMessage());
            }
        } else {
            return redirect()->route('admin.login')->with('error', 'Vui bạn đăng nhập để sử dụng chức năng này!');
        }
    }

    public function DeleteUser($id) {
        try {
            $user = User::find($id);

            // Kiểm tra vai trò của người dùng và xử lý tương ứng
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard.user')->with('error', 'Không thể xóa người dùng admin!');
                    break;
                case 'staff':
                    return redirect()->route('admin.dashboard.user')->with('error', 'Không thể xóa người dùng nhân viên!');
                    break;
                default:
                    $user->delete();
                    return redirect()->route('admin.dashboard.user')->with('success', 'Xóa người dùng thành công.');
                    break;
            }
        } catch (\Throwable $th) {
            return redirect()->route('admin.dashboard.user')->with('error', 'Xóa người dùng thất bại.');
        }
    }
}
