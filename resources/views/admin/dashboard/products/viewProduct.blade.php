@extends('admin.dashboard.layouts.app');

@section('title', 'Xem chi tiết')

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
                        <div class="d-flex">
                            <div class="ms-3">
                                <button type="button" class="btn btn-danger btn-round" data-bs-toggle="modal" data-bs-target="#deleteProduct">Xóa</button>
                                <!-- Modal -->
                                <div class="modal fade " id="deleteProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Cảnh báo!</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          Bạn có chắc chắn muốn xóa sản phẩm: <strong class="text-danger">{{ $product->name }}</strong> không?
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                          <button onclick="window.location.href='{{ route('admin.dashboard.product.delete-product', $product->id) }}'" type="button" class="btn btn-danger">Xóa</button>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ms-3">
                                <a class="btn btn-primary" href="{{ route('admin.dashboard.product.edit', $product->id) }}">Sửa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-header">
                <h3 class="fw-bold mb-3">Chi tiết sản phẩm</h3>
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
                    <li class="separator">
                        <i class="fa-solid fa-angle-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ $product->name }}</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h2>Thông tin chung</h2>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <dl class="row">
                                    <dt class="col-sm-3">Mã sản phẩm: </dt>
                                    <dd class="col-sm-9">{{ $product->code }}</dd>

                                    <dt class="col-sm-3">Tên sản phẩm: </dt>
                                    <dd class="col-sm-9">{{ $product->name }}</dd>

                                    <dt class="col-sm-3">Khối lượng: </dt>
                                    <dd class="col-sm-9">{{ $product->unit }}</dd>

                                    <dt class="col-sm-3">Kích thước: </dt>
                                    <dd class="col-sm-9">
                                        @php
                                            $sizes = '';
                                        @endphp
                                        @foreach (is_array(json_decode($product->size)) > 0 ? json_decode($product->size) : [] as $item)
                                            @php
                                                $sizes .= $item. ' / ';
                                            @endphp
                                        @endforeach
                                        <span>{{ rtrim($sizes, ' / ') }}</span> 
                                    </dd>

                                    <dt class="col-sm-3">Màu sắc: </dt>
                                    <dd class="col-sm-9">
                                        @php
                                            $color = '';
                                        @endphp
                                        @foreach (is_array(json_decode($product->color)) > 0 ? json_decode($product->color) : [] as $item)
                                            @php
                                                $color .= $item. ' / ';
                                            @endphp
                                        @endforeach
                                        <span>{{ rtrim($color, ' / ') }}</span> 
                                    </dd>

                                    <dt class="col-sm-3">Chất liệu: </dt>
                                    <dd class="col-sm-9">{{ $product->material }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2>Giá sản phẩm</h2>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <dl class="row">
                                    <dt class="col-sm-3">Giá gốc: </dt>
                                    <dd class="col-sm-9">{{ number_format($product->price, 0, ',', '.') }}đ</dd>

                                    <dt class="col-sm-3">Giá khuyến mãi: </dt>
                                    <dd class="col-sm-9">
                                        @if ($product->discounted_price <= 0)
                                            Sản phẩm này không được giảm giá
                                        @else
                                            {{ number_format($product->discounted_price, 0, ',', '.') }}đ
                                        @endif
                                    </dd>
                                </dl>
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
                            <dl class="row">
                                <dt class="col-sm-6">Phân loại: </dt>
                                <dd class="col-sm-6">Sản phẩm Vip</dd>

                                <dt class="col-sm-6">Loại sản phẩm: </dt>
                                <dd class="col-sm-6">{{ $product->category_name }}</dd>

                                <dt class="col-sm-6">Thương hiệu: </dt>
                                <dd class="col-sm-6">{{ $product->brand_name }}</dd>

                                <dt class="col-sm-6">Ngày update: </dt>
                                <dd class="col-sm-6">{{ $product->updated_at }}</dd>
                            </dl>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#descriptionModal">Xem mô tả</button>

                            <!-- Modal -->
                            <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="descriptionModalLabel">Mô tả</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {!! $product->description !!}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"></div>
                    <div class="card">
                        <div class="card-header">
                            <h2>Kho</h2>
                        </div>
                        <div class="card-body">
                            <table id="product-table" class="display cell-border table table-striped table-hover order-column row-border">
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Tồn kho</th>
                                        <th>Có thể bán</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ $product->stock > 0 ? $product->stock : 'Hết hàng' }}</td>
                                    </tr>
                                </tbody>
                                {{-- <tfoot>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Tồn kho</th>
                                        <th>Có thể bán</th>
                                    </tr>
                                </tfoot> --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection