@extends('frontend.layout')
@section('breadcrum','Product')
@section('content')

    <!--product details start-->
    <div class="product_details mt-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-tab">

                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="{{ asset('storage/'.$data[0]->product_image) }}" data-zoom-image="{{ asset('storage/'.$data[0]->product_image) }}" alt="big-1">
                            </a>
                        </div>

                       
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                        <!-- <form action="#"> -->

                            <h1>{{ $data[0]->name }}</h1>
                            <div class="product_nav">
                                <ul>
                                    <li class="prev"><a href="product-details.html"><i class="fa fa-angle-left"></i></a></li>
                                    <li class="next"><a href="variable-product.html"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div class=" product_ratting">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="review"><a href="#"> (customer review ) </a></li>
                                </ul>

                            </div>
                            <div class="price_box">                                
                                @php
                                if($data[0]->offer_price){ 
                                @endphp
                                <span class="current_price"> ₹{{$data[0]->offer_price}}</span>
                                <span class="old_price"> ₹{{$data[0]->price}}</span>
                                @php } else {  @endphp
                                    <span class="current_price"> ₹{{$data[0]->price}}</span>
                                @php } @endphp

                            </div>
                            <div class="product_desc">
                                <p>{{ $data[0]->short_desc }}</p>
                            </div>                        
                          
                          
                            <div class="product_meta">
                                <span>Category: <a href="#">{{ $data[0]->category_name }}</a></span>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                            @if(Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('success')}}
                                </div>
                            @endif

                            <div class="product_review_form">
                                        <form action="{{ route('product-enquire') }}" method="POST">
                                        @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="review_comment">Enquire </label>
                                                    <textarea name="enquire" id="enquire" required>{{ old('enquire') }}</textarea>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="author">Name</label>
                                                    <input id="author" type="text" name="name" required value="{{ old('name') }}">
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="Phone">Phone </label>
                                                    <input id="Phone" type="Phone" name="phone" required value="{{ old('phone') }}">
                                                </div>
                                                <div class="col-12">
                                                    <label for="email">Email </label>
                                                    <input id="email" type="email" name="email" required value="{{ old('email') }}">
                                                    <input  type="hidden" name="prodId" value="{{ $data[0]->product_id }}">
                                                    <input  type="hidden" name="prodName" value="{{ $data[0]->name }}">
                                                </div>
                                            </div>
                                            <button type="submit">Enquire</button>
                                        </form>
                                    </div>

                        <!-- </form> -->
                        <br><br>
                        <div class="priduct_social">
                            <ul>
                                <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>
                                <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>
                                <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>
                                <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>
                                <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product details end-->

    <!--product info start-->
    <div class="product_d_info">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav" role="tablist" id="nav-tab">
                                <li>
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                                </li>                         
                               
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <div class="product_info_content">
                                    <p>{{ $data[0]->description }}</p>                        
                                </div>
                            </div>
                           

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product info end-->

    <!--product area start-->
    <section class="product_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2><span> <strong>Related</strong>Products</span></h2>
                    </div>
                    <div class="product_carousel product_column5 owl-carousel">
                    @php 
                    if(!empty($relatedProducts)){ @endphp
                    @foreach($relatedProducts as $product)
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">{{$product->name}}</a></h3>
                                <p class="manufacture_product"><a href="#">{{$product->category_name}}</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img src="{{ asset('storage/'.$product->product_image) }}" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img src="{{ asset('storage/'.$product->product_image) }}" alt=""></a>
                                <!-- <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div> -->

                                <!-- <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div> -->
                            </div>
                            <div class="product_content">
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
                    @endforeach
                    @php } @endphp    
                        
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--product area end-->

@endsection