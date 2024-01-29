<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/autima/autima/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Nov 2023 08:58:12 GMT -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Autima - Car Accessories Shop HTML Template </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

  <!-- CSS 
    ========================= -->
  <!--bootstrap min css-->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
  <!--owl carousel min css-->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
  <!--slick min css-->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}">
  <!--magnific popup min css-->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
  <!--font awesome css-->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/font.awesome.css') }}">
  <!--ionicons min css-->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/ionicons.min.css') }}">
  <!--animate css-->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
  <!--jquery ui min css-->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery-ui.min.css') }}">
  <!--slinky menu css-->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/slinky.menu.css') }}">
  <!-- Plugins CSS -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins.css') }}">

  <!-- Main Style CSS -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">

  @yield('css')

  <!--modernizr min js here-->
  <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.7.1.min.js') }}">
  </script>

</head>

<body>

  <!-- Main Wrapper Start -->
  <!--header area start-->
  <header class="header_area header_padding">
    <!--header middel start-->
    <div class="header_middle middle_two">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-3 col-md-3">
            <div class="logo">
              <a href="{{ route('home') }}"><img src="{{ asset('frontend/assets/img/logo/logo.png') }}" alt=""></a>
            </div>
          </div>
          <div class="col-lg-9 col-md-9">
            <div class="middel_right">
              <div class="search-container search_two">
                <form action="#">
                  <div class="search_box">
                    <input placeholder="Search entire store here ..." type="text">
                    <button type="submit"><i class="ion-ios-search-strong"></i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--header middel end-->

    <!--header bottom satrt-->
    <div class="header_bottom header_b_three sticky-header">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12">
            <div class="main_menu header_position">
              <nav>
                <ul>
                  <li><a href="{{ route('home') }}">home</a></li>
                  <li><a href="{{ route('categories-list') }}">category</a></li>
                  <li><a href="{{ route('about-us') }}">about Us</a></li>
                  <li><a href="{{ route('contact-us') }}"> Contact Us</a></li>
                </ul>
              </nav>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!--header bottom end-->

  </header>
  <!--header area end-->




  <!--breadcrumbs area start-->
  <div class="breadcrumbs_area">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="breadcrumb_content">
            <ul>
              <li><a href="{{ route('home') }}">home</a></li>
              <li>@yield('breadcrum','Sample title here') </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--breadcrumbs area end-->



  @yield('content')

  <!-- Social icons-->
  <section class="call_to_action">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="call_action_inner">
            <div class="call_text">
              <h3>We Have <span>Recommendations</span> for You</h3>
              <p>Take 30% off when you spend $150 or more with code Autima11</p>
            </div>
            <div class="discover_now">
              <a href="#">discover now</a>
            </div>
            <div class="link_follow">
              <ul>
                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                <li><a href="#"><i class="ion-social-youtube"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- social icons end -->


  <!--footer area start-->
  <footer class="footer_widgets">
    <div class="container">
      <div class="footer_top">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="widgets_container contact_us">
              <div class="footer_logo">
                <a href="#"><img src="assets/img/logo/logo.png" alt=""></a>
              </div>
              <div class="footer_contact">
                <p>Trusted used earth moving machinary sales and spare parts store.</p>
                <p><span>Address</span> B-Block, Shed-4, Autonagar, Visakhapatnam-530012.</p>
                <p><span>Need Help?</span>Call: <a href="tel:+91-9989287932">+91-9989287932</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="widgets_container widget_menu">
              <h3>Information</h3>
              <div class="footer_menu">
                <ul>
                  <li><a href="about.html">About Us</a></li>
                  <li><a href="#">Delivery Information</a></li>
                  <li><a href="privacy-policy.html">privacy policy</a></li>
                  <li><a href="#">Terms & Conditions</a></li>
                  <li><a href="#">Return Policy</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="widgets_container">
              <h3>Newsletter Subscribe</h3>
              <p>We’ll never share your email address with a third-party.</p>
              <div class="subscribe_form">
                <form id="mc-form" class="mc-form footer-newsletter">
                  <input id="mc-email" type="email" autocomplete="off" placeholder="Enter you email address here..." />
                  <button id="mc-submit">Subscribe</button>
                </form>
                <!-- mailchimp-alerts Start -->
                <div class="mailchimp-alerts text-centre">
                  <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                  <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                  <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                </div><!-- mailchimp-alerts end -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer_bottom">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="copyright_area">
              <p>Copyright &copy; 2021 <a href="#">Autima</a> All Right Reserved.</p>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="footer_payment text-right">
              <a href="#"><img src="assets/img/icon/payment.png" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--footer area end-->

  <!-- JS
============================================ -->
  <!--jquery min js-->
  <script src="{{ asset('frontend/assets/js/vendor/jquery-3.4.1.min.js') }}"></script>
  <!--popper min js-->
  <script src="{{ asset('frontend/assets/js/popper.js') }}"></script>
  <!--bootstrap min js-->
  <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
  <!--owl carousel min js-->
  <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
  <!--slick min js-->
  <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
  <!--magnific popup min js-->
  <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
  <!--jquery countdown min js-->
  <script src="{{ asset('frontend/assets/js/jquery.countdown.js') }}"></script>
  <!--jquery ui min js-->
  <script src="{{ asset('frontend/assets/js/jquery.ui.js') }}"></script>
  <!--jquery elevatezoom min js-->
  <script src="{{ asset('frontend/assets/js/jquery.elevatezoom.js') }}"></script>
  <!--isotope packaged min js-->
  <script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
  <!--slinky menu js-->
  <script src="{{ asset('frontend/assets/js/slinky.menu.js') }}"></script>
  <!-- Plugins JS -->
  <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>

  <!-- Main JS -->
  <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

  @yield('js')


</body>


<!-- Mirrored from htmldemo.net/autima/autima/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Nov 2023 08:58:55 GMT -->

</html>