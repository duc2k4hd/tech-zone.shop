@extends('admin.dashboard.layouts.app');

@section('title', 'Thêm sản phẩm mới')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="card">
                <div class="card-body">
                    <div class="col d-flex justify-content-between">
                        <div class="">
                            <button onclick="window.location.href='{{ route('admin.dashboard.product') }}'" class="btn btn-link">
                                <i class="fa-solid fa-chevron-left"></i> Quay lại trang sản phẩm
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-header">
                <h3 class="fw-bold mb-3">Thêm sản phẩm mới</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa-solid fa-house"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="fa-solid fa-angle-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard.product') }}">Sản phẩm</a>
                    </li>
                    <li class="separator">
                        <i class="fa-solid fa-angle-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tạo sản phẩm mới</a>
                    </li>
                </ul>
            </div>
            <form class="row g-3" action="{{ route('admin.dashboard.product.create.post') }}" method="POST" enctype="multipart/form-data" id="form-create-product" data-url="{{ route('admin.dashboard.product.create.post') }}">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="col">
                            <div class="col-md-12 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>Thông tin chung</h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name-product">Tên sản phẩm</label>
                                                <input type="text" class="form-control" id="name-product" name="name-product" placeholder="Nhập tên sản phẩm..." value="{{ old('name-product') }}" class="@error('name-product') is-invalid @enderror">
                                                @error('name-product')
                                                    <div class="text-danger">* {{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="code-product">Mã sản phẩm</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">#</span>
                                                        <input type="text" class="form-control" id="code-product" name="code-product" placeholder="Nhập mã sản phẩm" value="#{{ old('code-product') }}" class="@error('code-product') is-invalid @enderror">
                                                    </div>
                                                    @error('code-product')
                                                        <div class="text-danger">* {{ $message }} </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mass-product">Khối lượng</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id="mass-product" name="mass-product" placeholder="Nhập khối lượng" value="{{ old('mass-product') }}" class="@error('mass-product') is-invalid @enderror">
                                                        <span class="input-group-text">
                                                            <select class="form-select" name="unit-product" id="" class="@error('unit-product') is-invalid @enderror">
                                                                <option selected value="gam">g</option>
                                                                <option value="kilogram">kg</option>
                                                            </select>
                                                        </span>
                                                    </div>
                                                    @error('mass-product')
                                                        <div class="text-danger">* {{ $message }} </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="price-product">Giá gốc</label>
                                                    <input type="number" class="form-control" id="price-product" name="price-product" placeholder="Nhập giá gốc sản phẩm" value="{{ old('price-product') }}" class="@error('price-product') is-invalid @enderror">
                                                    @error('price-product')
                                                        <div class="text-danger">* {{ $message }} </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="discount-price-product">Giá khuyến mãi</label>
                                                    <input type="number" class="form-control" id="discount-price-product" name="discount-price-product" placeholder="Nhập giá khuyến mãi" value="{{ old('discount-price-product') }}" class="@error('discount-price-product') is-invalid @enderror">
                                                    @error('discount-price-product')
                                                        <div class="text-danger">* {{ $message }} </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="stock-product">Số lượng sản phẩm</label>
                                                    <input type="number" class="form-control" id="stock-product" name="stock-product" placeholder="Nhập số lượng sản phẩm sản phẩm" value="{{ old('stock-product') }}" class="@error('stock-product') is-invalid @enderror">
                                                    @error('stock-product')
                                                        <div class="text-danger">* {{ $message }} </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>Ảnh sản phẩm</h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="image-product">Upload file</label>
                                            <input type="file" class="form-control" id="image-product" name="image-product" placeholder="Upload file" value="{{ old('image-product') }}" class="@error('image-product') is-invalid @enderror">
                                            @error('image-product')
                                                <div class="text-danger">* {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>Thông tin sản phẩm</h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="description-product">Mô tả</label>
                                            <textarea class="form-control" placeholder="Nhập mô tả" id="description-product" rows="5" value="{{ old('description-product') }}" name="description-product" style="height: 100px" class="@error('description-product') is-invalid @enderror"></textarea>
                                            @error('description-product')
                                                <div class="text-danger">* {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>Thuộc tính</h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span style="width: 90px" class="input-group-text">Size</span>
                                                <input type="text" class="form-control" name="size-product" placeholder="Nhập kích thước... Ví dụ: S, M, L, XL,..." value="{{ old('size-product') }}" aria-label="Size" class="@error('size-product') is-invalid @enderror">
                                            </div>
                                            @error('size-product')
                                                <div class="text-danger">* {{ $message }} </div>
                                            @enderror
                                            <div class="input-group">
                                                <span style="width: 90px" class="input-group-text">Màu sắc</span>
                                                <input type="text" class="form-control" name="color-product" placeholder="Nhập màu sắc... Ví dụ: Đen, Trắng,..." value="{{ old('color-product') }}" aria-label="Color" class="@error('color-product') is-invalid @enderror">
                                            </div>
                                            @error('color-product')
                                                <div class="text-danger">* {{ $message }} </div>
                                            @enderror
                                            <div class="input-group">
                                                <span style="width: 90px" class="input-group-text">Chất liệu</span>
                                                <input type="text" class="form-control" name="material-product" placeholder="Chất liệu..." aria-label="Material" value="{{ old('material-product') }}" class="@error('material-product') is-invalid @enderror">
                                            </div>
                                            @error('material-product')
                                                <div class="text-danger">* {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h2>Thông tin bổ sung</h2>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category-product">Chọn danh mục</label>
                                    <select class="form-select" aria-label="Default select example" id="category-product" name="category-product" class="@error('category-product') is-invalid @enderror">
                                        <option selected>Chọn danh mục</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category-product')
                                        <div class="text-danger">* {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="brand-product">Chọn thương hiệu</label>
                                    <select class="form-select" aria-label="Default select example" id="brand-product" name="brand-product" class="@error('brand-product') is-invalid @enderror">
                                        <option selected>Chọn thương hiệu</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand-product')
                                        <div class="text-danger">* {{ $message }} </div>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label for="tags-product">Thêm từ khóa tìm kiếm</label>
                                    <input type="text" class="form-control" id="tags-product" name="tags-product" placeholder="Nhập tag... Ví dụ: #ao, #quan, #giay...">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">lưu sản phẩm</button>
            </form>                      
        </div>
    </div>
@endSection