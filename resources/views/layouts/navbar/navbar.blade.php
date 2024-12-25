<!--app header-->
<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex">
            <a class="header-brand" href="{{ route('admin.home') }}">
                <!-- <img src="../assets/images/brand/logo.png" class="header-brand-img desktop-lgo" alt="Dayonelogo">
                <img src="../assets/images/brand/logo-white.png" class="header-brand-img dark-logo" alt="Dayonelogo"> -->
                <img src="{{asset('logo.png')}}" class="header-brand-img mobile-logo"
                    alt="Dayonelogo">
                <!-- <img src="../assets/images/brand/favicon1.png" class="header-brand-img darkmobile-logo" alt="Dayonelogo"> -->
            </a>
            <div class="app-sidebar__toggle" data-bs-toggle="sidebar">
                <a class="open-toggle" href="javascript:void(0);">
                    <i class="feather feather-menu"></i>
                </a>
                <a class="close-toggle" href="javascript:void(0);">
                    <i class="feather feather-x"></i>
                </a>
            </div>

                <div class="mt-0">
                    <form class="form-inline">
                        <div class="search-element">
                            <input type="search" class="form-control header-search" oninput="navbarSearchInput(this)"
                                placeholder="Search…" aria-label="Search" tabindex="1">
                            <div class="nav-tt-menu border d-none">

                            </div>
                            <button type="button" class="btn btn-primary-color">
                                <i class="feather feather-search"></i>
                            </button>
                            <div class="w-100" style="position:absolute; z-index:10" id="users-list">
                            </div>
                        </div>
                    </form>
                </div>



            <!-- SEARCH -->
            <div class="d-flex order-lg-2 my-auto ms-auto">

                <button class="navbar-toggler nav-link icon navresponsive-toggler vertical-icon ms-auto" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
                </button>
                <div class="mb-0 navbar navbar-expand-lg navbar-nav-right responsive-navbar navbar-dark p-0">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex ms-auto">
                            <div class="datetime d-flex align-items-center me-2">
                                {{-- <h4 id="day">Monday</h4> --}}
                                <h4 class="mb-0 bg-success-transparent mb-0 p-2 rounded-30 text-black" id="time"></h4>
                            </div>
                            <a class="nav-link  icon p-0 nav-link-lg d-lg-none navsearch" href="javascript:void(0);"
                                data-bs-toggle="search">
                                <i class="feather feather-search search-icon header-icon"></i>
                            </a>

                            <div class="dropdown header-message">
                                <a class="nav-link icon" data-bs-toggle="dropdown">
                                    <i class="feather feather-bell header-icon"></i>
                                    <span class="badge badge-success side-badge">5</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow  animated">

                                    <div class=" text-center p-2">
                                        <a href="#" class="">See All Notification</a>
                                    </div>
                                </div>
                            </div>

                            {{--
                            <div class="dropdown header-notify">
                                <a class="nav-link icon" data-bs-toggle="sidebar-right" data-bs-target=".sidebar-right">
                                    <i class="feather feather-bell header-icon"></i>
                                    <span class="bg-dot"></span>
                                </a>
                            </div> --}}
                            <div class="dropdown profile-dropdown">
                                <a href="javascript:void(0);" class="nav-link pe-1 ps-0 leading-none"
                                    data-bs-toggle="dropdown">
                                    <span>
                                        @if (auth()->user()->photo == null)
                                        <img src="{{asset('assets/images/users/avatar5.png')}}" alt="img" class="avatar avatar-md bradius">
                                        @else
                                        <img src="{{asset('uploads/profile/'.auth()->user()->photo)}}" alt="img" class="avatar avatar-md bradius">
                                        @endif
                                        {{-- <img src=""
                                            alt="img" class="avatar avatar-md bradius"> --}}
                                    </span>
                                </a>

                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow animated">
                                        <div class="p-3 text-center border-bottom">
                                            <a href="javascript:void(0)"
                                                class="text-center user pb-0 font-weight-bold">{{ auth()->user()->name }}
                                               </a>
                                            <p class="text-center user-semi-title"></p>
                                        </div>
                                        <a class="dropdown-item d-flex" href="{{ route('admin.profile.edit',auth()->user()->id) }}">
                                            <i class="feather feather-user me-3 fs-16 my-auto"></i>
                                            <div class="mt-1">Profile</div>
                                        </a>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                        <button type="submit" class="dropdown-item d-flex" >
                                            <i class="feather feather-power me-3 fs-16 my-auto"></i>
                                            <div class="mt-1">Logout</div>
                                        </button>
                                    </form>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

