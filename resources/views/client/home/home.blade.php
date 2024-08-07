
@extends('client.layout')

@section('title', 'Trang chủ')

@section('content')
    <!--pos home section-->
    <div class=" pos_home_section">
        <div class="row pos_home">
            <div class="col-lg-3 col-md-8 col-12">

                <!--categorie menu start-->
                <div class="sidebar_widget catrgorie mb-35">
                    <h3>Danh mục</h3>
                    <ul>
                        @foreach ($categories as $parent)
                            @if ($parent->parent_id === 0)
                                <li class="has-sub">
                                    <a href="#">
                                        <i class="fa fa-caret-right"></i> {{ $parent->name }}
                                    </a>
                                    <ul class="categorie_sub">
                                        @foreach ($categories as $child)
                                            @if ($parent->id == $child->parent_id)
                                                <li><a href="#"> {{ $child->name }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul> 
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <!--banner slider start-->
                <div class="banner_slider slider_1">
                    <div class="slider_active owl-carousel">
                        <div class="single_slider" style="background-image: url(assets/img/slider/slide_1.png)">
                            <div class="slider_content">
                                <div class="slider_content_inner">  
                                    <h1>Women's Fashion</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                    <a href="#">shop now</a>
                                </div>     
                            </div>    
                        </div>
                        <div class="single_slider" style="background-image: url(assets/img/slider/slider_2.png)">
                            <div class="slider_content">
                                <div class="slider_content_inner">  
                                    <h1>New Collection</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                    <a href="#">shop now</a>
                                </div>         
                            </div>         
                        </div>
                        <div class="single_slider" style="background-image: url(assets/img/slider/slider_3.png)">
                            <div class="slider_content">  
                                <div class="slider_content_inner">  
                                    <h1>Best Collection</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                    <a href="#">shop now</a>
                                </div> 
                            </div> 
                        </div>
                    </div>
                </div> 
                <!--banner slider start-->

                <!--new product area start-->
                <div class="new_product_area">
                    <div class="block_title">
                        <h3>Sản phẩm mới</h3>
                    </div>
                    <div class="row">
                        <div class="product_active owl-carousel">
                            @php
                                use Carbon\Carbon;
                            @endphp
                            @foreach ($products as $product)
                                @php
                                    $daysDifference = Carbon::parse($product->created_at)->diffInDays(Carbon::now());
                                @endphp
                                @if ($daysDifference <= 30)
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a href=""><img width="200" height="350" src="assets\img\{{ $product->image_path }}" alt=""></a> 
                                            <div class="img_icone">
                                                <img src="assets\img\cart\span-new.png" alt="">
                                            </div>
                                            <div class="product_action">
                                                <a href="#"> <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
                                            </div>
                                            </div>
                                            <div class="product_content">
                                                <span class="product_price">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                                <h3 class="product_title"><a href="single-product.html">{{ $product->name }}</a></h3>
                                            </div>
                                            <div class="product_info">
                                                <ul>
                                                    <li><a href="#" title=" Thêm vào yêu thích ">Yêu thích</a></li>
                                                    <li><a href="#" data-toggle="modal" data-target="#modal_box_{{ $product->id }}" title=" Xem chi tiết ">Chi tiết</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div>Không có sản phẩm mới</div>
                                @endif
                            @endforeach
                        </div> 
                    </div>       
                </div> 
                <!--new product area start-->  

                <!--featured product start--> 
                <div class="featured_product">
                    <div class="block_title">
                        <h3>Sản phẩm nổi bật</h3>
                    </div>
                    <div class="row">
                        <div class="product_active owl-carousel">
                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                       <a href="single-product.html"><img src="assets\img\product\product7.jpg" alt=""></a> 
                                       <div class="hot_img">
                                           <img src="assets\img\cart\span-hot.png" alt="">
                                       </div>
                                       <div class="product_action">
                                           <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                                       </div>
                                    </div>
                                    <div class="product_content">
                                        <span class="product_price">$60.00</span>
                                        <h3 class="product_title"><a href="single-product.html">Maecenas sit amet</a></h3>
                                    </div>
                                    <div class="product_info">
                                        <ul>
                                            <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>     
                <!--featured product end-->    
            </div>
        </div>  
    </div>
    <!--pos home section end-->
</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->


@endsection

@section('script')
    <script>

    </script>
@endsection