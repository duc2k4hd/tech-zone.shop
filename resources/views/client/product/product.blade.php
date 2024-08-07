@extends('client.product.layoutProduct')

@section('title', 'Trang sản phẩm')
    
@section('content')
    <!--shop tab product-->
    <div class="shop_tab_product">   
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="large" role="tabpanel">
                <div class="row">
                    @php
                        use Carbon\Carbon;
                    @endphp
                    @foreach ($products as $product)
                        @php
                            $daysDifference = Carbon::parse($product->created_at)->diffInDays(Carbon::now());
                        @endphp
                        <div class="col-lg-4 col-md-6">
                            <div class="single_product">
                                <div class="product_thumb">
                                <a href="single-product.html"><img src="{{ asset('assets/img/'. $product->image_path) }}" alt=""></a> 
                                @if ($product->stock <= 0)
                                    <div class="img_icone">
                                        <img src="assets\img\cart\span-out.png" alt="">
                                    </div>
                                @elseif (intval($daysDifference) < 7)
                                    <div class="img_icone">
                                        <img src="assets\img\cart\span-new.png" alt="">
                                    </div>
                                @endif
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
                    @endforeach
                </div>  
            </div>
            <div class="tab-pane fade" id="list" role="tabpanel">
                <div class="product_list_item mb-35">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product_thumb">
                            <a href="single-product.html"><img src="assets\img\product\product2.jpg" alt=""></a> 
                            <div class="hot_img">
                                <img src="assets\img\cart\span-hot.png" alt="">
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-6">
                            <div class="list_product_content">
                            <div class="product_ratting">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                </ul>
                            </div>
                                <div class="list_title">
                                    <h3><a href="single-product.html">Lorem ipsum dolor</a></h3>
                                </div>
                                <p class="design"> in quibusdam accusantium qui nostrum consequuntur, officia, quidem ut placeat. Officiis, incidunt eos recusandae! Facilis aliquam vitae blanditiis quae perferendis minus eligendi</p>

                                <p class="compare">
                                    <input id="select" type="checkbox">
                                    <label for="select">Select to compare</label>
                                </p>
                                <div class="content_price">
                                    <span>$118.00</span>
                                    <span class="old-price">$130.00</span>
                                </div>
                                <div class="add_links">
                                    <ul>
                                        <li><a href="#" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                        <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>                 
            </div>

        </div>
    </div>    
    <!--shop tab product end-->
@endsection

@section('script')
    
@endsection
