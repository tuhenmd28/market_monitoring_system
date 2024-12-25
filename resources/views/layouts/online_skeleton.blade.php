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
            $site_name =  $user->name;
        @endphp
    @else
        @php
            $site_name = env('APP_NAME');
        @endphp
    @endif

    <title> @yield('title') - {{ Str::ucfirst($site_name) }} | {{ config("app.name") }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="icon" href="{{ asset('assets/images/logo/TUIST.png') }}" type="image/x-icon" />
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" id="style" />


    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/animated.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/themes/toastr.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/fileupload/css/dropify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/themes/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/themes/bootstrap-clockpicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/themes/jquery-clockpicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/fileupload/css/dropify.min.css') }}" rel="stylesheet" />



    @stack('styles')

    <style>
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

        /* .ui-datepicker-week-end a {
            color: red !important;
        }

        .dayContainer>.flatpickr-day:nth-child(7n),
        .dayContainer>.flatpickr-day:nth-child(7n+1) {
            color: red !important;
        } */

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
    </style>

</head>



    <body class="login-img">
        <div id="global-loader">
            <img src="{{ asset('assets/images/svgs/loader.svg') }}" alt="loader">
        </div>

        {{-- @include('layouts.navbar.navbar') --}}

        @yield('content')


<a href="#top" id="back-to-top"><span style="line-height: inherit"
        class="feather feather-chevrons-up"></span></a>



<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('assets/plugins/fileupload/js/dropify.js') }}"></script>

<script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>




<script src="{{ asset('assets/plugins/date-picker/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/plugins/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('assets/plugins/date-picker/date-picker.js') }}"></script>
<script src="{{ asset('assets/plugins/input-mask/jquery.maskedinput.js') }}"></script>


<script src="{{ asset('assets/plugins/intl-tel-input-master/intlTelInput.js') }}"></script>
<script src="{{ asset('assets/plugins/intl-tel-input-master/country-select.js') }}"></script>
<script src="{{ asset('assets/plugins/intl-tel-input-master/utils.js') }}"></script>

<script src="{{ asset('assets/js/select2.js') }}"></script>
<script src="{{ asset('assets/plugins/multipleselect/multiple-select.js') }}"></script>
<script src="{{ asset('assets/plugins/multipleselect/multi-select.js') }}"></script>

<!-- INTERNAL WYSIWYG Editor js -->
<script src="{{ asset('assets/plugins/wysiwyag/jquery.richtext.js') }}"></script>
<script src="{{ asset('assets/js/form-editor.js') }}"></script>


<!-- INTERNAL summernote js -->
<script src="{{ asset('assets/plugins/summer-note/summernote1.js') }}"></script>

<!-- INTERNAL summernote js -->
<script src="{{ asset('assets/js/summernote.js') }}"></script>


<!-- INTERNAL Bootstrap-Datepicker js-->
<script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
{{-- <script src="{{ asset('assets_old/js/clockpicker.js') }}"></script> --}}
@if (Auth::check())
    <script src="{{ asset('assets/js/form-elements.js') }}"></script>
@endif


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('.dropify').dropify();

    });

    function time12hoursFourmat(value) {
        return moment(value, ["h:mm A"]).format("hh:mm A");
    }

    function dateFormat(value) {
        $result = [
            moment(value).format("D MMM, YYYY"),
            moment(value).format("MMM D, YYYY"),
            moment(value).format("MMMM D, YYYY"),
            moment(value).format("DD-MM-YYYY"),
            moment(value).format("YYYY, MMM D"),
            moment(value).format("YYYY, MMM D (dddd)"),
            moment(value).format("YYYY, MMM D (ddd)"),
        ];
        return $result;

    }
    // $('.invoice_end_date').datepicker();
</script>



@if (Auth::check())
    <script src="{{ asset('assets/plugins/othercharts/jquery.sparkline.min.js') }}"></script>

    @if (auth()->user()->user_type == 1)
        <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>
    @elseif (auth()->user()->user_type != 1 &&
            (isAllSettings(auth()->user()->institute->id) && auth()->user()->institute->subscription))
        <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>
    @endif

    <script src="{{ asset('assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/peitychart/peitychart.init.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js') }}"></script>
    <script src="{{ asset('assets/plugins/vertical-scroll/vertical-scroll.js') }}"></script>
    <script src="{{ asset('assets/plugins/chart/chart.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/chart/utils.js') }}"></script>
    <script src="{{ asset('assets/plugins/time-picker/jquery.timepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/time-picker/toggles.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chart.min/chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chart.min/rounded-barchart.js') }}"></script>
    <script src="{{ asset('assets/plugins/jQuery-countdowntimer/jQuery.countdownTimer.js') }}"></script>
    <script src="{{ asset('assets/js/index1.js') }}"></script>

    @if (auth()->user()->user_type == 1)
        <script src="{{ asset('assets/plugins/p-scrollbar/p-scrollbar.js') }}"></script>
        <script src="{{ asset('assets/plugins/p-scrollbar/p-scroll1.js') }}"></script>
    @elseif (auth()->user()->user_type != 1 &&
            (isAllSettings(auth()->user()->institute->id) && auth()->user()->institute->subscription))
        <script src="{{ asset('assets/plugins/p-scrollbar/p-scrollbar.js') }}"></script>
        <script src="{{ asset('assets/plugins/p-scrollbar/p-scroll1.js') }}"></script>
    @endif

    <script src="{{ asset('assets/js/moment.js') }}"></script>
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/jquery-clockpicker.min.js"></script> --}}

<script src="{{ asset('assets/js/sticky.js') }}"></script>
<script src="{{ asset('assets/js/themeColors.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.printPage.js') }}"></script>

@yield('scripts')



<script>
    $('.fc-new-datepicker').datepicker({
        firstDay: 1,
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 1,
        // endDate: "today",
        // maxDate: new Date(),
        onSelect: function(selectedDate) {

        }
    });

    // $('.clockpicker').clockpicker({
    //     // autoclose: true,
    //     twelvehour: true,
    // });

    $(document).ready(function() {

        $('.select2').select2({
            minimumResultsForSearch: '',
            placeholder: "Search",
            width: '100%'
        });

        $(".sub-side-menu__item, .slide-item").each(function(index) {
            if ($(this).hasClass('active')) {
                $(this).parent().parent().parent().addClass('is-expanded')
                $(this).parent().parent().addClass('open')
                $(this).parent().parent().css('display', 'block')
                $(this).parent().parent().prev().addClass('active');
                $('.app-sidebar3').animate({
                    scrollTop: parseInt($(this).parent().parent().offset().top) - 200
                }, 2000);

            }
        });
        $('.side-menu__item').each(function(index) {
            if ($(this).hasClass('active')) {
                $('.app-sidebar3').animate({
                    scrollTop: parseInt($(this).offset().top) - 200
                }, 2000);
            }
        })


        $('.dropify').dropify();
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

        $(".dropify-change").on("click", function() {
            $('#input-file-now').click()
        });

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })

        $('.ft-clockpicker').clockpicker({
            donetext: 'Done',
            placement: 'top', // clock popover placement
            align: 'left',
            autoclose: false,
            'default': 'now',
            twelvehour: true,
        });
    });

    function show_add_subject_modal() {
        $("#add_subject_modal").modal("toggle");

    }

    function show_take_attendance_modal() {
        $("#add_attendance_modal").modal("toggle");

    }


    function generateCode(length = 10) {
        let result = '';
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        const charactersLength = characters.length;
        let counter = 0;
        while (counter < length) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
            counter += 1;
        }
        return result;
    }


    function succesToaster(title = "", message = "", parameter = "") {
        toastr.success(title, message, parameter);

    }

    function errorToaster(title = "", message = "", parameter = "") {
        toastr.error(title, message, parameter);

    }

    $(function() {
        'use strict'
        // Datepicker
        $('.en-datepicker, .en-date').datepicker({
            setDate: new Date(),
            dateFormat: 'yy-mm-dd',
            firstDay: 1,
            todayHighlight: true,
            autoclose: true
        });

        var today = moment().format('YYYY-MM-DD');
        $('.en-datepicker').datepicker('setDate', today);
        // $('.en-datepicker').datepicker('update');


        $('#btn-print, .btn-print').printPage();

    });
</script>
<script>
    async function swalConfirmation(message = "Are you sure?", icon = "warning", ok_button_text = "Yes, delete it!") {

        let swal_result = false;
        await Swal.fire({
                title: message,
                icon: icon,
                showCancelButton: true,
                // buttons: ["Stop", "Do it!"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: ok_button_text
            })
            .then(async (result) => {
                if (result.isConfirmed) {
                    swal_result = true;
                }
            });
        return swal_result;
    }
    async function deleteConfirm(id, deleteURL) {

        let row = this.event.target.parentNode.parentNode.parentNode;
        if (await swalConfirmation()) {

            const payload = new FormData();
            payload.append("_token", "{{ csrf_token() }}");
            console.log(deleteURL);
            let fetched_response = await fetch(deleteURL, {
                method: "DELETE",
                // body: payload
            });

            let response = await fetched_response.json();
            if (response.msg == "success") {
                row.remove();
                succesToaster('Successfully Deleted', 'Deleted', {
                    "progressBar": true,
                    positionClass: 'toast-bottom-right'
                });
            } else if (response.msg == "error") {
                errorToaster(response.message, 'Opps', {
                    "progressBar": true,
                    positionClass: 'toast-bottom-right'
                });
            } else if (response.msg == "routine") {
                $(`.routine-target-${id}`).remove()
                succesToaster('Successfully Deleted', 'Deleted', {
                    "progressBar": true,
                    positionClass: 'toast-bottom-right'
                });
            } else {}
        }
    }
    async function confirmed(id, url) {

        let row = this.event.target.parentNode.parentNode.parentNode;
        let icon = $(this.event.target).is('i') ? $(this.event.target) : $(this.event.target).children();
        if (await swalConfirmation("Are you sure?", "question", "Yes")) {

            const payload = new FormData();
            payload.append("_token", "{{ csrf_token() }}");

            let fetched_response = await fetch(url, {
                method: "GET",
            });

            let response = await fetched_response.json();
            if (response.msg != "success") {
                succesToaster(response.msg, 'Success', {
                    "progressBar": true,
                    positionClass: 'toast-bottom-right'
                });
                if (response.hasOwnProperty('icon')) {
                    response.icon != "" ? $(icon).removeAttr('class') : null;
                    response.icon != "" ? $(icon).addClass(response.icon) : null;
                }

            } else {}
        }
    }



    function send_password(user_id) {
        const _token = document.querySelector("input[name='_token']").value;

        const payload = new FormData();
        payload.append("_token", _token);
        payload.append("user_id", user_id);


        fetch("{{ route('send_password') }}", {
                method: "POST",
                body: payload
            })
            .then(r => r.json())
            .then(r => {
                if (r.msg == "success") {

                    succesToaster('Mail Sent with password', 'Sent', {
                        "progressBar": true,
                        positionClass: 'toast-bottom-right'
                    });


                }
            });
    }
</script>

<script>
    function isNumber(e) {
        e.value = e.value.replace(/[^+0-9\.]/g, '');
    }

    function isTimeConvert(value, format = "12") {
        if (format == '12') {
            return moment(value, "h:mmA").format("HH:mm") // 12 to 24 hours Convert
        }
        return moment(value, "HH:mm").format("hh:mmA") // 12 to 24 hours Convert


    }
</script>

@if (session()->has('success'))
    <script>
        $(document).ready(function() {
            toastr.success(`{!! session()->get('success') !!}`, 'Success', {
                "progressBar": true,
                "hideDuration": 9000,
                "closeButton": true
            }, );
            // swal(
            //     '{!! session()->get('success') !!}',
            //     '',
            //     'success'
            // )
        });
    </script>
@endif

@if (session()->has('errors'))
    @if (is_object(session()->get('errors')))
        <script>
            $(document).ready(function() {
                for (const [k, i] of Object.entries({!! session()->get('errors') !!})) {
                    toastr.error(`${i}`, k, {
                        "progressBar": true
                    }, );
                }
            });
        </script>
    @else
        <script>
            $(document).ready(function() {
                toastr.error(`{!! session()->get('errors') !!}`, 'Error', {
                    "progressBar": true
                }, );
            });
        </script>
    @endif

@endif


@stack('scripts')

</body>

</html>
