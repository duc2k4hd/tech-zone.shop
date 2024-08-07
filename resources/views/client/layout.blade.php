<!doctype html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets\img\favicon.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		
		<!-- all css here -->
        <link rel="stylesheet" href="{{ asset('assets/css/client/home/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/client/home/bundle.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/client/home/plugin.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/client/home/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/client/home/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/client/home/responsive.css') }}">
        <script src="{{ asset('assets/js/home/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    </head>
    <body>
            <!-- Add your site or application content here -->
            
            <!--pos page start-->
            <div class="pos_page">
                <div class="container">
                   <!--pos page inner-->
                    <div class="pos_page_inner">  
                       <!--header area -->
                        <div class="header_area">
                               <!--header top--> 
                                <div class="header_top">
                                   <div class="row align-items-center">
                                        <div class="col-lg-6 col-md-6">
                                           <div class="switcher">
                                                <ul>
                                                    <li class="languages"><a href="#"><img src="assets\img\logo\fontlogo.jpg" alt=""> Việt Nam <i class="fa fa-angle-down"></i></a>
                                                        <ul class="dropdown_languages">
                                                            <li><a href="#"><img src="assets\img\logo\fontlogo.jpg" alt=""> English</a></li>
                                                        </ul>   
                                                    </li> 

                                                    <li class="currency"><a href="#"> Tiền tệ : VNĐ <i class="fa fa-angle-down"></i></a>
                                                        <ul class="dropdown_currency">
                                                            <li><a href="#"> Dollar (USD)</a></li>
                                                        </ul> 
                                                    </li> 
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="header_links">
                                                <ul>
                                                    <li><a href="" title="wishlist">Yêu thích</a></li>
                                                    <li><a href="" title="My account">Tài khoản</i></a></li>
                                                    <li><a href="{{ route('cart.index') }}" title="My cart">Giỏ hàng</a></li>
                                                    @if ($check === true)
                                                        <li><a href="{{ route('logout.index') }}" title="Login">Đăng xuất</a></li>
                                                    @else
                                                        <li><a href="{{ route('login.index') }}" title="Login">Đăng nhập</a></li>
                                                    @endif
                                                </ul>
                                            </div>   
                                        </div>
                                   </div> 
                                </div> 
                                <!--header top end-->

                                <!--header middel--> 
                                <div class="header_middel">
                                    <div class="row align-items-center">
                                       <!--logo start-->
                                        <div class="col-lg-3 col-md-3">
                                            <div class="logo">
                                                <a href="index.html"><img src="assets/img/techzone/logo.png" alt=""></a>
                                            </div>
                                        </div>
                                        <!--logo end-->
                                        <div class="col-lg-9 col-md-9">
                                            <div class="header_right_info">
                                                <div class="search_bar">
                                                    <form action="#">
                                                        <input placeholder="Tìm kiếm..." type="text">
                                                        <button type="submit"><i class="fa fa-search"></i></button>
                                                    </form>
                                                </div>
                                                <div class="shopping_cart">
                                                    <a href="#"><i class="fa fa-shopping-cart"></i> <strong>{{ $carts->sum('quantity') }}</strong> sản phẩm - 
                                                        @php
                                                            $total = 0;
                                                            foreach ($carts as $cart) {
                                                                $total += $cart->price * $cart->quantity;
                                                            }
                                                            echo number_format($total, 0, ',', '.');
                                                        @endphp
                                                        <i class="fa fa-angle-down"></i></a>
                                                    <!--mini cart-->
                                                    <div class="mini_cart">
                                                        @foreach ($carts as $cart)
                                                            <div class="cart_item">
                                                                <div class="cart_img">
                                                                    <a href="#"><img src="{{ asset('assets/img/clothes/' . $cart->img_path) }}" alt=""></a>
                                                                </div>
                                                                <div class="cart_info">
                                                                    <a href="#">{{ $cart->name }}</a>
                                                                    <span class="cart_price">{{ number_format($cart->price, 0, ',', '.') }}</span>
                                                                    <span class="quantity">Số lượng: {{ $cart->quantity }}</span>
                                                                </div>
                                                                <div class="cart_remove">
                                                                    <form action="{{ route('home.cart.delete') }}" method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="id" value="{{ $cart->cart_id }}">
                                                                        <button type="submit"><i class="fa fa-times-circle"></i></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        {{-- <div class="shipping_price">
                                                            <span> Shipping </span>
                                                            <span>  $7.00  </span>
                                                        </div> --}}
                                                        <div class="total_price">
                                                            <span> Tổng </span>
                                                            <span class="prices">  {{ number_format($total, 0, ',', '.') }}  </span>
                                                        </div>
                                                        <div class="cart_button">
                                                            <a href="checkout.html"> Kiểm tra</a>
                                                        </div>
                                                    </div>
                                                    <!--mini cart end-->
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>     
                                <!--header middel end-->      
                            <div class="header_bottom">
                                <div class="row">
                                        <div class="col-12">
                                            <div class="main_menu_inner">
                                                <div class="main_menu d-none d-lg-block">
                                                    <nav>
                                                        <ul>
                                                            <li class="{{ (Request::segment(1) === 'trang-chu' || empty(Request::segment(1))) ? 'active' : '' }}"><a href="index.html">Trang chủ</a>
                                                                {{-- <div class="mega_menu jewelry">
                                                                    <div class="mega_items jewelry">
                                                                        <ul>
                                                                            <li><a href="index.html">Home 1</a></li>
                                                                            <li><a href="index-2.html">Home 2</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>  --}}
                                                            </li>
                                                            <li class="{{ Request::segment(1) === 'san-pham' ? 'active' : '' }}"><a href="{{ route('product.index') }}">Sản phẩm</a>
                                                                {{-- <div class="mega_menu jewelry">
                                                                    <div class="mega_items jewelry">
                                                                        <ul>
                                                                            <li><a href="shop-list.html">shop list</a></li>
                                                                            <li><a href="shop-fullwidth.html">shop Full Width Grid</a></li>
                                                                            <li><a href="shop-fullwidth-list.html">shop Full Width list</a></li>
                                                                            <li><a href="shop-sidebar.html">shop Right Sidebar</a></li>
                                                                            <li><a href="shop-sidebar-list.html">shop list Right Sidebar</a></li>
                                                                            <li><a href="single-product.html">Product Details</a></li>
                                                                            <li><a href="single-product-sidebar.html">Product sidebar</a></li>
                                                                            <li><a href="single-product-video.html">Product Details video</a></li>
                                                                            <li><a href="single-product-gallery.html">Product Details Gallery</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>   --}}
                                                            </li>
                                                            @foreach ($categories as $category)
                                                                @if ($category->parent_id === 0)
                                                                    <li class="{{ Request::segment(1) === $category->name ? 'active' : '' }}"><a href="{{ $category->slug }}">{{ $category->name }}</a>
                                                                @endif
                                                                        @foreach ($categories as $category_2)
                                                                            @if ($category_2->parent_id === $category->id)
                                                                                <div class="mega_menu">
                                                                                    <div class="mega_top fix">
                                                                                        <div class="mega_items">
                                                                                            <h3><a href="{{ $category->slug }}">{{ $category->name }}</a></h3>   
                                                                                            <ul>
                                                                                                <li><a href="{{ $category->slug. "/". $category_2->slug }}">{{ $category_2->name }}</a></li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                    {{-- <div class="mega_bottom fix">
                                                                                        <div class="mega_thumb">
                                                                                            <a href="#"><img src="assets\img\banner\banner1.jpg" alt=""></a>
                                                                                        </div>
                                                                                        <div class="mega_thumb">
                                                                                            <a href="#"><img src="assets\img\banner\banner2.jpg" alt=""></a>
                                                                                        </div>
                                                                                    </div> --}}
                                                                                </div>
                                                                            @endif
                                                                        @endforeach
                                                                    </li>
                                                            @endforeach
                                                            <li><a href="">Blog</a>
                                                                {{-- <div class="mega_menu jewelry">
                                                                    <div class="mega_items jewelry">
                                                                        <ul>
                                                                            <li><a href="blog-details.html">blog details</a></li>
                                                                            <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                                                            <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>   --}}
                                                            </li>
                                                            <li><a href="">Liên hệ</a></li>

                                                        </ul>
                                                    </nav>
                                                </div>
                                                <div class="mobile-menu d-lg-none">
                                                    <nav>
                                                        <ul>
                                                            <li><a href="index.html">Home</a>
                                                                <div>
                                                                    <div>
                                                                        <ul>
                                                                            <li><a href="index.html">Home 1</a></li>
                                                                            <li><a href="index-2.html">Home 2</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div> 
                                                            </li>
                                                            <li><a href="shop.html">shop</a>
                                                                <div>
                                                                    <div>
                                                                        <ul>
                                                                            <li><a href="shop-list.html">shop list</a></li>
                                                                            <li><a href="shop-fullwidth.html">shop Full Width Grid</a></li>
                                                                            <li><a href="shop-fullwidth-list.html">shop Full Width list</a></li>
                                                                            <li><a href="shop-sidebar.html">shop Right Sidebar</a></li>
                                                                            <li><a href="shop-sidebar-list.html">shop list Right Sidebar</a></li>
                                                                            <li><a href="single-product.html">Product Details</a></li>
                                                                            <li><a href="single-product-sidebar.html">Product sidebar</a></li>
                                                                            <li><a href="single-product-video.html">Product Details video</a></li>
                                                                            <li><a href="single-product-gallery.html">Product Details Gallery</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>  
                                                            </li>
                                                            <li><a href="#">women</a>
                                                                <div>
                                                                    <div>
                                                                        <div>
                                                                            <h3><a href="#">Accessories</a></h3>
                                                                            <ul>
                                                                                <li><a href="#">Cocktai</a></li>
                                                                                <li><a href="#">day</a></li>
                                                                                <li><a href="#">Evening</a></li>
                                                                                <li><a href="#">Sundresses</a></li>
                                                                                <li><a href="#">Belts</a></li>
                                                                                <li><a href="#">Sweets</a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div>
                                                                            <h3><a href="#">HandBags</a></h3>
                                                                            <ul>
                                                                                <li><a href="#">Accessories</a></li>
                                                                                <li><a href="#">Hats and Gloves</a></li>
                                                                                <li><a href="#">Lifestyle</a></li>
                                                                                <li><a href="#">Bras</a></li>
                                                                                <li><a href="#">Scarves</a></li>
                                                                                <li><a href="#">Small Leathers</a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div>
                                                                            <h3><a href="#">Tops</a></h3>
                                                                            <ul>
                                                                                <li><a href="#">Evening</a></li>
                                                                                <li><a href="#">Long Sleeved</a></li>
                                                                                <li><a href="#">Shrot Sleeved</a></li>
                                                                                <li><a href="#">Tanks and Camis</a></li>
                                                                                <li><a href="#">Sleeveless</a></li>
                                                                                <li><a href="#">Sleeveless</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <div>
                                                                            <a href="#"><img src="assets\img\banner\banner1.jpg" alt=""></a>
                                                                        </div>
                                                                        <div>
                                                                            <a href="#"><img src="assets\img\banner\banner2.jpg" alt=""></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><a href="#">men</a>
                                                                <div>
                                                                    <div>
                                                                        <div>
                                                                            <h3><a href="#">Rings</a></h3>
                                                                            <ul>
                                                                                <li><a href="#">Platinum Rings</a></li>
                                                                                <li><a href="#">Gold Ring</a></li>
                                                                                <li><a href="#">Silver Ring</a></li>
                                                                                <li><a href="#">Tungsten Ring</a></li>
                                                                                <li><a href="#">Sweets</a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div>
                                                                            <h3><a href="#">Bands</a></h3>
                                                                            <ul>
                                                                                <li><a href="#">Platinum Bands</a></li>
                                                                                <li><a href="#">Gold Bands</a></li>
                                                                                <li><a href="#">Silver Bands</a></li>
                                                                                <li><a href="#">Silver Bands</a></li>
                                                                                <li><a href="#">Sweets</a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div>
                                                                            <a href="#"><img src="assets\img\banner\banner3.jpg" alt=""></a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </li>
                                                            <li><a href="#">pages</a>
                                                                <div>
                                                                    <div>
                                                                        <div>
                                                                            <h3><a href="#">Column1</a></h3>
                                                                            <ul>
                                                                                <li><a href="portfolio.html">Portfolio</a></li>
                                                                                <li><a href="portfolio-details.html">single portfolio </a></li>
                                                                                <li><a href="about.html">About Us </a></li>
                                                                                <li><a href="about-2.html">About Us 2</a></li>
                                                                                <li><a href="services.html">Service </a></li>
                                                                                <li><a href="my-account.html">my account </a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div>
                                                                            <h3><a href="#">Column2</a></h3>
                                                                            <ul>
                                                                                <li><a href="blog.html">Blog </a></li>
                                                                                <li><a href="blog-details.html">Blog  Details </a></li>
                                                                                <li><a href="blog-fullwidth.html">Blog FullWidth</a></li>
                                                                                <li><a href="blog-sidebar.html">Blog  Sidebar</a></li>
                                                                                <li><a href="faq.html">Frequently Questions</a></li>
                                                                                <li><a href="404.html">404</a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div>
                                                                            <h3><a href="#">Column3</a></h3>
                                                                            <ul>
                                                                                <li><a href="contact.html">Contact</a></li>
                                                                                <li><a href="cart.html">cart</a></li>
                                                                                <li><a href="checkout.html">Checkout  </a></li>
                                                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                                                <li><a href="login.html">Login</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            
                                                            <li><a href="blog.html">blog</a>
                                                                <div>
                                                                    <div>
                                                                        <ul>
                                                                            <li><a href="blog-details.html">blog details</a></li>
                                                                            <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                                                            <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>  
                                                            </li>
                                                            <li><a href="contact.html">contact us</a></li>

                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <!--header end -->

                        <!--pos page inner start-->

                            @yield('content')

                        <!--pos page inner end-->
            <!--pos page end-->
            
            <!--footer area start-->
            <div class="footer_area">
                <div class="footer_top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer_widget">
                                    <h3>About us</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="footer_widget_contect">
                                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>  19 Interpro Road Madison, AL 35758, USA</p>

                                        <p><i class="fa fa-mobile" aria-hidden="true"></i> (012) 234 432 3568</p>
                                        <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> Contact@plazathemes.com </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer_widget">
                                    <h3>My Account</h3>
                                    <ul>
                                        <li><a href="#">Your Account</a></li>
                                        <li><a href="#">My orders</a></li>
                                        <li><a href="#">My credit slips</a></li>
                                        <li><a href="#">My addresses</a></li>
                                        <li><a href="#">Login</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer_widget">
                                    <h3>Informations</h3>
                                    <ul>
                                        <li><a href="#">Specials</a></li>
                                        <li><a href="#">Our store(s)!</a></li>
                                        <li><a href="#">My credit slips</a></li>
                                        <li><a href="#">Terms and conditions</a></li>
                                        <li><a href="#">About us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer_widget">
                                    <h3>extras</h3>
                                    <ul>
                                        <li><a href="#"> Brands</a></li>
                                        <li><a href="#"> Gift Vouchers </a></li>
                                        <li><a href="#"> Affiliates </a></li>
                                        <li><a href="#"> Specials </a></li>
                                        <li><a href="#"> Privacy policy </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer_bottom">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="copyright_area">
                                    <ul>
                                        <li><a href="#"> about us </a></li>
                                        <li><a href="#">  Customer Service  </a></li>
                                        <li><a href="#">  Privacy Policy  </a></li>
                                    </ul>
                                    <p>Copyright &copy; 2018 <a href="#">Pos Coron</a>. All rights reserved. </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="footer_social text-right">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                        <li><a class="pinterest" href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer area end-->
            
            @foreach ($products as $product)
                <form action="{{ route('home.cart.add') }}" method="post">
                    @csrf
                    <!-- modal area start --> 
                    <div class="modal fade" id="modal_box_{{ $product->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="modal_body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5 col-sm-12">
                                                <div class="modal_tab">  
                                                   <div class="tab-content" id="pills-tabContent">
                                                        @php
                                                            $count_1 = 1;
                                                        @endphp
                                                        <div class="tab-pane fade show active" id="tab0" role="tabpanel">
                                                            <div class="modal_tab_img">
                                                                <a href="#"><img src="assets/img/{{ $product->image_path }}" alt=""></a>    
                                                            </div>
                                                        </div>
                                                        @foreach (is_array(json_decode($product->image_array)) ? json_decode($product->image_array) : [] as $img)
                                                            <div class="tab-pane fade" id="tab{{ $count_1 += 1 }}" role="tabpanel">
                                                                <div class="modal_tab_img">
                                                                    <a href="#"><img src="assets/img/{{ $img }}" alt=""></a>    
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        
                                                    </div>
                                                    <div class="modal_tab_button">
                                                        <ul class="nav product_navactive" role="tablist">
                                                            @php
                                                                $count_2 = 1;
                                                            @endphp
                                                            <li>
                                                                <a class="nav-link active" data-toggle="tab" href="#tab0" role="tab" aria-controls="tab" aria-selected="false"><img src="assets/img/{{ $product->image_path }}" alt=""></a>
                                                            </li>
                                                            @foreach (is_array(json_decode($product->img_arr)) ? json_decode($product->img_arr) : [] as $img)
                                                                <li>
                                                                    <a class="nav-link" data-toggle="tab" href="#tab{{ $count_2 += 1 }}" role="tab" aria-controls="tab{{ $count_2 }}" aria-selected="false"><img src="assets/img/{{ $img }}" alt=""></a>
                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                    </div>    
                                                </div>  
                                            </div> 
                                            <div class="col-lg-7 col-md-7 col-sm-12">
                                                <div class="modal_right">
                                                    <div class="modal_title mb-10">
                                                        <h2>{{ $product->name }}</h2> 
                                                    </div>
                                                    <div class="modal_price mb-10">
                                                        <span class="new_price">{{ number_format($product->discounted_price, 0, ',', '.') }}đ</span>    
                                                        <span class="old_price">{{ number_format($product->price, 0, ',', '.') }}đ</span>    
                                                    </div>
                                                    <div class="modal_content mb-10">
                                                        <p>Mã sản phẩm: {{ $product->code }}</p>
                                                    </div>
                                                    <div class="modal_size mb-15">
                                                    <h2>size</h2>
                                                    <ul>
                                                        <li>
                                                            <select name="product_size" id="">
                                                                <option value="">Chọn size</option>
                                                                @foreach (json_decode($product->size) as $size)
                                                                    <option value="{{ $size }}">{{ $size }}</option>
                                                                @endforeach
                                                            </select>
                                                        </li>
                                                    </ul>
                                                    <h2>Màu sắc</h2>
                                                    <ul>
                                                        <li>
                                                            <select name="product_color" id="">
                                                                <option value="">Chọn màu sắc</option>
                                                                @foreach (json_decode($product->color) as $color)
                                                                    <option value="{{ $color }}">{{ $color }}</option>
                                                                @endforeach
                                                            </select>
                                                        </li>
                                                    </ul>
                                                    </div>
                                                    <div class="modal_description mb-15">
                                                        <p>{{ $product->description }}</p>    
                                                    </div> 
                                                    <div class="modal_add_to_cart mb-15 d-flex align-items-center">
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <input min="1" max="{{ $product->stock }}" value="1" type="number" name="product_quantity">
                                                        <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
                                                    </div> 
                                                    {{-- <div class="modal_social">
                                                        <h2>Share this product</h2>
                                                        <ul>
                                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                        </ul>    
                                                    </div>       --}}
                                                </div>    
                                            </div>    
                                        </div>     
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div> 
                    
                    <!-- modal area end --> 
                </form>
            @endforeach
            
            
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
		
		<!-- all js here -->
        <script src="{{ asset('assets/js/client/vendor/jquery-1.12.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/client/popper.js') }}"></script>
        <script src="{{ asset('assets/js/client/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/client/ajax-mail.js') }}"></script>
        <script src="{{ asset('assets/js/client/plugins.js') }}"></script>
        <script src="{{ asset('assets/js/client/main.js') }}"></script>

        @yield('script')
    </body>
</html>
