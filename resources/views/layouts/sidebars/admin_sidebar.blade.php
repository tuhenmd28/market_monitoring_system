<div class="sticky">
    <aside class="app-sidebar">


        @include('layouts.sidebars.common.header')

        <div class="app-sidebar3">
            <div class="main-menu">




                <ul class="side-menu">
                    {{-- <li class="side-item side-item-category mt-4">Menu</li> --}}
                    {{-- <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.home') }}">
                            <i class="fa fa-home sidemenu_icon" aria-hidden="true"></i>
                            <span class="side-menu__label">Home</span></a>
                    </li> --}}
                    @if (auth()->user()->user_type == 1)
                        <li class="slide ">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <i class="fa fa-group sidemenu_icon"></i>
                                <span class="side-menu__label">Manage Vendor</span><i
                                    class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{ route('admin.addVendor') }}" class="slide-item">Add Vendor</a></li>
                                <li><a href="{{ route('admin.vendor_list') }}" class="slide-item">All Vendor</a></li>
                                <li><a href="{{ route('admin.vendor_list', 'old') }}" class="slide-item">Old Vendor</a>
                                </li>
                                <li><a href="{{ route('admin.vendor_list', 'approved') }}" class="slide-item">Approve
                                        Vendor</a></li>
                                <li><a href="{{ route('admin.vendor_list', 'pending') }}" class="slide-item">Pending
                                        Vendor</a></li>
                                <li><a href="{{ route('admin.vendor_list', 'rejected') }}" class="slide-item">Reject
                                        Vendor</a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="slide">
                        <a class="side-menu__item"  href="{{ route('admin.category.index') }}">
                            <i class="fa fa-list sidemenu_icon"></i>
                            <span class="side-menu__label">Category</span>
                        </a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item"  href="{{ route('admin.product_type.index') }}">
                            <i class="fa fa-list sidemenu_icon"></i>
                            <span class="side-menu__label">Product Type</span>
                        </a>
                    </li>
                    <li class="slide ">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="fa fa-group sidemenu_icon"></i>
                            <span class="side-menu__label">Product</span><i
                                class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{ route('admin.product.create') }}" class="slide-item">Add Product</a></li>
                            <li><a href="{{ route('admin.product.index') }}" class="slide-item">All Product</a></li>

                        </ul>
                    </li>








                    @role('Super Admin')
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <i class="fa fa-gear sidemenu_icon"></i>
                                <span class="side-menu__label">Settings<span class="nav-list"></span></span><i
                                    class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu" style="display: none;">
                                <li class="sub-slide">
                                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide"
                                        href="javascript:void(0);"><span class="sub-side-menu__label">Manage Role</span><i
                                            class="sub-angle fa fa-angle-right"></i></a>
                                    <ul class="sub-slide-menu" style="display: none;">
                                        <li><a class="sub-slide-item" href="{{ route('admin.role.create') }}">Add
                                                Role</a></li>
                                        <li><a class="sub-slide-item" href="{{ route('admin.role.index') }}">Role
                                                List</a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="sub-slide">
                                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide"
                                        href="javascript:void(0);"><span class="sub-side-menu__label">Manage Permission
                                        </span><i class="sub-angle fa fa-angle-right"></i></a>
                                    <ul class="sub-slide-menu" style="display: none;">
                                        <li><a class="sub-slide-item" href="{{ route('admin.permission.index') }}">Add
                                                Permission </a></li>
                                        <li><a class="sub-slide-item"
                                                href="{{ route('admin.permission.create') }}">Permission List</a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="sub-slide">
                                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide"
                                        href="javascript:void(0);"><span class="sub-side-menu__label">Assign Role
                                        </span><i class="sub-angle fa fa-angle-right"></i></a>
                                    <ul class="sub-slide-menu" style="display: none;">
                                        <li><a class="sub-slide-item" href="{{ route('admin.assignRole') }}">Add
                                                Role</a>
                                        </li>
                                        {{-- <li><a class="sub-slide-item" href="{{ route('admin.assignRole.list') }}">Permission  List</a> --}}
                                </li>

                            </ul>

                        </li>
                    @endrole




                </ul>
            </div>
        </div>
    </aside>
</div>
