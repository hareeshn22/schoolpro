<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> @yield('title') | Healthy Remedies, Reciepes | Natural Healthy Remedies for Problems | HealthyREC</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}" />
    <meta name="description" content="An Healthy Remedies, Receipes, blog, Healthy Food, Natural Remedies" />
    <meta name="keywords" content="Healthy, blog, remedies, creative, multipurpose, responsive, parallax, startup" />
    <meta name="author" content="Hareesh" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;700&family=Oxygen:wght@400;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/css/core.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins.min.css') }}">
    <link rel="stylesheet" rel="preload" href="{{ asset('frontend/css/app.css') }}">

</head>

<body>
    <!-- Begin Preloader Area -->
    <div class="preloader">
        <div class="loader-1">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>
        </div>
    </div>
    <!-- End Preloader Area -->

    <!-- Begin Header -->
    <header class="header">
        <!--Topbar Area-->
        <div class="topbar topbar-mobile">
            <div class="container">
                <div class="close-topbar l-none">
                    <a href="javascript:void(0)"> <i class="ri-close-line"></i></a>
                </div>
                <div class="row">
                    <div class="col-lg-8 topbar-content">
                        <p class="topbar-content-p">Welcome to HealthyREC Blog</p>
                        <a href="#" class="topbar-content-p">
                            Feedback
                        </a>
                    </div>
                    <div class="col-lg-4 topbar-social ml-auto">
                        <a href="#" class="">
                            <i class="ri-facebook-fill topbar-icon"></i>
                        </a>
                        <a href="#" class="">
                            <i class="ri-twitter-fill topbar-icon"></i>
                        </a>
                        <a href="" class="">
                            <i class="ri-instagram-fill topbar-icon"></i>
                        </a>
                        <a href="" class="">
                            <i class="ri-youtube-fill topbar-icon"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--End Topbar-->

        <!-- Navbar Area -->

        <div class="navbar-minimal">
            <!-- Main Nav -->
            <div class="gardan-nav">
                <div class="container-max">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="mobile-top-bar">
                            <a href="javascript:void(0)">
                                <i class="ri-menu-2-line"></i>
                            </a>
                        </div>
                        <div class="navbar-brand">
                            <a href="{{ route('main') }}">
                                <img src="{{ asset('frontend/img/logo1.png') }}" class="navbar-img" alt="logo" />
                            </a>
                        </div>

                        <div class="mobile-menu-wrap">
                            <div class="mobile-search">
                                <a href="javascript:void(0)" class="searchbtn">
                                    <i class="ri-search-line"></i>
                                </a>
                            </div>
                            <div class="mobile-menu">
                                <a href="javascript:void(0)">
                                    <i class="ri-menu-line"></i>
                                </a>
                            </div>
                        </div>

                        <div class="navbar-collapse navbar-menu-wrap" id="navbarNav">
                            <div class="menu-close xl-none">
                                <a href="javascript:void(0)">
                                    <i class="ri-close-line"></i></a>
                            </div>
                            <ul class="navbar-nav navbar-main mx-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('main')}}"> Home </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Remedies</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Wellness</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Reciepes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Reviews</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Begin Navbar Options -->
                        <div class="navbar-options">
                            <a href="javascript:void(0)" class="searchbtn">
                                <i class="ri-search-line"></i>
                            </a>
                            <a href="#" class="btn btn-md btn-secondary">Subscribe</a>
                        </div>
                        <!-- End Navbar Options -->
                    </nav>
                </div>
            </div>
        </div>
        <!-- End Navbar Area -->
        <div class="search-area">
            <div class="container">
                <button type="button" class="close-searchbox">
                    <i class="ri-close-line"></i>
                </button>
                <form action="#">
                    <div class="form-group">
                        <input type="search" placeholder="Search Here" autofocus="" />
                    </div>
                </form>
            </div>
        </div>
    </header>
    <!-- End Header -->

    @yield('content');

    <!-- Start Footer -->

    <div class="footer-middle">
            <div class="container-max">
                <div class="footer-row">

                    <div class="">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link post-btn" href="{{ route('privacy') }}">Privacy Policy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Solutions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Industries</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    <footer class="footer footer-dark">
        <div class="container-max">


            <div class="footer-row">
                <div class="footer-copyright">Copyright © 2023 <span>HealthyREC.</span>
                </div>
                <div class="footer-side">
                    Designed By <a class="footer-link" href="https://infovict.com">Infovict</a>
                </div>
            </div>



        </div><!-- End .container -->

    </footer>
    <!-- End Footer -->

    <!-- JavaScript -->
    <script src="{{ asset('frontend/js/core.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins.min.js') }}"></script>
    <script src="{{ asset('frontend/js/app.min.js') }}"></script>

</body>

</html>
