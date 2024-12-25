<?php



    if (\Spatie\Multitenancy\Models\Tenant::checkCurrent()) {

            $user = \App\Models\User::where('user_name', app('currentTenant')->subdomain)->first();
            $site_name =  $user->name;

    }else{
        $site_name = env("APP_NAME");
    }
?>

<div class="app-sidebar__logo d-flex" style="background-color: #3e8ef7">
    <a class="d-block" href="{{ route("admin.home") }}" >
        <img   src="{{asset('logo.png')}}" class="header-brand-img dark-logo" alt="logo">

    </a>

    {{-- <a class="header-brand" href="javascript:void(0)">


        <img src="{{asset('assets/images/logo/TUIST.png')}}" class="header-brand-img desktop-lgo" alt="TUISTlogo">
        <img src="{{asset('assets/images/logo/TUIST.png')}}" class="header-brand-img dark-logo" alt="TUISTlogo">
        <img src="{{asset('assets/images/logo/TUIST.png')}}" class="header-brand-img mobile-logo" alt="TUISTlogo">
        <img src="{{asset('assets/images/logo/TUIST.png')}}" class="header-brand-img darkmobile-logo" alt="TUISTlogo">
    </a> --}}
</div>
