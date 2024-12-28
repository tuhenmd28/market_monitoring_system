<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="mugli">
    <meta name="description" content="FarmHub - Agriculture Farming.php Template">
    <!-- ======== Page title ============ -->
    <title>FarmHub - Agriculture Farming.php Template</title>
    <!--<< Favcion >>-->
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/logo/favcion.png') }}">
    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <!--<< All Min Css >>-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/all.min.css') }}">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
    <!--<< Magnific Popup.css >>-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/meanmenu.css') }}">
    <!--<< Swiper Bundle.css >>-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}">
    <!--<< Nice Select.css >>-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.css') }}">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
</head>

<body>

<!-- Preloader Start -->
<div id="preloader" class="preloader">
    <div class="box d-grid gap-4">
        <span class="man-pre m-auto">
            <img src="{{ asset('frontend/assets/img/banner/preloader.png') }}" alt="img">
        </span>
        <span class="p1-clr fz-40 fw-bold text-center d-block">
            FarmHub
        </span>
    </div>
</div>

<!-- Scroll To Top Start-->
<button class="scrollToTop d-none d-md-flex d-center" aria-label="scroll Bar Button"><i
        class="mat-icon fas fa-angle-double-up"></i></button>
<!-- Scroll To Top End -->

<!-- Offcanvas Area Start -->
<div class="fix-area">
    <div class="offcanvas__info">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-4 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo">
                        <a href="index-2.html">
                            <img src="{{ asset('frontend/assets/img/logo/favcion.png') }}" alt="logo-img">
                        </a>
                    </div>
                    <div class="offcanvas__close">
                        <button>
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="mobile-menu fix mb-3"></div>
                <div class="offcanvas__contact">
                    <h4>Contact Info</h4>
                    <ul>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a target="_blank" href="#">Us 1216, road 45 house of street</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a href="mailto:demo23yourmail.com"><span
                                        class="mailto:demo23yourmail.com">demo23yourmail.com</span></a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="fal fa-clock"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a target="_blank" href="#">Mod-friday, 06am -02pm</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="far fa-phone"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a href="tel:+11002345909">(307) 555-0133</a>
                            </div>
                        </li>
                    </ul>
                    <div class="header-button mt-4 mb-4">
                        <a href="contact.html" class="cmn-btn">
                            Get A Quote
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                    <h4>Social Media</h4>
                    <div class="social-icon d-flex align-items-center">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas__overlay"></div>


<!-- Header Section Start -->
<header id="header-sticky" class="header-1 header-3">
    <div class="container">
        <div class="mega-menu-wrapper">
            <div class="header-main">
                <div class="header-left">
                    <div class="logo">
                        <a href="index-2.html" class="header-logo">
                            <img src="{{ asset('frontend/assets/img/logo/logo.png') }}" alt="logo-img">
                        </a>
                    </div>
                </div>
                <div class="header-right d-flex justify-content-end align-items-center">
                    <div class="mean__menu-wrapper">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="has-dropdown active menu-thumb">
                                        <a href="{{route('index')}}">
                                            Home
                                        </a>

                                    </li>
                                    <li>
                                        <a href="{{route('index')}}">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{route('index')}}">
                                            Services
                                            {{-- <i class="fas fa-angle-down"></i> --}}
                                        </a>
                                        {{-- <ul class="submenu">
                                            <li><a href="service.html">Services</a></li>
                                            <li><a href="service-details.html">Services Details</a></li>
                                        </ul> --}}
                                    </li>
                                    <li>
                                        <a href="#">
                                            Projects
                                            {{-- <i class="fas fa-angle-down"></i> --}}
                                        </a>
                                        {{-- <ul class="submenu">
                                            <li><a href="gallery.html">Gallery</a></li>
                                            <li><a href="gallery-details.html">Gallery Details</a></li>
                                        </ul> --}}
                                    </li>
                                    <li>
                                        <a href="#">
                                            Sign Up
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul class="submenu">
                                            <li><a href="{{route('admin_signup')}}">Admin Sign Up</a></li>
                                            <li><a href="{{route('farmer_signup')}}">Farmer Up</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Sign In
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul class="submenu">
                                            <li><a href="{{route('admin_signin')}}">Admin Sign In</a></li>
                                            <li><a href="{{route('farmer_signin')}}">Farmer In</a></li>
                                        </ul>
                                    </li>

                                    {{-- <li class="has-dropdown">
                                        <a href="#">
                                            Pages
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul class="submenu">
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="product-list.html">Product</a></li>
                                            <li><a href="product-details.html">Product Details</a></li>
                                            <li><a href="faq.html">Faq's</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    </li> --}}
                                    <li>
                                        <a href="#">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    {{-- <div class="shop-adjust">
                        <div class="header-button d-sm-block d-none">
                            <a href="contact.html" class="cmn-btn d-center">
                                Get a Quote
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </div>
                    </div> --}}
                    <div class="header__hamburger d-xl-none my-auto">
                        <div class="sidebar__toggle">
                            <i class="fas fa-bars"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Search Area Start -->
<div class="search-wrap">
    <div class="search-inner">
        <i class="fas fa-times search-close" id="search-close"></i>
        <div class="search-cell">
            <form method="get">
                <div class="search-field-holder">
                    <input type="search" class="main-search-input" placeholder="Search...">
                </div>
            </form>
        </div>
    </div>
</div>
