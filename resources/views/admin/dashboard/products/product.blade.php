@extends('admin.dashboard.layouts.app');

@section('title', 'Quản lí sản phẩm');

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="card">
                <div class="card-body">
                    <div class="col d-flex justify-content-between">
                        <div class="">
                            <button onclick="window.location.href='{{ route('admin.dashboard.product') }}'" class="btn btn-link">
                                <i class="fa-solid fa-chevron-left"></i> Quay lại trang chủ
                            </button>
                        </div>
                        <div>
                            <button
                                class="btn btn-primary btn-round ms-auto"
                                data-bs-toggle=""
                                data-bs-target=""
                                onclick="window.location.href='{{ route('admin.dashboard.product.create') }}'"
                            >
                                <i class="fa fa-plus"></i>
                                Tạo sản phẩm mới
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-header">
                <h3 class="fw-bold mb-3">Quản lí sản phẩm</h3>
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
                        <a href="#">Sản phẩm</a>
                    </li>
                </ul>
            </div>

            {{-- Start Table --}}
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover cell-border">
                    <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Thương hiệu</th>
                        <th>Giá gốc</th>
                        <th>Giá Khuyễn mãi</th>
                        <th>Kích cỡ</th>
                        <th>Màu sắc</th>
                        <th>Chất liệu</th>
                        <th>Tác vụ</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Mã</th>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Danh mục</th>
                        <th>Thương hiệu</th>
                        <th>Giá gốc</th>
                        <th>Giá Khuyễn mãi</th>
                        <th>Kích cỡ</th>
                        <th>Màu sắc</th>
                        <th>Chất liệu</th>
                        <th colspan="2">Tác vụ</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($products as $product)
                            <tr style="cursor:pointer">
                                <td>{{ $product->code }}</td>
                                <td>
                                    <img class="rounded img-thumbnail" width="70" height="70" src="{{ asset('') }}assets/img/clothes/{{ $product->image_path }}" alt="Ảnh sản phẩm">
                                </td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->category_name }}</td>
                                <td>{{ $product->brand_name }}</td>
                                <td>{{ number_format($product->price, 0, ',', '.') }}đ</td>
                                <td>
                                    @if ($product->discounted_price <= 0)
                                        Không khuyến mại
                                    @else
                                        {{ number_format($product->discounted_price, 0, ',', '.') }}đ
                                    @endif
                                </td>
                                <td style="width: 80px"> 
                                    @php
                                        $sizes = json_decode($product->size);
                                    @endphp
                                    <select class="form-select" name="" id="">
                                        @foreach (is_array($sizes) ? $sizes : [] as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td style="width: 120px"> 
                                    @php
                                        $colors = json_decode($product->color);
                                    @endphp
                                    <select class="form-select" name="" id="">
                                        @foreach (is_array($colors) ? $colors : [] as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>{{ $product->material }}</td>
                                <td>
                                    <div class="form-button-action">
                                    <button type="button" title="Sửa" class="btn btn-link btn-primary btn-lg" >
                                        <a href="{{ route('admin.dashboard.product.edit', $product->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </button>
                                    <button onclick="window.location.href='{{ route('admin.dashboard.product.view', $product->id) }}'" title="Xem chi tiết" type="button" class="btn btn-info btn-round delete-product" >
                                        Xem
                                    </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            {{-- End Table --}}
        </div>
    </div>
@endSection