@extends('frontend.layout')
@section('breadcrum','Categories')
@section('content')

    <!--shop  area start-->
    <div class="shop_area shop_reverse">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="widget_inner">                            
                            <div class="widget_list widget_categories">
                                <h2>categories</h2>
                                <ul>
                                @php 
                                if(!empty($categories)){ @endphp
                                @foreach($categories as $category)
                                    <li>
                                        <!-- <input type="checkbox"> -->
                                        <a href="{{  route('categories-list',['cateId' => $category->id]) }}">{{ $category->name }} ({{ $category->productsCount }})</a>
                                        <!-- <span class="checkmark"></span> -->
                                    </li>
                                @endforeach
                                @php } @endphp

                                </ul>
                            </div>
                        </div>
                        <div class="shop_sidebar_banner">
                            <a href="#"><img src="{{ asset('frontend/assets/img/bg/banner9.jpg') }}" alt=""></a>
                        </div>
                    </aside>
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_banner">
                        <img src="{{ asset('frontend/assets/img/bg/banner8.jpg') }}" alt="">
                    </div>
                    <div class="shop_title">
                        <h1>Products</h1>
                    </div>
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class=" btn-grid-3" data-toggle="tooltip" title="3"></button>

                            <button data-role="grid_4" type="button" class=" btn-grid-4" data-toggle="tooltip" title="4"></button>

                            <button data-role="grid_list" type="button" class="active btn-list" data-toggle="tooltip" title="List"></button>
                        </div>
                        <!-- <div class=" niceselect_option">

                            <form class="select_option" action="#">
                                <select name="orderby" id="short">

                                    <option selected value="1">Sort by average rating</option>
                                    <option value="2">Sort by popularity</option>
                                    <option value="3">Sort by newness</option>
                                    <option value="4">Sort by price: low to high</option>
                                    <option value="5">Sort by price: high to low</option>
                                    <option value="6">Product Name: Z</option>
                                </select>
                            </form>


                        </div> -->
                        <div class="page_amount">
                            <p>Showing {{ $data->firstItem() }}–{{ $data->lastItem() }} of {{ $data->total() }} results</p>
                        </div>
                    </div>
                    <!--shop toolbar end-->

                    <div class="row shop_wrapper grid_list">
                        @php 
                        if(!empty($data)){ @endphp
                        @foreach($data as $product)                       
                        <div class=" col-12 ">
                            <div class="single_product">
                                <div class="product_name grid_name">
                                    <h3><a href="{{ route('product-details', ['prodId' => $product->product_id]) }}">{{$product->name}}</a></h3>
                                    <p class="manufacture_product"><a href="#">{{$product->category_name}}</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{ route('product-details', ['prodId' => $product->product_id]) }}"><img src="{{ $product->productImage }}" alt=""></a>
                                    <a class="secondary_img" href="{{ route('product-details', ['prodId' => $product->product_id]) }}"><img src="{{ $product->productImage }}" alt=""></a>
                                    <!-- <div class="label_product">
                                        <span class="label_sale">-47%</span>
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div> -->
                                </div>
                                <div class="product_content grid_content">
                                    <div class="content_inner">
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul>
                                        </div>
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
                                            <div class="add_to_cart">
                                                <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product_content list_content">
                                    <div class="left_caption">
                                        <div class="product_name">
                                            <h3><a href="{{ route('product-details', ['prodId' => $product->product_id]) }} ">{{$product->name}}</a></h3>
                                        </div>
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product_desc">
                                            <p>{{ Illuminate\Support\Str::limit($product->description, $limit = 250, $end = '...') }} </p>
                                        </div>
                                    </div>
                                    <div class="right_caption">
                                        <!-- <div class="text_available">
                                            <p>availabe: <span>99 in stock</span></p>
                                        </div> -->
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
                                        <div class="cart_links_btn">
                                            <a href="#" title="add to cart">Enquiry</a>
                                        </div>
                                        <!-- <div class="action_links_btn">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                            </ul>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @php } @endphp
                    </div>

                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                        {{ $data->links() }}
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->

@endsection