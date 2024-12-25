<!DOCTYPE html>
<html lang="en" dir="ltr">
<!-- BEGIN: Head-->

<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="" name="description">
    <meta content="" name="author">
    <meta name="" content="" />
    @if (\Spatie\Multitenancy\Models\Tenant::checkCurrent())
        @php
            $user = \App\Models\User::where('user_name', app('currentTenant')->subdomain)->first();
            $site_name = $user->name;
        @endphp
    @else
        @php
            $site_name = env('APP_NAME');
        @endphp
    @endif

    <title> @yield('title') - {{ Str::ucfirst($site_name) }} | {{ config('app.name') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="icon" href="{{ asset('favco.png') }}" type="image/x-icon" />
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" id="style" />


    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/animated.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/themes/toastr.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/flatpickr.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/fileupload/css/dropify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/themes/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/themes/bootstrap-clockpicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/themes/jquery-clockpicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/fileupload/css/dropify.min.css') }}" rel="stylesheet" />




    @stack('styles')

    <style>
        .wrapper {
            display: flex;
            justify-content: space-between;
        }

        .calculateTable tr th {
            color: white;
            font-weight: 900;
        }

        .tabs-menu1 ul li .active {
            background: #3366ff;
            color: white;
        }

        ul.active.open {
            display: block;
        }

        @media (max-width: 991px) {
            .app .app-sidebar .app-sidebar3 {
                margin-top: 88px;
            }
        }

        @media (min-width: 992px) {
            .sidenav-toggled .header-brand-img.dark-logo {
                display: block;
            }
        }

        .row.flex-lg-nowrap .col-12 {
            padding: 0 !important;
        }

        .richText .richText-editor {

            height: 225px;

        }

        .app-sidebar__logo img {
            width: 60px;
        }

        .app-sidebar__logo {
            /* padding:0; */
            align-items: center;
            /* justify-content: center; */

        }

        .previewImg {
            gap: 10px;
            margin: 10px;
        }

        .multiple_image_preview {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 10px;
            flex-wrap: wrap;
        }

        .multiple_image_preview img {
            width: 150px;
            box-shadow: 0 0 5px #0000003b;
        }

        .previewImg img {
            box-shadow: 0 0 4px #0000003b;
            width: 150px;
            height: auto;
        }

        table td:has(img) {
            text-align: center;
        }

        .app-sidebar__logo.d-flex {
            background: #fff !important;
        }

        #loader {
            display: none;
        }

        .lds-dual-ring {
            display: block;
            width: 80px;
            height: 80px;
            position: relative;
            z-index: 999;
            margin: auto;
        }

        .lds-dual-ring:after {
            content: " ";
            position: absolute;
            display: block;
            z-index: 999999;
            width: 64px;
            height: 64px;
            margin: 8px;
            border-radius: 50%;
            border: 6px solid green;
            border-color: green transparent green transparent;
            animation: lds-dual-ring 1.2s linear infinite;
        }

        @keyframes lds-dual-ring {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .alert-dismissible .btn-close {
            position: absolute;
            top: 0;
            right: 0;
            z-index: 2;
            padding: 0;
            height: 100%;
            color: #fff;
            font-size: 40px;
            adding-right: 10px;
        }

        .separator {
            display: flex;
            align-items: center;
            text-align: center;
        }

        .separator::before,
        .separator::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #000;
        }

        .separator:not(:empty)::before {
            margin-right: .25em;
        }

        .separator:not(:empty)::after {
            margin-left: .25em;
        }

        .ui-datepicker-today .ui-state-highlight {
            color: black !important;
        }

        .nav-tt-menu {
            position: absolute;
            top: 100%;
            left: 3px;
            z-index: 100;
            display: block;
            background: rgb(245, 245, 245);
            width: 98%;
            box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
        }

        .nav-suggestion-hover:hover {
            background: #e7e7e7
        }

        /* .w-90{
            width: 90%!important;
        } */
        .nav-suggestion-row {
            display: flex;
            align-items: center;
            padding: 5px 10px 10px 10px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
        }

        .nav-avatar {
            position: relative;
            display: inline-block;
            width: 40px;
            white-space: nowrap;
            vertical-align: bottom;
            border-radius: 1000px;
            background: transparent;
        }

        .nav-avatar-small {
            width: 40px;
            height: 40px;
            border: 1px solid #eee;
            background: aliceblue;
            border-radius: 50%;
        }

        .mr-15 {
            margin-right: 15px !important;
        }

        .nav-suggestion-details-row {
            display: flex;
        }

        .nav-suggestion-details-row span {
            margin-right: 12px
        }

        .clockpicker-popover {
            z-index: 10101 !important;
        }

        .note-editor.note-frame.panel.panel-default {
            border: 1px solid lightgrey;
        }

        .attendance_modal_xl {
            margin-left: -14% !important;
            width: 130% !important;
        }

        .pandingStatus h1 {
            color: red !important;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        .pandingStatus {
            position: absolute;
            left: 0;
            top: 0;
            display: flex;
            width: 100%;
            height: 100%;
            background: #0000003b;
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }

        .sub-slide-item {
            padding: 8px 0 8px 30px;
        }

        .app-header .header-brand .header-brand-img.mobile-logo {
            margin: auto;
            width: 60px;
        }

        .app-sidebar3 {
            height: 100%;
            overflow-y: auto;
        }

        .placeholder {
            background: transparent !important;
        }

        select.form-control.disabled~.CaptionCont {
            background: #f5f6fb;
            pointer-events: none;
        }

        select.form-control.disabled {
            pointer-events: none;

        }

        select.form-controll.serchBox.SumoUnder.disabled,
        select.form-controll.serchBox.SumoUnder.disabled~.CaptionCont {
            background: #f5f6fb;
            pointer-events: none;
        }

        .app-sidebar__logo.d-flex {
            justify-content: center;
        }

        .app-sidebar__logo img {
            width: 100px;
        }

        .contentDisabled {
            opacity: .4;
            pointer-events: none;
        }

        /* body.app.sidebar-mini.ltr.main-navbar-show.sidenav-toggled */
    </style>

</head>


<body class="app sidebar-mini ltr">
    <div id="global-loader">
        <img src="{{ asset('assets/images/svgs/loader.svg') }}" alt="loader">
    </div>

    @include('layouts.navbar.navbar')

    <div class="page" id="mainNavShow">
        <div class="page-main">



            @include('layouts.sidebars.admin_sidebar')

            {{-- <div class="app-content main-content">
                <div class="m-4">
                    @include('common._alert')
                </div>
            </div> --}}
            @yield('content')

            <!--Footer-->
            <footer class="footer">
                <div class="container ">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
                            Copyright © {{ date('Y') }} | Developed by <a href="javascript:void(0);"
                                class="text-primary">Md.Mehedi hasan Tuhen</a> All rights reserved.
                        </div>
                    </div>
                </div>
            </footer>



        </div>
    </div>

    </div>

    <div id="loader">
        <div class="lds-dual-ring "></div>

    </div>












    <a href="#top" id="back-to-top"><span class="feather feather-chevrons-up"></span></a>

    <!-- Jquery js-->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

    <!--Moment js-->
    <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!--Othercharts js-->
    <script src="{{ asset('assets/plugins/othercharts/jquery.sparkline.min.js') }}"></script>

    <!--Sidemenu js-->
    <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- P-scroll js-->
    {{-- <script src="{{ asset('assets/plugins/p-scrollbar/p-scrollbar.js') }}"></script>
<script src="{{ asset('assets/plugins/p-scrollbar/p-scroll1.js') }}"></script> --}}

    <!--Sidebar js-->
    {{-- <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script> --}}

    <!-- Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>

    <!-- INTERNAL Peitychart js-->
    <script src="{{ asset('assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/peitychart/peitychart.init.js') }}"></script>

    <!-- INTERNAL Apexchart js-->
    <script src="{{ asset('assets/plugins/apexchart/apexcharts.js') }}"></script>

    <!-- INTERNAL Vertical-scroll js-->
    <script src="{{ asset('assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js') }}"></script>
    <script src="{{ asset('assets/plugins/vertical-scroll/vertical-scroll.js') }}"></script>

    <!-- INTERNAL  Datepicker js -->
    <script src="{{ asset('assets/plugins/date-picker/jquery-ui.js') }}"></script>

    <!-- INTERNAL Chart js -->
    <script src="{{ asset('assets/plugins/chart/chart.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/chart/utils.js') }}"></script>

    <!-- INTERNAL Timepicker js -->
    <script src="{{ asset('assets/plugins/time-picker/jquery.timepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/time-picker/toggles.min.js') }}"></script>

    <!-- INTERNAL Chartjs rounded-barchart -->
    <script src="{{ asset('assets/plugins/chart.min/chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chart.min/rounded-barchart.js') }}"></script>

    <!-- INTERNAL jQuery-countdowntimer js -->
    <script src="{{ asset('assets/plugins/jQuery-countdowntimer/jQuery.countdownTimer.js') }}"></script>

    <!--Sticky js -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>

    <!-- INTERNAL Index js-->
    <script src="{{ asset('assets/js/index1.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>
    <!-- Custom js-->
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script src="{{ asset('assets/plugins/fileupload/js/dropify.js') }}"></script>
    <script src="{{ asset('assets/js/filupload.js') }}"></script>
    <script src="{{ asset('assets/js/flatpickr.js') }}"></script>
    {{-- notification --}}
    <script src="{{ asset('assets/plugins/notify/js/rainbow.js') }}"></script>

    <script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
    <script src="{{ asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/formelementadvnced.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/form-elements.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/select2.js') }}"></script> --}}
    {{-- --}}
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>



    @stack('scripts')
    @include('common._alert')
    <script>
        $(document).ready(function() {
            const element1 = document.querySelector('.dataTables_length');
            const element2 = document.querySelector('.dt-buttons');
            const element3 = document.querySelector('.dataTables_filter');

            const wrapperDiv = document.createElement('div');
            wrapperDiv.classList.add('wrapper');
            element1.parentNode.insertBefore(wrapperDiv, element1);
            wrapperDiv.appendChild(element1);
            if (element2) {

                wrapperDiv.appendChild(element2);
            }
            wrapperDiv.appendChild(element3);

        })
        // if ($('#responsive-datatable').length) {
        //     $('#responsive-datatable').DataTable({
        //         buttons: [
        //             'copy', 'excel', 'pdf'
        //         ],
        //         layout: {
        //             topStart: 'buttons'
        //         }
        //     })
        // }
        if ($('#responsive-datatable').length) {
            // $('#responsive-datatable').dataTable().fnClearTable();
            $('#responsive-datatable').dataTable().fnDestroy();
            $('#responsive-datatable').DataTable({
                dom: 'lBftip',
                buttons: [
                    'excel', 'pdf'
                ],
            })
        }
        if ($('#package').length) {
            // $('#package').dataTable().fnClearTable();
            $('#package').dataTable().fnDestroy();
            $('#package').DataTable({
                dom: 'lftip',
                // buttons: [
                //     'excel', 'pdf'
                // ],
            })
        }

        // console.log($('#responsive-datatable').length);

        $(".rangeDatepicker").flatpickr({
            mode: "range",
            // minDate: "today",
            defaultDate: 'today',
            dateFormat: "Y-m-d",

        });
        // $(".fc-datepicker1").flatpickr({
        //     defaultDate:'today',
        // })
        $(".fc-datepicker1").flatpickr({
            defaultDate: 'today',
            maxDate: 'today',

        })
        // $(".fc-datepicker").datepicker({})
        window.Search = $('.serchBox').SumoSelect({
            csvDispCount: 3,
            search: true,
            searchText: 'Enter here.'
        });
        var imagesPreview = function(input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                            placeToInsertImagePreview);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };
        $('#multiple_image').on('change', function() {
            // console.log($(this));
            $('div.multiple_image_preview').html('');
            imagesPreview(this, 'div.multiple_image_preview');
        });
        $(document).ready(function() {
            $(".pandingStatus").on("contextmenu", function(e) {
                // Prevent the default right-click context menu
                e.preventDefault();
            });
        });


        function deleteItem(id, table) {
            Swal.fire({
                title: "Are you sure?",
                // text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.delete') }}",
                        data: {
                            table: table,
                            id: id,

                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "Deleted Successfully",
                                // text: "You clicked the button!",
                                icon: "success"
                            });
                            location.reload();

                        }
                    })
                }
            });
        }
    </script>

    <script>
        var day = document.getElementById("day");
        const d = new Date();
        const weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        let getday = weekday[d.getDay()];
        // day.innerHTML = getday;
        var time = document.getElementById("time");
        setInterval(function() {
            time.innerHTML = new Date().toLocaleTimeString([], {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true
            });

        }, 1000);
    </script>
</body>

</html>
