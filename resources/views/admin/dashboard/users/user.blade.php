@extends('admin.dashboard.layouts.app');

@section('title', 'Quản lí người dùng')

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
                    data-bs-toggle="modal"
                    data-bs-target="#addRowModal"
                  >
                    <i class="fa fa-plus"></i>
                    Tạo người dùng mới
                  </button>
                </div>
            </div>
        </div>
    </div>
      <div class="page-header">
        <h3 class="fw-bold mb-3">Quản lí người dùng</h3>
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
              <a href="#">Người dùng</a>
          </li>
          </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            {{-- <div class="card-header">
              <h4 class="card-title">Người dùng</h4>
            </div> --}}
            <div class="card-body">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                    <h4 class="card-title">Danh sách người dùng</h4>
                  </div>
                </div>
                <div class="card-body">
                  <!-- Modal -->
                  <div
                    class="modal fade"
                    id="addRowModal"
                    tabindex="-1"
                    role="dialog"
                    aria-hidden="true"
                  >
                    <div class="modal-dialog" role="">
                      <div class="modal-content">
                        <div class="modal-header border-0">
                          <h1 class="modal-title text-center">
                            Đăng kí người dùng mới
                          </h1>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('admin.dashboard.user.new-user') }}" method="POST">
                            @csrf
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                  <label>Email</label>
                                  <input
                                    id=""
                                    type="text"
                                    name="email"
                                    class="form-control"
                                    placeholder="Nhập email..."
                                    class="@error ('email') is-invalid @enderror"
                                  />
                                </div>
                                @error('email')
                                  <p class="text-danger fst-italic fs-6">* {{ $message }}</p>
                                @enderror
                              </div>
                              <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                  <label>Mật khẩu</label>
                                  <input
                                    id=""
                                    type="password"
                                    type="text"
                                    name="password"
                                    class="form-control"
                                    placeholder="Nhập mật khẩu..."
                                    class="@error ('password') is-invalid @enderror"
                                  />
                                </div>
                                @error('password')
                                  <p class="text-danger fst-italic fs-6">* {{ $message }}</p>
                                @enderror
                              </div>
                              <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                  <label>Nhập lại mật khẩu</label>
                                  <input
                                    id=""
                                    type="password"
                                    type="text"
                                    name="re-password"
                                    class="form-control"
                                    placeholder="Nhập lại mật khẩu..."
                                    class="@error ('re-password') is-invalid @enderror"
                                  />
                                </div>
                                @error('re-password')
                                  <p class="text-danger fst-italic fs-6">* {{ $message }}</p>
                                @enderror
                              </div>
                            </div>
                            <input type="submit" value="Thêm" class="btn btn-primary">
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->


                  {{-- Start Table --}}
                    <div class="table-responsive">
                      <table id="basic-datatables" class="display cell-border table table-striped table-hover order-column row-border">
                        <thead>
                          <tr>
                            <th>Họ và Tên</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Sinh nhật</th>
                            <th>Vai trò</th>
                            <th>Tác vụ</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Họ và Tên</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Sinh nhật</th>
                            <th>Vai trò</th>
                            <th colspan="2">Tác vụ</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($allUsers as $user)
                            <tr>
                              <td>{{ $user->full_name }}</td>
                              <td>{{ $user->address }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->birthday }}</td>
                              <td>{{ $user->role }}</td>
                              <td>
                                <div class="form-button-action">
                                  <button type="button" class="btn btn-link btn-primary btn-lg" >
                                    <i class="fa fa-edit"></i>
                                  </button>
                                  <button data-bs-toggle="modal" data-bs-target="#userID-{{ $user->id }}" type="button" class="btn btn-danger btn-round" >
                                    Xóa
                                  </button>
                                  <!-- Modal -->
                                  <div class="modal fade " id="userID-{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Cảnh báo!</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          Bạn có chắc chắn muốn xóa tài khoản: <strong class="text-danger">{{ $user->email }}</strong> không?
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                          <button onclick="window.location.href='{{ route('admin.dashboard.user.delete-user', $user->id) }}'" type="button" class="btn btn-danger">Xóa</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  $(document).ready(function () {
    $("#basic-datatables").DataTable({
      pageLength: ,
      
    }).search(this.value).draw();
  });
@endSection