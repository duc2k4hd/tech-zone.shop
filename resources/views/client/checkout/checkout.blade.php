@extends('client.layout')

@section('title', 'Điền thông tin thanh toán')

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">Trang chủ</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>Thông tin đơn hàng</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

     <!--shopping cart area start -->
    <div class="my-lg-5">
        <form action="" method="post">
            <div class="row">
                <div class="col-sm-7 col-lg-7 col-md-7">
                    <h1>Thông tin thanh toán</h1>
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="inputName" class="form-label">Tên</label>
                            <input type="text" class="form-control" id="inputName" placeholder="Đức Nobi">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Số điện thoại</label>
                            <input type="tel" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col-md-12">
                            <label for="inputProvince" class="form-label">Tỉnh/Thành phố</label>
                            <div>
                                <select name="province" class="form-select form-select-sm select_scroll province" aria-label="Default select example" id="inputProvince">
                                    <option value="disabled">Chọn Tỉnh/Thành phố</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="inputDistrict" class="form-label">Quận/Huyện</label>
                            <div class="mb-3">
                                <select disabled class="form-select form-select-sm select_scroll district" name="district" id="inputDistrict">
                                    <option>Chọn Quận/Huyện</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="inputWard" class="form-label">Xã/Phường</label>
                            <div class="mb-3">
                                <select disabled class="form-select form-select-sm select_scroll ward" name="ward" id="inputWard">
                                    <option>Chọn Xã/Phường</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="inputStreet" class="form-label">Phố</label>
                            <div class="mb-3">
                                <select disabled class="form-select form-select-sm select_scroll street" name="street" id="inputStreet">
                                    <option>Chọn Phố</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="inputHouseNumber" class="form-label">Số nhà/Ngõ/Ngách (Nếu có)</label>
                            <input disabled type="text" class="form-control house-number" id="inputHouseNumber" placeholder="Số nhà/Ngõ/Ngách (Nếu có)">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <h1>Thông tin sản phẩm</h1>
                </div>
            </div>
            <button type="submit" class="btn btn-primary col-12 my-lg-4" style="height: 45px; border-radius: 5px; cursor: pointer">Tạo hóa đơn</button>
        </form>
     </div>
     <!--shopping cart area end -->
@endsection

@section('script')
    
@endsection