@extends('layouts.skeleton')
@section('title', 'Dashboard')
@section('content')

    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-xl-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title"><span class="font-weight-normal text-dark ms-2">Home</span></div>
                </div>
                <div class="page-rightheader ms-md-auto">
                    <div class="d-flex align-items-end flex-wrap my-auto end-content breadcrumb-end">
                        <div class="d-flex">

                        </div>
                        <div class="d-lg-flex d-block">

                        </div>
                    </div>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">
                <div class="col-xxl-9 col-xl-12  col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-4 col-lg-12 col-md-12 ">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="mt-0 text-start">
                                                <a href="#">
                                                    <span class="fs-16 font-weight-semibold">Today Sale</span>
                                                </a>
                                                <h3 class="mb-0 mt-1 text-primary fs-25"></h3>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="icon1  my-auto  float-end">
                                                {{-- <i
                                                    class="feather feather-briefcase"></i> --}}
                                                <img src="{{ asset('assets/sales.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="mt-0 text-start">
                                                <span class="fs-16 font-weight-semibold">Monthly Sale</span>
                                                <h3 class="mb-0 mt-1 text-secondary fs-25"></h3>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="icon1  my-auto  float-end">
                                                {{-- <i
                                                    class="feather feather-info"></i> --}}
                                                <img src="{{ asset('assets/sales.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-xl-4 col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="mt-0 text-start">
                                                <a href="">
                                                    <span class="fs-16 font-weight-semibold">Today Production</span>
                                                </a>
                                                <h3 class="mb-0 mt-1 text-secondary fs-25"></h3>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="icon1  my-auto  float-end">
                                                {{-- <i  class="feather feather-info"></i> --}}
                                                <img src="{{ asset('assets/manufacturing.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        


                    </div>

                </div>

            </div>
            <!-- End Row -->




        </div>
    </div>

@endsection

@section('scripts')


    <!-- INTERNAL Full-calendar js-->
    {{-- <script src="{{asset('assets/plugins/fullcalendar/fullcalendar.min.js') }}"></script> --}}
    {{-- <script src="{{asset('assets/js/app-calendar-events.js') }}"></script> --}}
    {{-- <script src="{{asset('assets/js/app-calendar.js') }}"></script> --}}

    <script src="{{ asset('assets/js/chart.js') }}"></script>





@endsection
