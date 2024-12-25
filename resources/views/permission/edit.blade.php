@extends('layouts.skeleton')
@section('title', 'Edit Product')
@push('styles')
  <style>

  </style>
@endpush
@section('content')


    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-lg-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">Edit Product</div>
                </div>
                <div class="page-rightheader ms-md-auto">
                    <div class=" btn-list">



                    </div>
                </div>
            </div>

            <!--End Page header-->

            <!-- Row -->
            <div class="row flex-lg-nowrap">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <form action="{{ route('admin.product.update',$product->pro_id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-header border-bottom-0">
                                <h3 class="card-title"> Edit Product </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Product Name <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="First name" required value="{{ $product->product_name }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Product Price <span class="text-red">*</span></label>
                                            <input type="number" step=any  class="form-control" name="pro_price"
                                                placeholder="Enter Product Price" required value="{{ $product->pro_price }}">
                                        </div>
                                    </div>
                                        {{-- @if (auth()->user()->id != 1 ) --}}
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Admin Profit <span
                                                        class="text-red">*</span></label>
                                                <input type="number" step=any  class="form-control" name="admin_profit"
                                                    placeholder="Enter Admin Profit "  {{ auth()->user()->id == 1?"":'readonly' }} value="{{ $product->admin_profit }}">
                                            </div>
                                        </div>
                                        {{-- @endif --}}
                                    @if (auth()->user()->user_type == 1 || auth()->user()->user_type == 2)
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Seller Profit <span
                                                        class="text-red">*</span></label>
                                                <input type="number" step=any  class="form-control" name="seller_profit"
                                                    placeholder="Enter Seller Profit " required value="{{ $product->seller_profit }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Approve Status <span
                                                        class="text-red">*</span></label>
                                                <select name="vendor_approve_st" id="" class="form-controll select2">
                                                    <option value="" selected disabled>Select Status</option>
                                                    <option {{ $product->vendor_approve_st == 1?"selected":"" }} value="1">Approve</option>
                                                    <option {{ $product->vendor_approve_st == 0?"selected":"" }}  value="0">Panding</option>
                                                </select>

                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Product Quentity <span
                                                    class="text-red">*</span></label>
                                            <input type="number" step=any  class="form-control" name="p_qty"
                                                placeholder="Enter Product Quentity" required value="{{ $product->p_qty }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Product Description <span
                                                    class="text-red">*</span></label>
                                            <textarea class="form-control content" name="pro_descrp" placeholder="Enter Product Description" required>{!! $product->pro_descrp !!}</textarea>
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Product Code<span class="text-red">*</span></label>
										<input type="text" class="form-control" name="code" placeholder="Last name" required>
									</div>
								</div> --}}

                                    {{-- <div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Select Category<span class="text-red">*</span></label>
										<select name="category" class="form-controll select2" id="category" required>
                                            <option value=""> Select Category </option>
                                            @foreach ($category as $item)
                                                <option value="{{ $item->category_id }}">{{ $item->category_name }}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Select Sub Category<span class="text-red">*</span></label>
										<select name="category" class="form-controll select2" id="subcategory" >
                                            <option value=""> Select Sub Category </option>

                                        </select>
									</div>
								</div> --}}

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Product Image <span class="text-red">*</span></label>
                                            <input type="file" name="image"
                                            data-default-file="{{ asset('uploads/product/' . $product->product_img) }}"
                                            class="dropify" data-height="150">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Multiple Product Image <span
                                                class="text-red">*</span></label>
                                        <div class="multiple_image_preview">
                                            @foreach (explode(",",$product->multiple_img) as $item)
                                                <img src="{{ asset("uploads/product/".$item) }}" alt="">
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="images[]" id="multiple_image"
                                                multiple>
                                        </div>
                                    </div>




                                </div>
                                <button type="submit" id="submit_btn" class="btn btn-primary float-end my-5"> Update </button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- End Row -->

        </div>








    </div><!-- end app-content-->

@endsection

@push('scripts')
    <!-- INTERNAL File-Uploads Js-->
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>

    <script src="{{ asset('assets/plugins/wysiwyag/jquery.richtext.js') }}"></script>
    <script src="{{ asset('assets/js/form-editor.js') }}"></script>
    <script></script>
@endpush
