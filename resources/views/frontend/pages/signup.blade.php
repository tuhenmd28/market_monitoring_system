@extends('frontend.layouts.skeleton')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" >
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
    <!--============= Hero Section Starts Here =============-->
    <div class="hero-section">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="{{ route('index') }}">Home</a>
                </li>
                <li>
                    <a href="#0">Pages</a>
                </li>
                <li>
                    <span>Sign Up</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="{{ asset('frontend/assets/images/banner/hero-bg.png') }}">
        </div>
    </div>
    <!--============= Hero Section Ends Here =============-->


    <!--============= Account Section Starts Here =============-->
    <section class="account-section padding-bottom">
        <div class="container">
            <div class="account-wrapper mt--100 mt-lg--440">
                <div class="left-side">
                    <div class="section-header" data-aos="zoom-out-down" data-aos-duration="1200">
                        <h2 class="title">SIGN UP</h2>
                        <p>We're happy you're here!</p>
                    </div>
                    {{-- <ul class="login-with">
                    <li>
                        <a href="#0"><i class="fab fa-facebook"></i>Log in with Facebook</a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-google-plus"></i>Log in with Google</a>
                    </li>
                </ul>
                <div class="or">
                    <span>Or</span>
                </div> --}}
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="seller-tab" data-bs-toggle="pill" data-bs-target="#seller" type="button" role="tab" aria-controls="seller" aria-selected="true">Seller</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="buyer-tab" data-bs-toggle="pill" data-bs-target="#buyer" type="button" role="tab" aria-controls="buyer" aria-selected="false">Buyer</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="admin-tab" data-bs-toggle="pill" data-bs-target="#admin" type="button" role="tab" aria-controls="admin" aria-selected="false">Admin</button>
                    </li>
                  </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="seller" role="tabpanel" aria-labelledby="home-tab">
                            <form class="login-form" method="post" action="{{ route('admin_signup_store') }}">
                                @csrf
                                <input type="hidden" name="status" value="3">
                                <div class="form-group mb-30">
                                    <label for="name"><i class="far fa-envelope"></i></label>
                                    <input type="text" id="name" name="name" placeholder="Enter your name">
                                </div>
                                <div class="form-group mb-30">
                                    <label for="login-email"><i class="far fa-envelope"></i></label>
                                    <input type="email" id="login-email" name="email" placeholder="Email Address">
                                </div>
                                <div class="form-group mb-30">
                                    <label for="login-pass"><i class="fas fa-lock"></i></label>
                                    <input type="password" id="login-pass" name="password" placeholder="Password">
                                    <span class="pass-type"><i class="fas fa-eye"></i></span>
                                </div>
                                <div class="form-group checkgroup mb-30">
                                    <input type="checkbox" name="terms" id="check"><label for="check">The Sbidu
                                        Terms of Use apply</label>
                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" class="custom-button">LOG IN</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="buyer" role="tabpanel" aria-labelledby="buyer-tab">
                            <form class="login-form" method="post" action="{{ route('admin_signup_store') }}">
                                @csrf
                                <input type="hidden" name="status" value="4">
                                <div class="form-group mb-30">
                                    <label for="name"><i class="far fa-envelope"></i></label>
                                    <input type="text" id="name" name="name" placeholder="Enter your name">
                                </div>
                                <div class="form-group mb-30">
                                    <label for="login-email"><i class="far fa-envelope"></i></label>
                                    <input type="email" id="login-email" name="email" placeholder="Email Address">
                                </div>
                                <div class="form-group mb-30">
                                    <label for="login-pass"><i class="fas fa-lock"></i></label>
                                    <input type="password" id="login-pass" name="password" placeholder="Password">
                                    <span class="pass-type"><i class="fas fa-eye"></i></span>
                                </div>
                                <div class="form-group checkgroup mb-30">
                                    <input type="checkbox" name="terms" id="check"><label for="check">The Sbidu
                                        Terms of Use apply</label>
                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" class="custom-button">LOG IN</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                            <form class="login-form" method="post" action="{{ route('admin_signup_store') }}">
                                @csrf
                                <input type="hidden" name="status" value="2">
                                <div class="form-group mb-30">
                                    <label for="name"><i class="far fa-envelope"></i></label>
                                    <input type="text" id="name" name="name" placeholder="Enter your name">
                                </div>
                                <div class="form-group mb-30">
                                    <label for="login-email"><i class="far fa-envelope"></i></label>
                                    <input type="email" id="login-email" name="email" placeholder="Email Address">
                                </div>
                                <div class="form-group mb-30">
                                    <label for="login-pass"><i class="fas fa-lock"></i></label>
                                    <input type="password" id="login-pass" name="password" placeholder="Password">
                                    <span class="pass-type"><i class="fas fa-eye"></i></span>
                                </div>
                                <div class="form-group checkgroup mb-30">
                                    <input type="checkbox" name="terms" id="check"><label for="check">The Sbidu
                                        Terms of Use apply</label>
                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" class="custom-button">LOG IN</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="right-side cl-white">
                    <div class="section-header mb-0">
                        <h3 class="title mt-0">ALREADY HAVE AN ACCOUNT?</h3>
                        <p>Log in and go to your Dashboard.</p>
                        <a href="{{ route('signin') }}" class="custom-button transparent">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Account Section Ends Here =============-->

@endsection
