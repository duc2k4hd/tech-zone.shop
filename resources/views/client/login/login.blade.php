@extends('client.layout')

@section('title', 'Đăng nhập')

@section('content')
<div class="breadcrumbs_area">
    <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">Trang chủ</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>Đăng nhập</li>
                    </ul>

                </div>
            </div>
        </div>
</div>
<!--breadcrumbs area end-->

<!-- customer login start -->
<div class="customer_login">
    <div class="row">
               <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>Đăng nhập</h2>
                        <form action="{{ route('login.post') }}" method="POST" enctype="multipart/form">
                            @csrf
                            <p>   
                                <label>Email <span style="color: red">*</span></label>
                                <input type="text" name="email-login" placeholder="Nhập email...(Ex: admin@gmail.com)" class="@error('email-login') is-invalid @enderror">
                            </p>
                            @error('email-login')
                                <p class="text-danger fst-italic fs-6">* {{ $message }}</p>
                            @enderror
                            <p>   
                                <label>Mật khẩu <span style="color: red">*</span></label>
                                <input type="password" name="password-login" placeholder="Nhập mật khẩu..." class="@error('password-login') is-invalid @enderror">
                            </p>  
                            @error('password-login')
                                <p class="text-danger fst-italic fs-6">* {{ $message }}</p>
                            @enderror 
                            <div class="login_submit">
                                <button type="submit">Đăng nhập</button>
                                <label for="remember">
                                    <input id="remember" type="checkbox">
                                    Nhớ mật khẩu
                                </label>
                                <a href="#">Quên mật khẩu?</a>
                            </div>

                        </form>
                     </div>    
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Đăng ký</h2>
                        <form action="#">
                            <p>   
                                <label>Nhập email  <span  style="color: red">*</span></label>
                                <input type="text" name="email-register">
                             </p>
                             <p>   
                                <label>Mật khẩu <span  style="color: red">*</span></label>
                                <input type="password" name="password-register">
                             </p>
                             <p>   
                                <label>Nhập lại mật khẩu <span  style="color: red">*</span></label>
                                <input type="password" name="repassword-register">
                             </p>
                            <div class="login_submit">
                                <button type="submit">Đăng ký</button>
                            </div>
                        </form>
                    </div>    
                </div>
                <!--register area end-->
            </div>
</div>
<!-- customer login end -->
@endSection