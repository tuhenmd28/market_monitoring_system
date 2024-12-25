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
                        <a class="side-menu__item {{ Route::is(['admin.category_size.create', 'admin.category_gsm.create', 'admin.category_color.create', 'admin.category_unit.create', 'admin.cost_category.create']) ? ' active' : '' }}"
                            data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="feather feather-headphones sidemenu_icon"></i>
                            <span class="side-menu__label">Manage Category</span><i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu {{ Route::is(['admin.category_size.create', 'admin.category_gsm.create', 'admin.category_color.create', 'admin.category_unit.create', 'admin.cost_category.create']) ? 'open active' : '' }}"
                            style="{{ Route::is(['admin.category_size.create', 'admin.category_gsm.create', 'admin.category_color.create', 'admin.category_unit.create', 'admin.cost_category.create']) ? 'display:block;' : 'display:none' }}">
                            <li><a class="slide-item {{ Route::is(['admin.category_size.create']) ? 'active' : '' }}"
                                    href="{{ route('admin.category_size.create') }}">Size</a>
                            </li>
                            <li><a class="slide-item {{ Route::is(['admin.category_gsm.create']) ? 'active' : '' }}"
                                    href="{{ route('admin.category_gsm.create') }}">GSM</a>
                            </li>
                            <li><a class="slide-item {{ Route::is(['admin.category_color.create']) ? 'active' : '' }}"
                                    href="{{ route('admin.category_color.create') }}">Color</a>
                            </li>
                            <li><a class="slide-item {{ Route::is(['admin.category_unit.create']) ? 'active' : '' }}"
                                    href="{{ route('admin.category_unit.create') }}">Unit</a>
                            </li>
                            <li><a class="slide-item {{ Route::is(['admin.cost_category.create']) ? 'active' : '' }}"
                                    href="{{ route('admin.cost_category.create') }}">Cost Category</a>
                            </li>



                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ Route::is(['admin.party.create', 'admin.party.index', 'admin.purchase_party.create', 'admin.purchase_party.create']) ? ' active' : '' }}"
                            data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="feather feather-headphones sidemenu_icon"></i>
                            <span class="side-menu__label">Manage Party</span><i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu {{ Route::is(['admin.party.create', 'admin.party.index', 'admin.purchase_party.create', 'admin.purchase_party.create']) ? ' open active' : '' }}"
                            style="display:{{ Route::is(['admin.party.create', 'admin.party.index', 'admin.purchase_party.create', 'admin.purchase_party.create']) ? 'block; ' : 'none;' }}">
                            {{-- <li class="side-menu-label1"><a  href="javascript:void(0);">Support System</a></li> --}}
                            <li class="sub-slide">
                                <a class="sub-side-menu__item {{ Route::is(['admin.party.create', 'admin.party.index']) ? '  active' : '' }}"
                                    data-bs-toggle="sub-slide" href="javascript:void(0);"><span
                                        class="sub-side-menu__label">Sale Party</span><i
                                        class="sub-angle fa fa-angle-right"></i></a>
                                <ul class="sub-slide-menu {{ Route::is(['admin.party.create', 'admin.party.index']) ? ' open active' : '' }}"
                                    style="display:{{ Route::is(['admin.party.create', 'admin.party.index']) ? 'block; ' : 'none;' }}">
                                    <li><a class="sub-slide-item {{ Route::is(['admin.party.create']) ? '  active' : '' }}"
                                            href="{{ route('admin.party.create') }}">Add Sale
                                            Party</a></li>
                                    <li><a class="sub-slide-item {{ Route::is(['admin.party.index']) ? '  active' : '' }}"
                                            href="{{ route('admin.party.index') }}">Sale Party
                                            List</a></li>
                                </ul>
                            </li>
                            <li class="sub-slide">
                                <a class="sub-side-menu__item {{ Route::is(['admin.purchase_party.create', 'admin.purchase_party.index']) ? '  active' : '' }}"
                                    data-bs-toggle="sub-slide" href="javascript:void(0);"><span
                                        class="sub-side-menu__label">Purchase
                                        Party</span><i class="sub-angle fa fa-angle-right"></i></a>
                                <ul class="sub-slide-menu {{ Route::is(['admin.purchase_party.create', 'admin.purchase_party.index']) ? ' open active' : '' }}"
                                    style="display:{{ Route::is(['admin.purchase_party.create', 'admin.purchase_party.index']) ? 'block; ' : 'none;' }}">
                                    <li><a class="sub-slide-item {{ Route::is(['admin.purchase_party.create']) ? '  active' : '' }}"
                                            href="{{ route('admin.purchase_party.create') }}">Add Purchase Party</a>
                                    </li>
                                    <li><a class="sub-slide-item {{ Route::is(['admin.purchase_party.index']) ? '  active' : '' }}"
                                            href="{{ route('admin.purchase_party.index') }}">Purchase Party List</a>
                                    </li>
                                </ul>
                            </li>


                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ Route::is(['admin.sale_product.index', 'admin.sale_product.create', 'admin.purchase_product.index', 'admin.purchase_product.create']) ? 'active' : '' }}"
                            data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="feather feather-headphones sidemenu_icon"></i>
                            <span class="side-menu__label">Manage Product</span><i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul
                            class="slide-menu {{ Route::is(['admin.sale_product.index', 'admin.sale_product.create', 'admin.purchase_product.index', 'admin.purchase_product.create']) ? 'open active' : '' }}">
                            {{-- <li class="side-menu-label1"><a  href="javascript:void(0);">Support System</a></li> --}}
                            <li class="sub-slide">
                                <a class="sub-side-menu__item {{ Route::is(['admin.sale_product.index', 'admin.sale_product.create']) ? 'active' : '' }}"
                                    data-bs-toggle="sub-slide" href="javascript:void(0);"><span
                                        class="sub-side-menu__label">Sale
                                        Product</span><i class="sub-angle fa fa-angle-right"></i></a>
                                <ul
                                    class="sub-slide-menu {{ Route::is(['admin.sale_product.index', 'admin.sale_product.create']) ? 'open active' : '' }}">
                                    <li><a class="sub-slide-item {{ Route::is(['admin.sale_product.create']) ? 'active' : '' }}"
                                            href="{{ route('admin.sale_product.create') }}">Add
                                            Sale product</a></li>
                                    <li><a class="sub-slide-item {{ Route::is(['admin.sale_product.index']) ? 'active' : '' }}"
                                            href="{{ route('admin.sale_product.index') }}">Sale
                                            Product List</a></li>

                                </ul>
                            </li>
                            <li class="sub-slide">
                                <a class="sub-side-menu__item {{ Route::is(['admin.purchase_product.index', 'admin.purchase_product.create']) ? 'active' : '' }}"
                                    data-bs-toggle="sub-slide" href="javascript:void(0);"><span
                                        class="sub-side-menu__label">Purchase
                                        Product</span><i class="sub-angle fa fa-angle-right"></i></a>
                                <ul
                                    class="sub-slide-menu {{ Route::is(['admin.purchase_product.index', 'admin.purchase_product.create']) ? 'open active' : '' }}">
                                    <li><a class="sub-slide-item {{ Route::is(['admin.purchase_product.create']) ? 'active' : '' }}"
                                            href="{{ route('admin.purchase_product.create') }}">Add Purchase
                                            Product</a></li>
                                    <li><a class="sub-slide-item {{ Route::is(['admin.purchase_product.index']) ? 'active' : '' }}"
                                            href="{{ route('admin.purchase_product.index') }}">Purchase Product
                                            List</a></li>
                                </ul>
                            </li>


                        </ul>
                    </li>





                    <li class="slide ">
                        <a class="side-menu__item {{ Route::is(['admin.sale.create', 'admin.sale.index', 'admin.productList']) ? 'active' : '' }}"
                            data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="feather feather-sliders sidemenu_icon"></i>
                            <span class="side-menu__label">Manage Sale </span><i
                                class="angle fa fa-angle-right"></i></a>
                        <ul
                            class="slide-menu {{ Route::is(['admin.sale.create', 'admin.sale.index', 'admin.productList']) ? 'open active' : '' }}">
                            <li><a href="{{ route('admin.sale.create') }}"
                                    class="slide-item {{ Route::is(['admin.sale.create']) ? 'active' : '' }}">Sale
                                    Product</a>
                            </li>

                            <li><a href="{{ route('admin.sale.index') }}"
                                    class="slide-item {{ Route::is(['admin.sale.index']) ? 'active' : '' }}">Sale List</a>
                            </li>
                            <li><a class="slide-item {{ Route::is(['admin.productList']) ? 'active' : '' }}"
                                    href="{{ route('admin.productList') }}">Specific Product
                                    Sale</a></li>
                        </ul>
                    </li>
                    <li class="slide ">
                        <a class="side-menu__item {{ Route::is(['admin.purchase.create', 'admin.purchase.index']) ? 'active' : '' }}"
                            data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="feather feather-sliders sidemenu_icon"></i>
                            <span class="side-menu__label">Manage Purchase </span><i
                                class="angle fa fa-angle-right"></i></a>
                        <ul
                            class="slide-menu {{ Route::is(['admin.purchase.create', 'admin.purchase.index']) ? 'open active' : '' }}">
                            <li><a href="{{ route('admin.purchase.create') }}"
                                    class="slide-item {{ Route::is(['admin.purchase.create']) ? 'active' : '' }}">Purchase
                                    Product</a>
                            </li>

                            <li><a href="{{ route('admin.purchase.index') }}"
                                    class="slide-item {{ Route::is(['admin.purchase.index']) ? 'active' : '' }}">Purchase
                                    List</a>
                            </li>
                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item {{ Route::is(['admin.sale_stock.create', 'admin.sale_stock.index', 'admin.purchase_stock.create', 'admin.purchase_stock.index', 'admin.purchaseStockAdjustMultiple', 'admin.saleStockAdjust']) ? 'active' : '' }}"
                            data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="feather feather-headphones sidemenu_icon"></i>
                            <span class="side-menu__label">Manage Stock</span><i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul
                            class="slide-menu {{ Route::is(['admin.sale_stock.create', 'admin.sale_stock.index', 'admin.purchase_stock.create', 'admin.purchase_stock.index', 'admin.purchaseStockAdjustMultiple', 'admin.saleStockAdjust']) ? 'open active' : '' }}">
                            {{-- <li class="side-menu-label1"><a  href="javascript:void(0);">Support System</a></li> --}}
                            <li class="sub-slide">
                                <a class="sub-side-menu__item {{ Route::is(['admin.sale_stock.create', 'admin.sale_stock.index', 'admin.saleStockAdjust']) ? 'active' : '' }}"
                                    data-bs-toggle="sub-slide" href="javascript:void(0); "><span
                                        class="sub-side-menu__label">Sale Stock</span><i
                                        class="sub-angle fa fa-angle-right"></i></a>
                                <ul
                                    class="sub-slide-menu {{ Route::is(['admin.sale_stock.create', 'admin.sale_stock.index', 'admin.saleStockAdjust']) ? 'open active' : '' }}">
                                    <li><a class="sub-slide-item {{ Route::is(['admin.sale_stock.create']) ? 'active' : '' }}"
                                            href="{{ route('admin.sale_stock.create') }}">Add
                                            Sale Stock</a></li>
                                    <li><a class="sub-slide-item {{ Route::is(['admin.saleStockAdjust']) ? 'active' : '' }}"
                                            href="{{ route('admin.saleStockAdjust') }}">Adjust
                                            Sale Stock</a></li>
                                    <li><a class="sub-slide-item {{ Route::is(['admin.sale_stock.index']) ? 'active' : '' }}"
                                            href="{{ route('admin.sale_stock.index') }}">Sale
                                            Stock List</a></li>
                                </ul>
                            </li>
                            <li class="sub-slide">
                                <a class="sub-side-menu__item {{ Route::is(['admin.purchase_stock.create', 'admin.purchase_stock.index', 'admin.purchaseStockAdjustMultiple']) ? 'active' : '' }}"
                                    data-bs-toggle="sub-slide" href="javascript:void(0);"><span
                                        class="sub-side-menu__label">Purchase
                                        Stock</span><i class="sub-angle fa fa-angle-right"></i></a>
                                <ul
                                    class="sub-slide-menu {{ Route::is(['admin.purchase_stock.create', 'admin.purchase_stock.index', 'admin.purchaseStockAdjustMultiple']) ? 'open active' : '' }}">
                                    <li><a class="sub-slide-item {{ Route::is(['admin.purchase_stock.create']) ? 'active' : '' }}"
                                            href="{{ route('admin.purchase_stock.create') }}">Add Purchase Stock</a>
                                    </li>
                                    <li><a class="sub-slide-item {{ Route::is(['purchaseStockAdjustMultiple']) ? 'active' : '' }} "
                                            href="{{ route('admin.purchaseStockAdjustMultiple') }}">Adjust Purchase
                                            Stock</a></li>
                                    <li><a class="sub-slide-item {{ Route::is(['admin.purchase_stock.index']) ? 'active' : '' }}"
                                            href="{{ route('admin.purchase_stock.index') }}">Purchase Stock List</a>
                                    </li>
                                </ul>
                            </li>


                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ Route::is(['admin.due_collection.create','admin.due_collection.index'])?'active':'' }}" data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="feather feather-headphones sidemenu_icon"></i>
                            <span class="side-menu__label">Due Collection</span><i
                                class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu {{ Route::is(['admin.due_collection.create','admin.due_collection.index'])?'open active':'' }}">
                            <li><a class="slide-item {{ (Route::is(['admin.due_collection.create']) && isset($due) && $due == 1)?'active':'' }}"
                                    href="{{ route('admin.due_collection.create') . '?due=1' }}">Collect Sale Due</a>
                            </li>
                            <li><a class="slide-item {{ (Route::is(['admin.due_collection.create']) && isset($due) && $due == 2)?'active':'' }}"
                                    href="{{ route('admin.due_collection.create') . '?due=2' }}">Pay
                                    Purchase Due</a></li>
                            <li><a class="slide-item {{ (Route::is(['admin.due_collection.index']) && isset($due) && $due == 1)?'active':'' }}"
                                    href="{{ route('admin.due_collection.index') . '?due=1' }}">Sale
                                    Due List</a></li>
                            <li><a class="slide-item {{ (Route::is(['admin.due_collection.index']) && isset($due) && $due == 2)?'active':'' }}"
                                    href="{{ route('admin.due_collection.index') . '?due=2' }}">Purchase Pay List</a>
                            </li>





                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ Route::is(['admin.advance_collection.create','admin.advance_collection.index'])?'active':'' }}" data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="feather feather-headphones sidemenu_icon"></i>
                            <span class="side-menu__label">Advance Collection</span><i
                                class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu {{ Route::is(['admin.advance_collection.create','admin.advance_collection.index'])?'open active':'' }}">
                            <li><a class="slide-item {{ (Route::is(['admin.advance_collection.create']) && isset($advance) && $advance == 1)?'active':'' }}"
                                    href="{{ route('admin.advance_collection.create') . '?advance=1' }}">Collect Sale
                                    Advance</a>
                            </li>
                            <li><a class="slide-item {{ (Route::is(['admin.advance_collection.create']) && isset($advance) && $advance == 2)?'active':'' }}"
                                    href="{{ route('admin.advance_collection.create') . '?advance=2' }}">Pay
                                    Purchase Advance</a></li>
                            <li><a class="slide-item {{ (Route::is(['admin.advance_collection.index']) && isset($advance) && $advance == 1)?'active':'' }}"
                                    href="{{ route('admin.advance_collection.index') . '?advance=1' }}">Sale
                                    Advance List</a></li>
                            <li><a class="slide-item {{ (Route::is(['admin.advance_collection.index']) && isset($advance) && $advance == 2)?'active':'' }}"
                                    href="{{ route('admin.advance_collection.index') . '?advance=2' }}">Purchase Pay
                                    List</a></li>





                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ Route::is(['admin.daily_production.create','admin.daily_production.index'])?'active':'' }}" data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="feather feather-headphones sidemenu_icon"></i>
                            <span class="side-menu__label">Daily Production </span><i
                                class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu {{ Route::is(['admin.daily_production.create','admin.daily_production.index'])?'open active':'' }}">
                            <li><a class="slide-item {{ Route::is(['admin.daily_production.create'])?'active':'' }}" href="{{ route('admin.daily_production.create') }}">Add
                                    Production</a>
                            </li>
                            <li><a class="slide-item {{ Route::is(['admin.daily_production.index'])?'active':'' }}" href="{{ route('admin.daily_production.index') }}">Production
                                    List</a></li>

                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item {{ Route::is(['admin.daily_expenditure.create','admin.daily_expenditure.index'])?'active':'' }}" data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="feather feather-headphones sidemenu_icon"></i>
                            <span class="side-menu__label">Daily Expenditure</span><i
                                class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu {{ Route::is(['admin.daily_expenditure.create','admin.daily_expenditure.index'])?'open active':'' }}">
                            <li><a class="slide-item {{ Route::is(['admin.daily_expenditure.create'])?'active':'' }}" href="{{ route('admin.daily_expenditure.create') }}">Add
                                    Expenditure</a>
                            </li>
                            <li><a class="slide-item {{ Route::is(['admin.daily_expenditure.index'])?'active':'' }}" href="{{ route('admin.daily_expenditure.index') }}">Expenditure
                                    List</a></li>

                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ Route::is(['admin.employe.create','admin.employe.index','admin.salary.create','admin.salary.index'])?'active':"" }}" data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="feather feather-headphones sidemenu_icon"></i>
                            <span class="side-menu__label">Employee Management</span><i
                                class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu {{ Route::is(['admin.employe.create','admin.employe.index','admin.salary.create','admin.salary.index'])?'open active':'' }}">
                            <li><a class="slide-item {{ Route::is(['admin.employe.create'])?'active':'' }}" href="{{ route('admin.employe.create') }}">Add Employee</a>
                            </li>
                            <li><a class="slide-item {{ Route::is(['admin.employe.index'])?'active':'' }}" href="{{ route('admin.employe.index') }}">Employee List</a>
                            </li>
                            <li><a class="slide-item {{ Route::is(['admin.salary.create'])?'active':'' }}" href="{{ route('admin.salary.create') }}">Add Salary</a></li>
                            <li><a class="slide-item {{ Route::is(['admin.salary.index'])?'active':'' }}" href="{{ route('admin.salary.index') }}">Salary List</a></li>

                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ Route::is(['admin.consideration.create','admin.consideration.index'])?'active':'' }}" data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="feather feather-headphones sidemenu_icon"></i>
                            <span class="side-menu__label">Consideration</span><i
                                class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu {{ Route::is(['admin.consideration.create','admin.consideration.index'])?'open active':'' }}">
                            <li><a class="slide-item {{ Route::is(['admin.consideration.create'])?'active':'' }}" href="{{ route('admin.consideration.create') }}">Add Consideration</a>
                            </li>
                            <li><a class="slide-item {{ Route::is(['admin.consideration.index'])?'active':'' }}" href="{{ route('admin.consideration.index') }}">Consideration
                                    List</a></li>

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




                    </ul>
                    </li>
                @endrole




                </ul>
            </div>
        </div>
    </aside>
</div>



