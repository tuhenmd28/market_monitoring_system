@extends('frontend.layouts.skeleton')

@section('content')

     <!--============= Hero Section Starts Here =============-->
     <div class="hero-section style-2">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="#0">Pages</a>
                </li>
                <li>
                    <span>Vehicles</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="{{ asset('frontend/assets/images/banner/hero-bg.png')}}"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->


    <!--============= Product Details Section Starts Here =============-->
    <section class="product-details padding-bottom mt--240 mt-lg--440">
        <div class="container">
            <div class="product-details-slider-top-wrapper">
                <div class="product-details-slider owl-theme owl-carousel" id="sync1">
                    @foreach ($product->images as $item)
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ asset('product/'.$item->image)}}" alt="product">
                        </div>
                    </div>

                    @endforeach
                    {{-- <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ asset('frontend/assets/images/product/product2.png')}}" alt="product">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ asset('frontend/assets/images/product/product3.png')}}" alt="product">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ asset('frontend/assets/images/product/product4.png')}}" alt="product">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ asset('frontend/assets/images/product/product5.png')}}" alt="product">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ asset('frontend/assets/images/product/product6.png')}}" alt="product">
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="product-details-slider-wrapper">
                <div class="product-bottom-slider owl-theme owl-carousel" id="sync2">
                    @foreach ($product->images as $item)
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ asset('product/'.$item->image)}}" alt="product">
                        </div>
                    </div>

                    @endforeach

                    {{-- <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ asset('frontend/assets/images/product/02.png')}}" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ asset('frontend/assets/images/product/03.png')}}" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ asset('frontend/assets/images/product/04.png')}}" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ asset('frontend/assets/images/product/05.png')}}" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ asset('frontend/assets/images/product/06.png')}}" alt="product">
                        </div>
                    </div> --}}
                </div>
                <span class="det-prev det-nav">
                    <i class="fas fa-angle-left"></i>
                </span>
                <span class="det-next det-nav active">
                    <i class="fas fa-angle-right"></i>
                </span>
            </div>
            <div class="row mt-40-60-80">
                <div class="col-lg-8">
                    <div class="product-details-content">
                        <div class="product-details-header">
                            <h2 class="title">{{ $product->name }}</h2>
                            <ul>
                                <li>Listing ID: 14076242</li>
                                <li>Item #: 7300-3356862</li>
                            </ul>
                        </div>
                        <ul class="price-table mb-30">
                            <li class="header">
                                <h5 class="current">Current Price</h5>
                                <h3 class="price">US ${{ $product->current_bit }}</h3>
                            </li>
                            <li>
                                <span class="details">Buyer's Premium</span>
                                <h5 class="info">10.00%</h5>
                            </li>
                            <li>
                                <span class="details">Bid Increment (US)</span>
                                <h5 class="info">$10.00</h5>
                            </li>
                        </ul>
                        <div class="product-bid-area">
                            <form class="product-bid-form">
                                <div class="search-icon">
                                    <img src="{{ asset('frontend/assets/images/product/search-icon.png')}}" alt="product">
                                </div>
                                <input type="text" placeholder="Enter you bid amount">
                                <button type="submit" class="custom-button">Submit a bid</button>
                            </form>
                        </div>
                        <div class="buy-now-area">
                            <a href="#0" class="custom-button">Buy Now: $4,200</a>
                            <a href="#0" class="rating custom-button active border"><i class="fas fa-star"></i> Add to Wishlist</a>
                            <div class="share-area">
                                <span>Share to:</span>
                                <ul>
                                    <li>
                                        <a href="#0"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#0"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#0"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="#0"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="product-sidebar-area">
                        <div class="product-single-sidebar mb-3">
                            <h6 class="title">This Auction Ends in:</h6>
                            <div class="countdown">
                                <div id="bid_counter1"></div>
                            </div>
                            <div class="side-counter-area">
                                <div class="side-counter-item">
                                    <div class="thumb">
                                        <img src="{{ asset('frontend/assets/images/product/icon1.png')}}" alt="product">
                                    </div>
                                    <div class="content">
                                        <h3 class="count-title"><span class="counter">61</span></h3>
                                        <p>Active Bidders</p>
                                    </div>
                                </div>
                                <div class="side-counter-item">
                                    <div class="thumb">
                                        <img src="{{ asset('frontend/assets/images/product/icon2.png')}}" alt="product">
                                    </div>
                                    <div class="content">
                                        <h3 class="count-title"><span class="counter">203</span></h3>
                                        <p>Watching</p>
                                    </div>
                                </div>
                                <div class="side-counter-item">
                                    <div class="thumb">
                                        <img src="{{ asset('frontend/assets/images/product/icon3.png')}}" alt="product">
                                    </div>
                                    <div class="content">
                                        <h3 class="count-title"><span class="counter">{{ $product->bids->count() }}</span></h3>
                                        <p>Total Bids</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#0" class="cart-link">View Shipping, Payment & Auction Policies</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-tab-menu-area mb-40-60 mt-70-100">
            <div class="container">
                <ul class="product-tab-menu nav nav-tabs">
                    <li>
                        <a href="#details" class="active" data-toggle="tab">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/images/product/tab1.png')}}" alt="product">
                            </div>
                            <div class="content">Description</div>
                        </a>
                    </li>
                    <li>
                        <a href="#delevery" data-toggle="tab">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/images/product/tab2.png')}}" alt="product">
                            </div>
                            <div class="content">Delivery Options</div>
                        </a>
                    </li>
                    <li>
                        <a href="#history" data-toggle="tab">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/images/product/tab3.png')}}" alt="product">
                            </div>
                            <div class="content">Bid History (36)</div>
                        </a>
                    </li>
                    <li>
                        <a href="#questions" data-toggle="tab">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/images/product/tab4.png')}}" alt="product">
                            </div>
                            <div class="content">Questions </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="details">
                    <div class="tab-details-content">
                        <div class="header-area">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="delevery">
                    <div class="shipping-wrapper">
                        <div class="item">
                            <h5 class="title">shipping</h5>
                            <div class="table-wrapper">
                                <table class="shipping-table">
                                    <thead>
                                        <tr>
                                            <th>Available delivery methods </th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Customer Pick-up (within 10 days)</td>
                                            <td>$0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Standard Shipping (5-7 business days)</td>
                                            <td>Not Applicable</td>
                                        </tr>
                                        <tr>
                                            <td>Expedited Shipping (2-4 business days)</td>
                                            <td>Not Applicable</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="item">
                            <h5 class="title">Notes</h5>
                            <p>Please carefully review our shipping and returns policy before committing to a bid.
                            From time to time, and at its sole discretion, Sbidu may change the prevailing fee structure for shipping and handling.</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="history">
                    <div class="history-wrapper">
                        <div class="item">
                            <h5 class="title">Bid History</h5>
                            <div class="history-table-area">
                                <table class="history-table">
                                    <thead>
                                        <tr>
                                            <th>Bidder</th>
                                            <th>date</th>
                                            <th>time</th>
                                            <th>unit price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-history="bidder">
                                                <div class="user-info">
                                                    <div class="thumb">
                                                        <img src="{{ asset('frontend/assets/images/history/01.png')}}" alt="history">
                                                    </div>
                                                    <div class="content">
                                                        Moses Watts
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-history="date">06/16/2024</td>
                                            <td data-history="time">02:45:25 PM</td>
                                            <td data-history="unit price">$900.00</td>
                                        </tr>
                                        <tr>
                                            <td data-history="bidder">
                                                <div class="user-info">
                                                    <div class="thumb">
                                                        <img src="{{ asset('frontend/assets/images/history/02.png')}}" alt="history">
                                                    </div>
                                                    <div class="content">
                                                        Pat Powell
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-history="date">06/16/2024</td>
                                            <td data-history="time">02:45:25 PM</td>
                                            <td data-history="unit price">$900.00</td>
                                        </tr>
                                        <tr>
                                            <td data-history="bidder">
                                                <div class="user-info">
                                                    <div class="thumb">
                                                        <img src="{{ asset('frontend/assets/images/history/03.png')}}" alt="history">
                                                    </div>
                                                    <div class="content">
                                                        Jack Rodgers
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-history="date">06/16/2024</td>
                                            <td data-history="time">02:45:25 PM</td>
                                            <td data-history="unit price">$900.00</td>
                                        </tr>
                                        <tr>
                                            <td data-history="bidder">
                                                <div class="user-info">
                                                    <div class="thumb">
                                                        <img src="{{ asset('frontend/assets/images/history/04.png')}}" alt="history">
                                                    </div>
                                                    <div class="content">
                                                        Arlene Paul
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-history="date">06/16/2024</td>
                                            <td data-history="time">02:45:25 PM</td>
                                            <td data-history="unit price">$900.00</td>
                                        </tr>
                                        <tr>
                                            <td data-history="bidder">
                                                <div class="user-info">
                                                    <div class="thumb">
                                                        <img src="{{ asset('frontend/assets/images/history/05.png')}}" alt="history">
                                                    </div>
                                                    <div class="content">
                                                        Marcia Clarke
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-history="date">06/16/2024</td>
                                            <td data-history="time">02:45:25 PM</td>
                                            <td data-history="unit price">$900.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="text-center mb-3 mt-4">
                                    <a href="#0" class="button-3">Load More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="questions">
                        <h5 class="faq-head-title">Frequently Asked Questions</h5>
                        <div class="faq-wrapper">
                            <div class="faq-item">
                                <div class="faq-title">
                                    <img src="{{ asset('frontend/assets/css/img/faq.png')}}" alt="css"><span class="title">How to start bidding?</span><span class="right-icon"></span>
                                </div>
                                <div class="faq-content">
                                    <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <div class="faq-title">
                                    <img src="{{ asset('frontend/assets/css/img/faq.png')}}" alt="css"><span class="title">Security Deposit / Bidding Power </span><span class="right-icon"></span>
                                </div>
                                <div class="faq-content">
                                    <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <div class="faq-title">
                                    <img src="{{ asset('frontend/assets/css/img/faq.png')}}" alt="css"><span class="title">Delivery time to the destination port </span><span class="right-icon"></span>
                                </div>
                                <div class="faq-content">
                                    <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <div class="faq-title">
                                    <img src="{{ asset('frontend/assets/css/img/faq.png')}}" alt="css"><span class="title">How to register to bid in an auction?</span><span class="right-icon"></span>
                                </div>
                                <div class="faq-content">
                                    <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                                </div>
                            </div>
                            <div class="faq-item open active">
                                <div class="faq-title">
                                    <img src="{{ asset('frontend/assets/css/img/faq.png')}}" alt="css"><span class="title">How will I know if my bid was successful?</span><span class="right-icon"></span>
                                </div>
                                <div class="faq-content">
                                    <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <div class="faq-title">
                                    <img src="{{ asset('frontend/assets/css/img/faq.png')}}" alt="css"><span class="title">What happens if I bid on the wrong lot?</span><span class="right-icon"></span>
                                </div>
                                <div class="faq-content">
                                    <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Product Details Section Ends Here =============-->


@endsection
