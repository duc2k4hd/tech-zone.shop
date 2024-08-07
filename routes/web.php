<?php


use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\Client\CartController as ClientCartController;
use App\Http\Controllers\Client\CheckOutController as ClientCheckOutController;
use App\Http\Controllers\Client\HomeController as ClientHomeController;
use App\Http\Controllers\Client\RegisterController as ClientRegisterController;
use App\Http\Controllers\Client\LoginController as ClientLoginController;
use App\Http\Controllers\Client\LogoutController as ClientLogoutController;
use App\Http\Controllers\Client\PaymentController as ClientPaymentController;
use App\Http\Controllers\Client\ProductController as ClientProductController;


Route::get('/', function () {
    return view('welcome');
});

// Admin
Route::prefix('/admin')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('admin.login');
    Route::get('/login', [AuthController::class, 'index'])->name('admin.login');
    Route::post('/handle-login', [AuthController::class, 'HandleLogin'])->name('admin.handle-login');

    
    Route::prefix('/dashboard')->group(function () {
        // User
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware(AuthMiddleware::class);
        Route::get('/user', [UserController::class, 'index'])->name('admin.dashboard.user');
        Route::post('/user/new-user', [UserController::class, 'CreateUser'])->name('admin.dashboard.user.new-user');
        Route::get('/user/delete-user/{id}', [UserController::class, 'DeleteUser'])->name('admin.dashboard.user.delete-user');

        Route::get('/product', [ProductController::class,'index'])->name('admin.dashboard.product');
        Route::get('/product/create', [ProductController::class,'CreateProduct'])->name('admin.dashboard.product.create');
        Route::post('/product/create/post', [ProductController::class,'PostProduct'])->name('admin.dashboard.product.create.post');
        Route::get('/product/{id}', [ProductController::class,'view'])->name('admin.dashboard.product.view');
        Route::get('/product/edit/{id}', [ProductController::class,'PostProduct'])->name('admin.dashboard.product.edit');
        Route::get('/product/delete/{id}', [ProductController::class,'delete'])->name('admin.dashboard.product.delete-product');
    })->middleware(AuthMiddleware::class);

    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
});


// Phía người dùng
Route::get('/', [ClientHomeController::class, 'index'])->name('home.index');

Route::prefix('/trang-chu')->group(function() {
    Route::get('/', [ClientHomeController::class, 'index'])->name('home.index');
    Route::post('/them-vao-gio-hang', [ClientHomeController::class, 'AddCart'])->name('home.cart.add');
    Route::post('/xoa-gio-hang', [ClientHomeController::class, 'DeleteCart'])->name('home.cart.delete');
});
Route::prefix('/dang-nhap')->group(function() {
    Route::get('/', [ClientLoginController::class, 'index'])->name('login.index');
    Route::post('/xu-li', [ClientLoginController::class, 'HandleLogin'])->name('login.post');
});
Route::get('/dang-ky', [ClientRegisterController::class, 'index'])->name('register.index');
Route::get('/dang-xuat', [ClientLogoutController::class, 'logout'])->name('logout.index');

Route::prefix('san-pham')->group(function() {
    Route::get('/', [ClientProductController::class, 'index'])->name('product.index');
    Route::get('/chi-tiet/{id}', [ClientProductController::class, 'ProductDetail'])->name('product.detail');
});

Route::prefix('/gio-hang')->group(function() {
    Route::get('/', [ClientCartController::class, 'index'])->name('cart.index');
    Route::post('/cap-nhat', [ClientCartController::class, 'UpdateCart'])->name('cart.update');
});

Route::prefix('/kiem-tra')->group(function() {
    Route::get('/', [ClientCheckOutController::class, 'index'])->name('checkout.index');
});