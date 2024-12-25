@extends('layouts.skeleton')
@section('title', 'Edit Product')

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
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card">

                        <form action="{{ route('admin.sale_product.update',$saleProduct->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <div class="card-header border-bottom-0">
                                <h3 class="card-title">Edit Product </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Product Name <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" value="{{ $saleProduct->name }}" name="name"
                                                placeholder="Enter Product Name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Select Size Category<span class="text-red">*</span></label>
                                            <select name="category_size_id" class="form-controll serchBox" required id="category_size_id" >
                                                <option value=""> Select Size Category </option>
                                                @foreach ($size as $item)
                                                <option {{ ($item->id == $saleProduct->size?->id)?"selected":"" }} value="{{ $item->id }}"> {{ $item->name }} </option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Select GSM Category<span class="text-red">*</span></label>
                                            <select name="category_gsm_id" class="form-controll serchBox" required id="category_gsm_id" >
                                                <option value=""> Select GSM Category </option>
                                                @foreach ($gsm as $item)
                                                <option {{ ($item->id == $saleProduct->gsm?->id)?"selected":"" }} value="{{ $item->id }}"> {{ $item->name }} </option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Select Color Category<span class="text-red">*</span></label>
                                            <select name="category_color_id" class="form-controll serchBox" required id="category_color_id" >
                                                <option value=""> Select Color Category </option>
                                                @foreach ($color as $item)
                                                <option {{ ($item->id == $saleProduct->color?->id)?"selected":"" }} value="{{ $item->id }}"> {{ $item->name }} </option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Product Price <span class="text-red">*</span></label>
                                            <input type="number" step=any  class="form-control" value="{{ $saleProduct->price }}" id='price' name="price"
                                                placeholder="Enter Product Price" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="production_cost">Total Production Cost <span class="text-red">*</span></label>
                                            <input type="number" step=any  class="form-control"  id='production_cost' name="production_cost"
                                                placeholder="Enter Total Production Cost" value="{{ $saleProduct->production_cost }}" required>
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Product Quentity </label>
                                            <input type="number" step=any  class="form-control" name="qty"
                                                placeholder="Enter Product Quentity" value="{{ $saleProduct->qty }}" >
                                        </div>
                                    </div> --}}
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Select Status<span class="text-red">*</span></label>
                                            <select name="status" class="form-controll serchBox" required id="status" >
                                                <option {{ ($saleProduct->status == 1)?"selected":"" }} value="1">  Show </option>
                                                <option {{ ($saleProduct->status == 0)?"selected":"" }} value="0">  Hide </option>

                                            </select>
                                        </div>
                                    </div>




                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Product Image (Optional)</label>
                                            <input type="file" name="image" data-default-file="{{ asset('uploads/sale_product')."/".$saleProduct->image }}" class="dropify" data-height="150">
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

    <script>
        $(document).ready(function() {
            $("#category").on('change', function() {
                let id = $(this).val();
                // console.log(id);
                $.ajax({
                    type: "POST",
                    url: "",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        // console.log(response);
                        $("#subcategory").html(response)
                    }
                })
            })
        })
        $(document).ready(function(){
       // $('#category_color_id').addClass("disabled")
       // $('#category_size_id').addClass("disabled")
       // $('#category_gsm_id').addClass("disabled")
       })
    </script>
@endpush
