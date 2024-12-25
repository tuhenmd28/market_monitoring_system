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
    <title> @yield('title') - {{ Str::ucfirst($site_name) }} | {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{ asset('assets/images/logo/TUIST.png') }}" type="image/x-icon" />
    @stack('styles')
    {{-- <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" id="style" /> --}}
    <link href="{{ asset('assets/css/tuhen.css') }}" rel="stylesheet" />
</head>
<body>

</body>
</html>
