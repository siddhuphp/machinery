@extends('frontend.layout')
@section('breadcrum','')
@section('content')

<!--slider area start-->
<section class="slider_section  mb-42">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="slider_area slider_three owl-carousel">
                    <div class="single_slider d-flex align-items-center" data-bgimg="{{ asset('frontend/assets/img/slider/slider7.jpg') }}">
                        <div class="slider_content">
                            <h2>PC200-C</h2>
                            <h1>Used Machines & Exraordinary Performance.</h1>
                            <a class="button" href="shop.html">shop now</a>
                        </div>
                    </div>
                    <div class="single_slider d-flex align-items-center" data-bgimg="{{ asset('frontend/assets/img/slider/slider8.jpg') }}">
                        <div class="slider_content">
                            <h2>Spare Parts</h2>
                            <h1>Larger Catalogue</h1>
                            <a class="button" href="shop.html">shop now</a>
                        </div>
                    </div>
                    <div class="single_slider d-flex align-items-center" data-bgimg="{{ asset('frontend/assets/img/slider/slider9.jpg') }}">
                        <div class="slider_content">
                            <h2>Top Quality</h2>
                            <h1>Aftermarket Spares & Service</h1>
                            <a class="button" href="shop.html">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 offset-md-4 offset-lg-0">
                <div class="sidebar_banner">
                    <div class="banner_thumb">
                        <a href="shop.html"><img src="{{ asset('frontend/assets/img/bg/banner6.jpg') }}" alt=""></a>
                        <div class="banner_text">
                            <h4>Tooth Points</h4>
                            <h3>Excavator</h3>
                            <h2>20% Off</h2>
                            <a href="shop.html">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!--slider area end-->

<!-- Products -->
<section class="product_area mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-lg-12 col-md-12">
                   
                    <div class="shop_banner">
                        <img src="{{ asset('frontend/assets/img/bg/banner8.jpg') }}" alt="">
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="section_title">
                                <h2><span> <strong>Our</strong>Products</span></h2>                       
                            </div>
                        </div>
                    </div>
                  

                    <div class="row shop_wrapper">
                        @php 
                        if(!empty($data)){ @endphp
                        @foreach($data as $product)
                            <div class="col-lg-4 col-md-4 col-12 ">
                                <div class="single_product">
                                    <div class="product_name grid_name">
                                        <h3><a href="{{ route('product-details', ['prodId' => $product->product_id]) }}">{{$product->name}}</a></h3>
                                        <p class="manufacture_product"><a href="{{ route('categories-list', ['cateId' => $product->category_id]) }}">{{$product->category_name}}</a></p>
                                    </div>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{ route('product-details', ['prodId' => $product->product_id]) }}"><img src="{{ asset('storage/'.$product->product_image) }}" alt=""></a>
                                       
                                    </div>
                                    <div class="product_content grid_content">
                                        <div class="content_inner">                                            
                                            <div class="product_footer d-flex align-items-center">
                                                <div class="price_box">
                                                    @php
                                                    if($product->offer_price){ 
                                                    @endphp
                                                    <span class="current_price"> ₹{{$product->offer_price}}</span>
                                                    <span class="old_price"> ₹{{$product->price}}</span>
                                                    @php } else {  @endphp
                                                        <span class="current_price"> ₹{{$product->price}}</span>
                                                    @php } @endphp
                                                    
                                                </div>
                                                <!-- <div class="add_to_cart">
                                                    <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        @endforeach
                        @php } @endphp
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Products Ends-->


<!--brand area start-->
<div class="brand_area mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="brand_container owl-carousel">
                    <div class="single_brand">
                        <a href="#"><img src="{{ asset('frontend/assets/img/brand/brand.png') }}" alt=""></a>
                    </div>
                    <div class="single_brand">
                        <a href="#"><img src="{{ asset('frontend/assets/img/brand/brand1.png') }}" alt=""></a>
                    </div>
                    <div class="single_brand">
                        <a href="#"><img src="{{ asset('frontend/assets/img/brand/brand2.png') }}" alt=""></a>
                    </div>
                    <div class="single_brand">
                        <a href="#"><img src="{{ asset('frontend/assets/img/brand/brand3.png') }}" alt=""></a>
                    </div>
                    <div class="single_brand">
                        <a href="#"><img src="{{ asset('frontend/assets/img/brand/brand4.png') }}" alt=""></a>
                    </div>
                    <div class="single_brand">
                        <a href="#"><img src="{{ asset('frontend/assets/img/brand/brand2.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--brand area end-->







@endsection