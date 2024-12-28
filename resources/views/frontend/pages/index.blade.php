@extends('frontend.layouts.skeleton')

@section('content')




    <!-- Hero Section Start -->
    <section class="banner-section style-v3 overflow-hidden position-relative">
        <div class="container">
            <div class="banner-wrapperv3 position-relative">
                <div class="row">
                    <div class="col-lg-7 col-md-9">
                        <div class="hero-contentv03">
                            <div class="sun-star wow fadeInDown" data-wow-delay=".3s">
                                <img src="{{ asset('frontend/assets/img/icon/icon-sunstar.svg') }}" alt="img">
                                Best farming
                            </div>
                            <h1 class="wow fadeInUp" data-wow-delay="0.4s">
                                Discover the <span>art <br> of gardening</span>
                            </h1>
                            <p class="wow fadeInUp" data-wow-delay="0.6s">
                                We have been operating for over a decade, providing top-notch services to our clients
                                and building a strong track record
                                in the industry.
                            </p>
                            <div class="adjust-video">
                                <a href="about.html" class="cmn-btn wow fadeInUp" data-wow-delay="0.9s">
                                    Read More
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                                <div class="video-area">
                                    <a href="https://www.youtube.com/watch?v=ZP1XyLYraAA"
                                        class="video-cmn d-center video-popup">
                                        <i class="fa-solid fa-play"></i>
                                    </a>
                                    <h5>
                                        Watch Video
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Element -->
        <img src="{{ asset('frontend/assets/img/banner/hero-3.jpg') }}" alt="img" class="hero-threthumb">
        <!-- Element -->
    </section>

    <!-- Servicev03 section -->
    <section class="servicev3-section overflow-hidden section-padding white-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-7 col-md-8 col-sm-11">
                    <div class="section-title mb-60 text-center">
                        <h5 class="p1-clr wow fadeInLeft text-uppercase" data-wow-delay="0.4s">
                            Our Services
                        </h5>
                        <h2 class="wow fadeInDown" data-wow-delay=".3s">
                            Nourishing the world from seed to table
                        </h2>
                    </div>
                </div>
            </div>
            <!-- Body -->
            <div class="row g-xl-4 g-3 justify-content-center">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="service-itemsv02 service-style03">
                        <div class="thumb w-100">
                            <img src="{{ asset('frontend/assets/img/service/servicev3-1.jpg') }}" alt="img" class="w-100 mimg">
                        </div>
                        <div class="content">
                            <a href="service-details.html" class="title">Green Grow Solutions</a>
                            <img src="{{ asset('frontend/assets/img/icon/water-hose.svg') }}" alt="icon">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="service-itemsv02 service-style03">
                        <div class="thumb w-100">
                            <img src="{{ asset('frontend/assets/img/service/servicev3-2.jpg') }}" alt="img" class="w-100 mimg">
                        </div>
                        <div class="content">
                            <a href="service-details.html" class="title">Harvest Tech to Farm Service</a>
                            <img src="{{ asset('frontend/assets/img/icon/ser-flower.svg') }}" alt="icon">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="service-itemsv02 service-style03">
                        <div class="thumb w-100">
                            <img src="{{ asset('frontend/assets/img/service/servicev3-3.jpg') }}" alt="img" class="w-100 mimg">
                        </div>
                        <div class="content">
                            <a href="service-details.html" class="title">AgriPro is the Consulting</a>
                            <img src="{{ asset('frontend/assets/img/icon/map-plant.svg') }}" alt="icon">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Version V01 -->
    <section class="about-section style-v01 white-bg">
        <div class="container">
            <div class="about-wrapperv3">
                <div class="row g-4 align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-6 col-sm-8 order-md-0 order-1">
                        <div class="about-thumv03 position-relative pe-xl-4 wow fadeInDown" data-wow-delay=".3s">
                            <img src="{{ asset('frontend/assets/img/about/aboutv3.png') }}" alt="img" class="mimg">
                            <div class="avarage-counting">
                                <div class="avarag">
                                    <img src="{{ asset('frontend/assets/img/icon/agriculture.svg') }}" alt="img">
                                </div>
                                <div class="cont">
                                    <h5>
                                        Agriculture Activity
                                    </h5>
                                    <span>
                                        Loream is ispam
                                    </span>
                                </div>
                            </div>
                            <a href="https://www.youtube.com/watch?v=ZP1XyLYraAA" class="play-v3 video-popup">
                                <i class="fa-solid fa-play"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="about-contentv1">
                            <div class="section-title mb-40">
                                <h5 class="p1-clr text-uppercase wow fadeInLeft" data-wow-delay="0.4s">
                                    Why Choose us
                                </h5>
                                <h2 class="wow fadeInDown" data-wow-delay=".3s">
                                    Farming with passion the feeding with purpose
                                </h2>
                                <p class="wow fadeInUp" data-wow-delay=".4s">
                                    Lorem ipsum dolor sit amet consectetur. Amet lectus mi ultricies dict facisem.
                                    Imperdiet
                                    massa turpis sit Lorem ipsum
                                    dolor sit amet consectetur. Amet the lectus mi ultricies dictum facilisis sem.
                                    Imperdiet
                                </p>
                                <div class="progress_bar d-grid gap-xxl-4 gap-4">
                                    <div class="progress_bar_item">
                                        <div class="per-title d-flex align-items-center justify-content-between">
                                            <div class="item_label p900-clr">FarmSmart Innovations</div>
                                        </div>
                                        <div class="item_bar">
                                            <div class="progress" data-progress="70"></div>
                                        </div>
                                    </div>
                                    <div class="progress_bar_item">
                                        <div class="per-title d-flex align-items-center justify-content-between">
                                            <div class="item_label p900-clr">CropCare Solutions</div>
                                        </div>
                                        <div class="item_bar">
                                            <div class="progress" data-progress="80"></div>
                                        </div>
                                    </div>
                                </div>
                                <a href="about.html" class="cmn-btn">
                                    Read More
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery section -->
    <section class="gallery-sectionv02 overflow-hidden white-bg space-top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-xl-7 col-md-8 col-sm-11">
                    <div class="section-title mb-60 text-center">
                        <h5 class="p1-clr text-uppercase wow fadeInLeft" data-wow-delay="0.4s">
                            OUR GALLARY
                        </h5>
                        <h2 class="wow fadeInDown" data-wow-delay=".3s">
                            Bringing nature's bounty to your plate
                        </h2>
                    </div>
                </div>
            </div>
            <!-- Body -->
            <div class="d-flex flex-md-nowrap flex-wrap gap-lg-4 gap-3">
                <div class="gallery-itemsv02 gallery-itemshover wow fadeInUp" data-wow-delay=".3s">
                    <div class="thumb w-100">
                        <img src="{{ asset('frontend/assets/img/gallery/galleryv2-1.jpg') }}" alt="img" class="w-100">
                    </div>
                    <a href="gallery-details.html" class="arrow">
                        <i class="fa-solid fa-angle-right"></i>
                    </a>
                    <div class="content">
                        <a href="gallery-details.html" class="title">Farming for a Better Tomorrow</a>
                        <p>
                            Green Thumb Farm Services
                        </p>
                    </div>
                </div>
                <div class="gallery-itemsv02 white-bg wow fadeInUp" data-wow-delay=".5s">
                    <div class="thumb w-100">
                        <img src="{{ asset('frontend/assets/img/gallery/galleryv2-2.jpg') }}" alt="img" class="w-100">
                    </div>
                    <a href="gallery-details.html" class="arrow">
                        <i class="fa-solid fa-angle-right"></i>
                    </a>
                    <div class="content">
                        <a href="gallery-details.html" class="title">Farming for a Better Tomorrow</a>
                        <p>
                            Green Thumb Farm Services
                        </p>
                    </div>
                </div>
                <div class="gallery-itemsv02 gallery-itemshover  wow fadeInUp" data-wow-delay=".7s">
                    <div class="thumb w-100">
                        <img src="{{ asset('frontend/assets/img/gallery/galleryv2-3.jpg') }}" alt="img" class="w-100">
                    </div>
                    <a href="gallery-details.html" class="arrow">
                        <i class="fa-solid fa-angle-right"></i>
                    </a>
                    <div class="content">
                        <a href="gallery-details.html" class="title">Farming for a Better Tomorrow</a>
                        <p>
                            Green Thumb Farm Services
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature V02 -->
    <section class="feature-sectionv02 p900-bg space-top">
        <div class="container">
            <div class="row g-4 align-items-lg-start align-items-center justify-content-center">
                <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-6 col-sm-10">
                    <div class="about-contentv1">
                        <div class="section-title mb-40">
                            <h5 class="p1-clr text-uppercase wow fadeInLeft" data-wow-delay="0.4s">
                                OUR FEATURES
                            </h5>
                            <h2 class="text-white mb-24 wow fadeInDown" data-wow-delay=".3s">
                                Growing strong,farm feeding futures
                            </h2>
                            <p class="text-white wow fadeInUp mb-lg-4 mb-3" data-wow-delay=".4s">
                                Lorem ipsum dolor sit amet consectetur. Amet lectus mi ultricies dictum facilisis sem.
                                Imperdiet massa turpis site
                            </p>
                            <ul class="about-list2 mb-40 gap-2">
                                <li class="text-white"><i class="fa-solid fa-check"></i> Grow with Agriculture</li>
                                <li class="text-white"><i class="fa-solid fa-check"></i> Farming for a Better Future
                                </li>
                                <li class="text-white"><i class="fa-solid fa-check"></i> From Farm to Table, Agriculture
                                    Matters</li>
                            </ul>
                            <a href="service.html" class="cmn-btn text-white primary-border">
                                Read More
                                <i class="fa-solid fa-arrow-right p1-clr"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-7 col-lg-6 col-md-6 col-sm-8 ps-lg-5">
                    <div class="feature-thumv02 position-relative w-100 wow fadeInDown" data-wow-delay=".3s">
                        <img src="{{ asset('frontend/assets/img/about/feature-thumb2.png') }}" alt="img" class="w-100">
                    </div>
                </div>
            </div>
        </div>
        <!-- Element -->
        <img src="{{ asset('frontend/assets/img/element/feature-green2.png') }}" alt="img" class="feature-element2">
    </section>

    <!-- Pricing section -->
    <section class="pricing-section overflow-hidden white-bg section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-7 col-md-8 col-sm-11">
                    <div class="section-title mb-60 text-center">
                        <h5 class="p1-clr wow fadeInLeft" data-wow-delay="0.4s">
                            OUR PRICING
                        </h5>
                        <h2 class="wow fadeInDown" data-wow-delay=".3s">
                            Harvesting dreams, one crop at a time
                        </h2>
                    </div>
                </div>
            </div>
            <!-- Body -->
            <div class="row g-xl-4 g-3 justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="pricing-itemsv1">
                        <h5>
                            Consult
                        </h5>
                        <div class="price d-flex">
                            <h2>
                                $9
                            </h2>
                            <span>
                                /month
                            </span>
                        </div>
                        <ul class="pricing-list">
                            <li>
                                <i class="fa-solid fa-circle-check"></i>Mistakes To Avoid
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-check"></i>Your Startup
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-xmark"></i> Knew About Fonts
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-xmark"></i>Winning Metric for Your Startup
                            </li>
                        </ul>
                        <a href="#" class="cmn-btn primary-border">
                            Get Now
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="pricing-itemsv1 active">
                        <h5>
                            Perfect
                        </h5>
                        <div class="price d-flex">
                            <h2>
                                $29
                            </h2>
                            <span>
                                /month
                            </span>
                        </div>
                        <ul class="pricing-list">
                            <li>
                                <i class="fa-solid fa-circle-check"></i>Mistakes To Avoid
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-check"></i>Your Startup
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-check"></i> Knew About Fonts
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-check"></i>Winning Metric for Your Startup
                            </li>
                        </ul>
                        <a href="#" class="cmn-btn primary-border">
                            Get Now
                        </a>
                        <span class="price-badge">
                            Polupar
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="pricing-itemsv1">
                        <h5>
                            Easy
                        </h5>
                        <div class="price d-flex">
                            <h2>
                                $19
                            </h2>
                            <span>
                                /month
                            </span>
                        </div>
                        <ul class="pricing-list">
                            <li>
                                <i class="fa-solid fa-circle-check"></i>Mistakes To Avoid
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-check"></i>Your Startup
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-check"></i> Knew About Fonts
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-check"></i>Winning Metric for Your Startup
                            </li>
                        </ul>
                        <a href="#" class="cmn-btn primary-border">
                            Get Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Element -->
        <img src="{{ asset('frontend/assets/img/element/pricing-animal.png') }}" alt="img" class="pricing-element">
    </section>

    <!-- Counter Section -->
    <section class="counter-sectionv03 position-relative">
        <div class="container">
            <div class="counter-version-wrapv1 d-flex align-items-center justify-content-between gap-4">
                <div class="counter-items style02">
                    <div class="con-box">
                        <h2>
                            <span class="count">200</span>+
                        </h2>
                        <p>Team member</p>
                    </div>
                </div>
                <div class="count-animal d-lg-block d-none">
                    <img src="{{ asset('frontend/assets/img/icon/count-animal.svg') }}" alt="img">
                </div>
                <div class="counter-items style02">
                    <div class="con-box">
                        <h2>
                            <span class="count">20</span>+
                        </h2>
                        <p>Winning award</p>
                    </div>
                </div>
                <div class="count-animal d-lg-block d-none">
                    <img src="{{ asset('frontend/assets/img/icon/count-animal.svg') }}" alt="img">
                </div>
                <div class="counter-items style02">
                    <div class="con-box">
                        <h2>
                            <span class="count">10</span>k+
                        </h2>
                        <p>Complete project</p>
                    </div>
                </div>
                <div class="count-animal d-lg-block d-none">
                    <img src="{{ asset('frontend/assets/img/icon/count-animal.svg') }}" alt="img">
                </div>
                <div class="counter-items style02">
                    <div class="con-box">
                        <h2>
                            <span class="count">900</span>+
                        </h2>
                        <p>Client review</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Faq Section -->
    <section class="faq-section section-padding p100-bg">
        <div class="container">
            <div class="row g-md-4 g-2 align-items-center justify-content-between">
                <div class="col-lg-5 col-md-6">
                    <div class="faq-content-left">
                        <div class="section-title mb-40">
                            <h5 class="p1-clr wow fadeInLeft text-uppercase" data-wow-delay="0.4s">
                                FAQ
                            </h5>
                            <h2 class="wow fadeInDown" data-wow-delay=".3s">
                                How often should I water my Farming?
                            </h2>
                            <p>
                                It is a long established fact that a reader will be distracted by the readable content
                                of a page when looking at its
                                layout. Many desktop publishing packages and web page editors now use Lorem Ipsum as
                                their default model text
                            </p>
                            <div class="faq-watch">
                                <a href="https://www.youtube.com/watch?v=ZP1XyLYraAA"
                                    class="video-cmn d-center video-popup">
                                    <i class="fa-solid fa-play"></i>
                                </a>
                                <h5>
                                    Watch Video
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 order-md-0 order-1">
                    <div class="tab-faq faq">
                        <div class="accordion-section d-grid gap-xxl-4 gap-lg-3 gap-2">
                            <div class="accordion-single">
                                <h5 class="header-area">
                                    <button
                                        class="accordion-btn d-flex align-items-center d-flex position-relative w-100"
                                        type="button">
                                        How do I create a vegetable Agriculture?
                                    </button>
                                </h5>
                                <div class="content-area">
                                    <div class="content-body">
                                        <p>
                                            It is a long established fact that a reader will be distracted by the
                                            readable content of a page when looking at its
                                            layout. Many desktop publishing packages and web page editors now use Lorem
                                            Ipsum as their default model text
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-single">
                                <h5 class="header-area">
                                    <button
                                        class="accordion-btn d-flex align-items-center d-flex position-relative w-100"
                                        type="button">
                                        How Farming during the winter months?
                                    </button>
                                </h5>
                                <div class="content-area">
                                    <div class="content-body">
                                        <p>
                                            It is a long established fact that a reader will be distracted by the
                                            readable content of a page when looking at its
                                            layout. Many desktop publishing packages and web page editors now use Lorem
                                            Ipsum as their default model text
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-single">
                                <h5 class="header-area">
                                    <button
                                        class="accordion-btn d-flex align-items-center d-flex position-relative w-100"
                                        type="button">
                                        How do I prevent in my Argiculture?
                                    </button>
                                </h5>
                                <div class="content-area">
                                    <div class="content-body">
                                        <p>
                                            It is a long established fact that a reader will be distracted by the
                                            readable content of a page when looking at its
                                            layout. Many desktop publishing packages and web page editors now use Lorem
                                            Ipsum as their default model text
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-single">
                                <h5 class="header-area">
                                    <button
                                        class="accordion-btn d-flex align-items-center d-flex position-relative w-100"
                                        type="button">
                                        What are the prerequisites course?
                                    </button>
                                </h5>
                                <div class="content-area">
                                    <div class="content-body">
                                        <p>
                                            It is a long established fact that a reader will be distracted by the
                                            read content of a page when looking at its layout.
                                            Many desktop publish packages and web page editors now use Loremdefault
                                            model
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Element -->
        <img src="{{ asset('frontend/assets/img/element/faq-element.png') }}" alt="img" class="faq-element">
    </section>

    <!--<< Sponsor Branding Start >>-->
    <section class="sponsor-branding-section section-padding white-bg">
        <div class="container">
            <div class="swiper brand-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="brand-image">
                            <img src="{{ asset('frontend/assets/img/sponsor/sp1.png') }}" alt="img">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-image">
                            <img src="{{ asset('frontend/assets/img/sponsor/sp2.png') }}" alt="img">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-image">
                            <img src="{{ asset('frontend/assets/img/sponsor/sp3.png') }}" alt="img">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-image">
                            <img src="{{ asset('frontend/assets/img/sponsor/sp4.png') }}" alt="img">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-image">
                            <img src="{{ asset('frontend/assets/img/sponsor/sp5.png') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Testimonial Version Three -->
    <section class="testimonial-section style-section-v03 overflow-hidden">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="testimonial-common-wrapper testimonial-wrapperv02 position-relative">
                        <div class="section-title mb-50">
                            <h5 class="p2-clr wow fadeInLeft" data-wow-delay="0.4s">
                                Testimonial
                            </h5>
                            <h2 class="wow fadeInDown" data-wow-delay=".3s">
                                Farm fresh goodness <br> for all
                            </h2>
                        </div>
                        <div class="swiper testimonial-slidewrap01 ">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonail-common-items stylev03">
                                        <div class="d-lg-flex d-grid justify-content-between">
                                            <div class="review-man">
                                                <img src="{{ asset('frontend/assets/img/testimonial/re2.png') }}" alt="img">
                                                <div class="cont">
                                                    <h3>
                                                        Leslie Alexander
                                                    </h3>
                                                    <span>
                                                        Nursing Assistant
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="stars">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                        <p>
                                            Financial planners help people to knowledge in about how to invest and save
                                            their moneye the most efficient way in to
                                            eve.planners Financial planners help people to my destin knowledge in about
                                            design
                                        </p>
                                        <div class="dot-cmn"></div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonail-common-items stylev03">
                                        <div class="d-lg-flex d-grid justify-content-between">
                                            <div class="review-man">
                                                <img src="{{ asset('frontend/assets/img/testimonial/re2.png') }}" alt="img">
                                                <div class="cont">
                                                    <h3>
                                                        Leslie Alexander
                                                    </h3>
                                                    <span>
                                                        Nursing Assistant
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="stars">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                        <p>
                                            Financial planners help people to knowledge in about how to invest and save
                                            their moneye the most efficient way in to
                                            eve.planners Financial planners help people to my destin knowledge in about
                                            design
                                        </p>
                                        <div class="dot-cmn"></div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonail-common-items stylev03">
                                        <div class="d-lg-flex d-grid justify-content-between">
                                            <div class="review-man">
                                                <img src="{{ asset('frontend/assets/img/testimonial/re2.png') }}" alt="img">
                                                <div class="cont">
                                                    <h3>
                                                        Leslie Alexander
                                                    </h3>
                                                    <span>
                                                        Nursing Assistant
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="stars">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                        <p>
                                            Financial planners help people to knowledge in about how to invest and save
                                            their moneye the most efficient way in to
                                            eve.planners Financial planners help people to my destin knowledge in about
                                            design
                                        </p>
                                        <div class="dot-cmn"></div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonail-common-items stylev03">
                                        <div class="d-lg-flex d-grid justify-content-between">
                                            <div class="review-man">
                                                <img src="{{ asset('frontend/assets/img/testimonial/re2.png') }}" alt="img">
                                                <div class="cont">
                                                    <h3>
                                                        Leslie Alexander
                                                    </h3>
                                                    <span>
                                                        Nursing Assistant
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="stars">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                        <p>
                                            Financial planners help people to knowledge in about how to invest and save
                                            their moneye the most efficient way in to
                                            eve.planners Financial planners help people to my destin knowledge in about
                                            design
                                        </p>
                                        <div class="dot-cmn"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="testimonial-thumbv3 w-100 wow fadeInDown" data-wow-delay=".4s">
                        <img src="{{ asset('frontend/assets/img/testimonial/testimonial-thumbv3.png') }}" alt="img" class="w-100 mimg">
                        <div class="testimonial-count">
                            <img src="{{ asset('frontend/assets/img/icon/apple-count.png') }}" alt="img">
                            <div class="cont">
                                <h3>
                                    <span class="count">15</span>+ Years
                                </h3>
                                <p>Happy Customer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Element -->
    </section>

    <!-- Blog section -->
    <section class="blog-section overflow-hidden blog-stylev1 white-bg section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-7 col-md-8 col-sm-11">
                    <div class="section-title mb-60 text-center">
                        <h5 class="p1-clr wow fadeInLeft" data-wow-delay="0.4s">
                            OUR BLOGS
                        </h5>
                        <h2 class="wow fadeInDown" data-wow-delay=".3s">
                            Cultivating a sustainable future for all
                        </h2>
                    </div>
                </div>
            </div>
            <!-- Body -->
            <div class="row g-xl-4 g-3 justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-11 wow fadeInUp" data-wow-delay=".3s">
                    <div class="blog-itemsv1">
                        <div class="thumb w-100">
                            <img src="{{ asset('frontend/assets/img/blog/blog1.jpg') }}" alt="img" class="w-100">
                            <div class="dates">
                                22 jan
                            </div>
                        </div>
                        <div class="content">
                            <ul class="comment-inner">
                                <li>
                                    <a href="#"><i class="fa-regular fa-comments"></i> Comments (05)</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-regular fa-user"></i> By admin</a>
                                </li>
                            </ul>
                            <a href="blog-details.html" class="title">From Farm to Table an Agriculture</a>
                            <p>
                                Agriculture and farming are essential industries that involve
                            </p>
                            <a href="blog-details.html" class="arrows">Read More <i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-11 wow fadeInUp" data-wow-delay=".5s">
                    <div class="blog-itemsv1">
                        <div class="thumb w-100">
                            <img src="{{ asset('frontend/assets/img/blog/blog2.jpg') }}" alt="img" class="w-100">
                            <div class="dates">
                                22 jan
                            </div>
                        </div>
                        <div class="content">
                            <ul class="comment-inner">
                                <li>
                                    <a href="#"><i class="fa-regular fa-comments"></i> Comments (05)</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-regular fa-user"></i> By admin</a>
                                </li>
                            </ul>
                            <a href="blog-details.html" class="title">Farm fresh goodness for alle</a>
                            <p>
                                Agriculture and farming are essential industries that involve
                            </p>
                            <a href="blog-details.html" class="arrows">Read More <i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-11 wow fadeInUp" data-wow-delay=".7s">
                    <div class="blog-itemsv1">
                        <div class="thumb w-100">
                            <img src="{{ asset('frontend/assets/img/blog/blog3.jpg') }}" alt="img" class="w-100">
                            <div class="dates">
                                22 jan
                            </div>
                        </div>
                        <div class="content">
                            <ul class="comment-inner">
                                <li>
                                    <a href="#"><i class="fa-regular fa-comments"></i> Comments (05)</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-regular fa-user"></i> By admin</a>
                                </li>
                            </ul>
                            <a href="blog-details.html" class="title">Discover Potential of Agriculture</a>
                            <p>
                                Agriculture and farming are essential industries that involve
                            </p>
                            <a href="blog-details.html" class="arrows">Read More <i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<< Subscribe Start >>-->
    <div class="subscrbie-section subscrbie-stylev03">
        <div class="container">
            <div class="subscribe-wrapper-v03">
                <div class="container position-relative">
                    <div class="row g-4 align-items-end justify-content-between">
                        <div class="col-lg-6 col-md-6 mb-xl-5 pb-xl-4">
                            <div class="get-element">
                                <img src="{{ asset('frontend/assets/img/element/get-element.png') }}" alt="img" class="d-md-block d-none">
                            </div>
                            <div class="subs-contentv3">
                                <h2>
                                    Get Update <span>Subscribe</span> <br> to Newsletter
                                </h2>
                                <form action="#" class="subscribe-form03 flex-xl-nowrap flex-wrap">
                                    <input type="text" placeholder="Enter Your Email">
                                    <button type="submit" class="cmn-btn text-capitalize">
                                        Subcribe
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="conatact-box common-contact-inner position-relative">
                                <div class="section-title mb-40">
                                    <h5 class="p1-clr wow fadeInLeft" data-wow-delay="0.4s">
                                        Contact
                                    </h5>
                                    <h2>
                                        Get Touch Here
                                    </h2>
                                </div>
                                <form action="#" class="row g-xl-4 g-3">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="email" placeholder="E-mail">
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="text" placeholder="Subject">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea name="message" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="cmn-btn text-capitalize">
                                            Submit Now
                                        </button>
                                    </div>
                                </form>
                                <!-- Element -->
                                <img src="{{ asset('frontend/assets/img/element/sun-element.png') }}" alt="img"
                                    class="sun-element d-xl-block d-none">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
