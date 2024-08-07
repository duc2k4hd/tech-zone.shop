
<!DOCTYPE html>
<html lang="en" data-bs-theme="mode">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title')</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link rel="shortcut icon" href="{{ asset('') }}assets/img/techzone/logo-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Fonts and icons -->
    <script src="{{ asset('') }}assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["{{ asset('') }}assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/plugins.min.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/demo.css" />
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="{{ route('admin.dashboard') }}" class="logo">
              <img
                src="{{ asset('') }}assets/img/techzone/logo.png"
                alt="navbar brand"
                class="navbar-brand"
                height="40"
                width="150"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
              <ul class="nav nav-secondary">
                <li class="nav-item active">
                  <a
                    data-bs-toggle="collapse"
                    href="#dashboard"
                    class="collapsed"
                    aria-expanded="false"
                  >
                    <i class="fas fa-home"></i>
                    <p>Bảng điều khiển</p>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse" id="dashboard">
                    <ul class="nav nav-collapse">
                      <li>
                        <a href="">
                          <span class="sub-item">Tổng quát</span>
                        </a>
                      </li>
                      <li>
                        <a href="">
                          <span class="sub-item">Thống kê</span>
                        </a>
                      </li>
                      <li>
                        <a href="">
                          <span class="sub-item">Báo cáo</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-section">
                  <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                  </span>
                  <h4 class="text-section">Dữ liệu</h4>
                </li>
                <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#users">
                    <i class="fa-solid fa-user"></i>
                    <p>Người dùng</p>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse" id="users">
                    <ul class="nav nav-collapse">
                      <li>
                        <a href="{{ route('admin.dashboard.user') }}">
                          <span class="sub-item">Quản lí người dùng</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#products">
                    <i class="fas fa-th-list"></i>
                    <p>Sản phẩm</p>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse" id="products">
                    <ul class="nav nav-collapse">
                      <li>
                        <a href="{{ route('admin.dashboard.product') }}">
                          <span class="sub-item">Quản lí sản phẩm</span>
                        </a>
                      </li>
                      <li>
                        <a href="">
                          <span class="sub-item">Quản lý kho</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#orders">
                    <i class="fa-solid fa-cart-flatbed-suitcase"></i>
                    <p>Đơn hàng</p>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse" id="orders">
                    <ul class="nav nav-collapse">
                      <li>
                        <a href="">
                          <span class="sub-item">Tạo đơn và giao hàng</span>
                        </a>
                      </li>
                      <li>
                        <a href="">
                          <span class="sub-item">Danh sách đơn hàng</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#shipping">
                    <i class="fa-solid fa-truck-fast"></i>
                    <p>Vận chuyển</p>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse" id="shipping">
                    <ul class="nav nav-collapse">
                      <li>
                        <a href="">
                          <span class="sub-item">Tổng quan</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#payment">
                    <i class="fa-solid fa-money-check-dollar"></i>
                    <p>Thanh toán</p>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse" id="payment">
                    <ul class="nav nav-collapse">
                      <li>
                        <a href="">
                          <span class="sub-item">Lịch sử thanh toán</span>
                        </a>
                      </li>
                      <li>
                        <a href="">
                          <span class="sub-item">Phương thức thanh toán</span>
                        </a>
                      </li>
                      <li>
                        <a href="">
                          <span class="sub-item">Hóa đơn</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#depots">
                    <i class="fa-solid fa-chart-line"></i>
                    <p>Báo cáo</p>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse" id="depots">
                    <ul class="nav nav-collapse">
                      <li>
                        <a href="">
                          <span class="sub-item">Báo cáo bán hàng</span>
                        </a>
                      </li>
                      <li>
                        <a href="">
                          <span class="sub-item">Báo cáo kho</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#settings">
                    <i class="fa-solid fa-sliders"></i>
                    <p>Cài đặt</p>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse" id="settings">
                    <ul class="nav nav-collapse">
                      <li>
                        <a href="">
                          <span class="sub-item">Cài đặt chung</span>
                        </a>
                      </li>
                      <li>
                        <a href="">
                          <span class="sub-item">Cài đặt hệ thống</span>
                        </a>
                      </li>
                      <li>
                        <a href="l">
                          <span class="sub-item">Cài đặt email</span>
                        </a>
                      </li>
                      <li>
                        <a href="">
                          <span class="sub-item">Cài đặt thanh toán</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#customers">
                    <i class="fa-solid fa-users-line"></i>
                    <p>Khách hàng</p>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse" id="customers">
                    <ul class="nav nav-collapse">
                      <li>
                        <a href="">
                          <span class="sub-item">Quản lí khách hàng</span>
                        </a>
                      </li>
                      <li>
                        <a href="">
                          <span class="sub-item">Phản hồi khách hàng</span>
                        </a>
                      </li>
                      <li>
                        <a href="">
                          <span class="sub-item">Hỗ trợ khách hàng</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#tools">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                    <p>Công cụ</p>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse" id="tools">
                    <ul class="nav nav-collapse">
                      <li>
                        <a href="">
                          <span class="sub-item">Quản lí API</span>
                        </a>
                      </li>
                      <li>
                        <a href="">
                          <span class="sub-item">Backup & Restore</span>
                        </a>
                      </li>
                      <li>
                        <a href="">
                          <span class="sub-item">Công cụ phát triển</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="widgets.html">
                    <i class="fas fa-desktop"></i>
                    <p>Widgets</p>
                    <span class="badge badge-success">4</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.logout') }}">
                    <i class="fas fa-desktop"></i>
                    <p>Đăng xuất</p>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          </div>
          <!-- End Sidebar -->
        
          <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="index.html" class="logo">
                    <img
                        src="{{ asset('') }}assets/img/kaiadmin/logo_light.svg"
                        alt="navbar brand"
                        class="navbar-brand"
                        height="20"
                    />
                    </a>
                    <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="gg-menu-right"></i>
                    </button>
                    <button class="btn btn-toggle sidenav-toggler">
                        <i class="gg-menu-left"></i>
                    </button>
                    </div>
                    <button class="topbar-toggler more">
                    <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav
                class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
                >
                <div class="container-fluid">
                    <nav
                    class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
                    >
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <button type="submit" class="btn btn-search pe-1">
                            <i class="fa fa-search search-icon"></i>
                        </button>
                        </div>
                        <input
                        type="text"
                        placeholder="Search ..."
                        class="form-control"
                        />
                    </div>
                    </nav>
            
                    <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                    <li
                        class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none"
                    >
                        <a
                        class="nav-link dropdown-toggle"
                        data-bs-toggle="dropdown"
                        href="#"
                        role="button"
                        aria-expanded="false"
                        aria-haspopup="true"
                        >
                        <i class="fa fa-search"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-search animated fadeIn">
                        <form class="navbar-left navbar-form nav-search">
                            <div class="input-group">
                            <input
                                type="text"
                                placeholder="Search ..."
                                class="form-control"
                            />
                            </div>
                        </form>
                        </ul>
                    </li>
                    <li class="nav-item topbar-icon dropdown hidden-caret">
                        <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="messageDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        >
                        <i class="fa fa-envelope"></i>
                        </a>
                        <ul
                        class="dropdown-menu messages-notif-box animated fadeIn"
                        aria-labelledby="messageDropdown"
                        >
                        <li>
                            <div
                            class="dropdown-title d-flex justify-content-between align-items-center"
                            >
                            Lời nhắn
                            <a href="#" class="small">Đánh dấu là đã đọc</a>
                            </div>
                        </li>
                        <li>
                            <div class="message-notif-scroll scrollbar-outer">
                            <div class="notif-center">
                                <a href="#">
                                <div class="notif-img">
                                    <img
                                    src="{{ asset('') }}assets/img/jm_denis.jpg"
                                    alt="Img Profile"
                                    />
                                </div>
                                <div class="notif-content">
                                    <span class="subject">Jimmy Denis</span>
                                    <span class="block"> How are you ? </span>
                                    <span class="time">5 minutes ago</span>
                                </div>
                                </a>
                                <a href="#">
                                <div class="notif-img">
                                    <img
                                    src="{{ asset('') }}assets/img/chadengle.jpg"
                                    alt="Img Profile"
                                    />
                                </div>
                                <div class="notif-content">
                                    <span class="subject">Chad</span>
                                    <span class="block"> Ok, Thanks ! </span>
                                    <span class="time">12 minutes ago</span>
                                </div>
                                </a>
                                <a href="#">
                                <div class="notif-img">
                                    <img
                                    src="{{ asset('') }}assets/img/mlane.jpg"
                                    alt="Img Profile"
                                    />
                                </div>
                                <div class="notif-content">
                                    <span class="subject">Jhon Doe</span>
                                    <span class="block">
                                    Ready for the meeting today...
                                    </span>
                                    <span class="time">12 minutes ago</span>
                                </div>
                                </a>
                                <a href="#">
                                <div class="notif-img">
                                    <img
                                    src="{{ asset('') }}assets/img/talha.jpg"
                                    alt="Img Profile"
                                    />
                                </div>
                                <div class="notif-content">
                                    <span class="subject">Talha</span>
                                    <span class="block"> Hi, Apa Kabar ? </span>
                                    <span class="time">17 minutes ago</span>
                                </div>
                                </a>
                            </div>
                            </div>
                        </li>
                        <li>
                            <a class="see-all" href="javascript:void(0);"
                            >Xem tất cả thư<i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                        </ul>
                    </li>
                    <li class="nav-item topbar-icon dropdown hidden-caret">
                        <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="notifDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        >
                        <i class="fa fa-bell"></i>
                        <span class="notification">4</span>
                        </a>
                        <ul
                        class="dropdown-menu notif-box animated fadeIn"
                        aria-labelledby="notifDropdown"
                        >
                        <li>
                            <div class="dropdown-title">
                            Bạn có 4 thông báo mới
                            </div>
                        </li>
                        <li>
                            <div class="notif-scroll scrollbar-outer">
                            <div class="notif-center">
                                <a href="#">
                                <div class="notif-icon notif-primary">
                                    <i class="fa fa-user-plus"></i>
                                </div>
                                <div class="notif-content">
                                    <span class="block"> New user registered </span>
                                    <span class="time">5 minutes ago</span>
                                </div>
                                </a>
                                <a href="#">
                                <div class="notif-icon notif-success">
                                    <i class="fa fa-comment"></i>
                                </div>
                                <div class="notif-content">
                                    <span class="block">
                                    Rahmad commented on Admin
                                    </span>
                                    <span class="time">12 minutes ago</span>
                                </div>
                                </a>
                                <a href="#">
                                <div class="notif-img">
                                    <img
                                    src="{{ asset('') }}assets/img/profile2.jpg"
                                    alt="Img Profile"
                                    />
                                </div>
                                <div class="notif-content">
                                    <span class="block">
                                    Reza send messages to you
                                    </span>
                                    <span class="time">12 minutes ago</span>
                                </div>
                                </a>
                                <a href="#">
                                <div class="notif-icon notif-danger">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="notif-content">
                                    <span class="block"> Farrah liked Admin </span>
                                    <span class="time">17 minutes ago</span>
                                </div>
                                </a>
                            </div>
                            </div>
                        </li>
                        <li>
                            <a class="see-all" href="javascript:void(0);"
                            >Xem tất cả thư<i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                        </ul>
                    </li>
                    <li class="nav-item topbar-icon dropdown hidden-caret">
                        <a
                        class="nav-link"
                        data-bs-toggle="dropdown"
                        href="#"
                        aria-expanded="false"
                        >
                        <i class="fas fa-layer-group"></i>
                        </a>
                        <div class="dropdown-menu quick-actions animated fadeIn">
                        <div class="quick-actions-header">
                            <span class="title mb-1">Thu mục</span>
                        </div>
                        <div class="quick-actions-scroll scrollbar-outer">
                            <div class="quick-actions-items">
                            <div class="row m-0">
                                <a class="col-6 col-md-4 p-0" href="#">
                                <div class="quick-actions-item">
                                    <div class="avatar-item bg-danger rounded-circle">
                                    <i class="far fa-calendar-alt"></i>
                                    </div>
                                    <span class="text">Calendar</span>
                                </div>
                                </a>
                                <a class="col-6 col-md-4 p-0" href="#">
                                <div class="quick-actions-item">
                                    <div
                                    class="avatar-item bg-warning rounded-circle"
                                    >
                                    <i class="fas fa-map"></i>
                                    </div>
                                    <span class="text">Maps</span>
                                </div>
                                </a>
                                <a class="col-6 col-md-4 p-0" href="#">
                                <div class="quick-actions-item">
                                    <div class="avatar-item bg-info rounded-circle">
                                    <i class="fas fa-file-excel"></i>
                                    </div>
                                    <span class="text">Reports</span>
                                </div>
                                </a>
                                <a class="col-6 col-md-4 p-0" href="#">
                                <div class="quick-actions-item">
                                    <div
                                    class="avatar-item bg-success rounded-circle"
                                    >
                                    <i class="fas fa-envelope"></i>
                                    </div>
                                    <span class="text">Emails</span>
                                </div>
                                </a>
                                <a class="col-6 col-md-4 p-0" href="#">
                                <div class="quick-actions-item">
                                    <div
                                    class="avatar-item bg-primary rounded-circle"
                                    >
                                    <i class="fas fa-file-invoice-dollar"></i>
                                    </div>
                                    <span class="text">Invoice</span>
                                </div>
                                </a>
                                <a class="col-6 col-md-4 p-0" href="#">
                                <div class="quick-actions-item">
                                    <div
                                    class="avatar-item bg-secondary rounded-circle"
                                    >
                                    <i class="fas fa-credit-card"></i>
                                    </div>
                                    <span class="text">Payments</span>
                                </div>
                                </a>
                            </div>
                            </div>
                        </div>
                        </div>
                    </li>
            
                    <li class="nav-item topbar-user dropdown">
                      <a class="dropdown-toggle profile-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <div class="avatar-sm avatar avatar-online">
                              <img src="{{ asset('') }}assets/img/{{ $user->avatar }}" alt="..." class="avatar-img rounded-circle">
                          </div>
                          <span class="profile-username">
                              <span class="op-7">Xin chào,</span>
                              <span class="fw-bold">{{ $user->full_name }}</span>
                          </span>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end dropdown-user fadeIn" aria-labelledby="navbarDropdown">
                          <li>
                              <div class="user-box">
                                  <div class="avatar-lg">
                                      <img src="{{ asset('') }}assets/img/{{ $user->avatar }}" alt="image profile" class="avatar-img rounded">
                                  </div>
                                  <div class="u-text">
                                      <h4 class="fw-bold">{{ $user->full_name }}</h4>
                                      <p class="text-muted">{{ $user->email }}</p>
                                      <a href="" class="btn btn-xs btn-secondary btn-sm">Trang cá nhân</a>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Cài đặt</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="{{ route('admin.logout') }}">Đăng xuất</a>
                          </li>
                      </ul>
                    </li>
                  
                    </ul>
                </div>
                </nav>
                <!-- End Navbar -->
            </div>
        @yield('content')

        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <nav class="pull-left">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="">
                    ❤
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> ❤ </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> ❤ </a>
                </li>
              </ul>
            </nav>
            <div class="copyright">
              &copy 2024, made with <i class="fa fa-heart heart text-danger"></i> by
              <a href="">Tech Zone</a>
            </div>
            <div>
              ❤
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript" async>
        @if(Session::has('error'))
            Swal.fire({
                title: "Thông báo!",
                text: "{{ Session::get('error') }}",
                icon: "error",
                showConfirmButton: false,
                timer: 2000
            })
        @elseif(Session::has('success'))
            Swal.fire({
                title: "Thông báo!",
                text: "{{ Session::get('success') }}",
                icon: "success",
                showConfirmButton: false,
                timer: 2000
            })
        @else()
            Swal.fire({
                title: 'Loading...',
                text: 'Vui không chờ!',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            })
            setTimeout(() => {
                Swal.close();
            }, 500);
        @endif
    </script>
    <!--   Core JS Files   -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Datatables -->
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

    <!-- Data JS -->
    <script src="{{ asset('') }}assets/js/chart.js"></script>
    <script src="{{ asset('') }}assets/js/dashboard.js"></script>
    <script src="{{ asset('') }}assets/js/user.js"></script>
    <script src="{{ asset('') }}assets/js/product.js"></script>
    <script>
        @yield('scripts')
    </script>
  </body>
</html>

