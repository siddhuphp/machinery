@extends('frontend.layout')
@section('breadcrum','About')
@section('content')
@php 
//var_dump($about);
//echo $about->about;
@endphp

<!--about section area -->
<div class="about_section mt-32">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="about_thumb">
                    <img src="{{ asset('frontend/assets/img/about/about1.jpg') }}" alt="">
                </div>

                <div class="about_content">
                    <h1>Welcome to ResellRebuy</h1>
                    <p>Welcome to our comprehensive used excavator’s marketplace, where construction professionals and project managers find the perfect balance between reliability and affordability. Our curated selection boasts a diverse range of excavators, each meticulously inspected and ready to contribute to your construction endeavours.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--about section end-->

<!--chose us area start-->
<div class="choseus_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="chose_title">
                    <h1>Why chose us?</h1>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_chose">
                    <div class="chose_icone">
                        <img src="{{ asset('frontend/assets/img/about/About_icon1.jpg') }}" alt="">
                    </div>
                    <div class="chose_content">
                        <h3>Verified Quality</h3>
                        <p>Every excavator listed on our marketplace undergoes a thorough inspection process. We ensure that the machinery meets stringent quality standards, providing you with confidence in your purchase.</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_chose">
                    <div class="chose_icone">
                        <img src="{{ asset('frontend/assets/img/about/About_icon2.jpg') }}" alt="">
                    </div>
                    <div class="chose_content">
                        <h3>Competitive Pricing</h3>
                        <p>Our marketplace offers competitive pricing, ensuring you get value for your investment. Whether you're a small contractor or a large construction firm, our range of excavators caters to different budget considerations.</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_chose">
                    <div class="chose_icone">
                        <img src="{{ asset('frontend/assets/img/about/About_icon3.jpg') }}" alt="">
                    </div>
                    <div class="chose_content">
                        <h3>Online Support 24/7</h3>
                        <p>Have questions or need assistance? Our dedicated customer support team is ready to help. Contact us for any inquiries, and we'll guide you through the process, ensuring a positive experience.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--chose us area end-->

<!--services img area-->
<div class="about_gallery_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_gallery_section">
                    <div class="gallery_thumb">
                        <img src="{{ asset('frontend/assets/img/service/services2.jpg') }}" alt="">
                    </div>
                    <div class="about_gallery_content">
                        <h3>What do we do?</h3>
                        <p>{{ $about->about }}</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_gallery_section">
                    <div class="gallery_thumb">
                        <img src="{{ asset('frontend/assets/img/service/services1.jpg') }}" alt="">
                    </div>
                    <div class="about_gallery_content">
                        <h3>Our Mission</h3>
                        <p>{{ $about->mission }}</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_gallery_section">
                    <div class="gallery_thumb">
                        <img src="{{ asset('frontend/assets/img/service/services3.jpg') }}" alt="">
                    </div>
                    <div class="about_gallery_content">
                        <h3>Our Vision</h3>
                        <p>{{ $about->vision }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--services img end-->

<!--testimonials section start-->
<div class="testimonial_are">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="testimonial_titile">
                    <h1>What Our Custumers Say ?</h1>
                </div>
            </div>
            <div class="testimonial_active owl-carousel">
                <div class="col-12">
                    <div class="single_testimonial">
                        <p>These guys have been absolutely outstanding. Perfect Themes and the best of all that you have many options to choose! Best Support team ever! Very fast responding! Thank you very much! I highly recommend this theme and these people!</p>
                        <img src="{{ asset('frontend/assets/img/about/testimonial4.jpg') }}" alt="">
                        <span class="name">Kathy Young</span>
                        <span class="job_title">CEO of SunPark</span>
                        <div class="product_ratting">
                            <ul>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="single_testimonial">
                        <p>These guys have been absolutely outstanding. Perfect Themes and the best of all that you have many options to choose! Best Support team ever! Very fast responding! Thank you very much! I highly recommend this theme and these people!</p>
                        <img src="{{ asset('frontend/assets/img/about/testimonial5.jpg') }}" alt="">
                        <span class="name">Kathy Young</span>
                        <span class="job_title">CEO of SunPark</span>
                        <div class="product_ratting">
                            <ul>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="single_testimonial">
                        <p>These guys have been absolutely outstanding. Perfect Themes and the best of all that you have many options to choose! Best Support team ever! Very fast responding! Thank you very much! I highly recommend this theme and these people!</p>
                        <img src="{{ asset('frontend/assets/img/about/testimonial6.png" alt="">
                        <span class="name">Kathy Young</span>
                        <span class="job_title">CEO of SunPark</span>
                        <div class="product_ratting">
                            <ul>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--testimonials section end-->

@endsection