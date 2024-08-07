@extends('client.layout')

@section('title', 'Giỏ hàng')

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">Trang chủ</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>Giỏ hàng</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->



     <!--shopping cart area start -->
    <div class="">
        <div class="row">
            <div class="col-12">
                <div class="mt-3 mb-3">
                    <div class="">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="text-center fw-bold">
                                    <th>Chọn</th>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Kích thước</th>
                                    <th>Màu sắc</th>
                                    <th>Tổng tiền</th>
                                    <th colspan="2">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <form action="{{ route('cart.update') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id_cart" value="{{ $cart->cart_id }}">
                                        <input type="hidden" name="id_product" value="{{ $cart->product_id }}">
                                        <tr class="text-center">
                                            <td>
                                                <label class="cl-checkbox">
                                                    <input class="checkbox-cart" type="checkbox" value="{{ $cart->discounted_price * $cart->quantity }}-{{ $cart->name }}">
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td><a href="#"><img width="60" height="70" src="{{ asset('assets/img/'. $cart->img_path) }}" alt=""></a></td>
                                            <td><a class="product-name" href="#">{{ $cart->name }}</a></td>
                                            <td class="fs-2 text-primary fw-bolder">{{ number_format($cart->discounted_price, 0, ',', '.') }}đ</td>
                                            <td><input  value="{{ $cart->quantity }}" type="number" name="quantity"></td>
                                            <td>
                                                <select name="size" id="">
                                                    <option selected value="{{ $cart->cart_size }}">{{ $cart->cart_size }}</option>
                                                    @foreach (json_decode($cart->size) as $size)
                                                        @if ($size !== $cart->cart_size)
                                                            <option value="{{ $size }}">{{ $size }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="color" id="">
                                                    <option selected value="{{ $cart->cart_color }}">{{ $cart->cart_color }}</option>
                                                    @foreach (json_decode($cart->color) as $color)
                                                        @if ($color !== $cart->cart_color)
                                                            <option value="{{ $color }}">{{ $color }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="fs-2 text-primary fw-bold"><span class="product-price">{{ number_format($cart->discounted_price * $cart->quantity, 0, ',', '.') }}</span>đ</td>
                                            <td><input class="btn btn-primary btn-rounded" type="submit" value="Cập nhật"></td>
                                            <td><a class="btn btn-danger" href="">Xóa</a></td>
                                        </tr>
                                    </form>
                                @endforeach
                            </tbody>
                        </table>   
                    </div>  
                    <div class="">
                        <input type="checkbox" hidden class="btn-check checkbox-all-cart" id="checkbox-all-cart" autocomplete="off">
                        <label class="btn btn-outline-primary" for="checkbox-all-cart">Chọn tất cả</label>
                    </div>      
                </div>
                </div>
            </div>
            <!--coupon code area start-->
        <div class="coupon_area">
            <div class="row">
                {{-- <div class="col-lg-6 col-md-6">
                    <div class="coupon_code">
                        <h3>Shop Voucher</h3>
                        <div class="coupon_inner">   
                            <p>Nhập mã phiếu giảm giá của bạn (nếu có).</p>                                
                            <input placeholder="Nhập mã giảm giá..." type="text">
                            <button disabled type="submit">Sử dụng</button>
                        </div>    
                    </div>
                </div> --}}
                <div class="col-lg-12 col-md-12">

                    <form action="" method="post">
                        <div class="coupon_code">
                            <h3>Kiểm tra</h3>
                            <div class="coupon_inner">
                                <div class="cart_items">
                                    <div class="cart_subtotal d-block">
                                        <p style="font-size: 25px">Thông tin:</p>
                                        <div class="show_info">
                                            
                                        </div>
                                    </div>
                                    {{-- <div class="cart_subtotal">
                                        <p>Thành tiền</p>
                                        <p class="cart_amount">0</p>
                                    </div> --}}
                                </div>
                                {{-- <div class="cart_subtotal">
                                    <p>Phí ship</p>
                                    <p class="cart_shipping"><span></span>0</p>
                                </div> --}}
                                {{-- <a class="text-danger">Tiết kiệm được: <span>0</span></a> --}}
                                <hr>
                                <div class="cart_subtotal">
                                    <p style="font-size: 25px">Tổng thanh toán</p>
                                    <p class="cart_total text-danger fs-1">0</p>
                                    <input hidden class="total_hidden" value="0" type="text" name="subtotal" id="">
                                </div>
                                <div class="checkout_btn">
                                    <button type="submit">Kiểm tra</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!--coupon code area end-->
     </div>
     <!--shopping cart area end -->
@endsection

@section('script')
    
@endsection