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

                        <form action="{{ route('admin.product.update',$product->id) }}" method="post" enctype="multipart/form-data">
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
                                            <input type="text" value="{{ $product->name }}" class="form-control" name="name"
                                                placeholder="Enter Product Name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Product Category<span class="text-red">*</span></label>
                                            <select name="category_id" class="form-control serchBox" required id="category_id" >
                                                <option value=""> Product Category </option>
                                                @foreach ($category as $item)
                                                <option @selected($product->category_id == $item->id) value="{{ $item->id }}"> {{ $item->name }} </option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Product Type<span class="text-red">*</span></label>
                                            <select name="product_type_id" class="form-control serchBox" required id="product_type_id" >
                                                <option value=""> Product Type </option>
                                                @foreach ($productType as $item)
                                                <option @selected($product->product_type_id == $item->id) value="{{ $item->id }}"> {{ $item->name }} </option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Product Price <span class="text-red">*</span></label>
                                            <input type="number" step=any  value="{{ $product->price }}" class="form-control"  id='price' name="price"
                                                placeholder="Enter Product Price" required>
                                        </div>
                                    </div>


                                    {{-- <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Product Quentity </label>
                                            <input type="number" step=any  class="form-control" name="qty"
                                                placeholder="Enter Product Quentity" >
                                        </div>
                                    </div> --}}


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Product Image (Optional)</label>

                                            <input type="file" name="image" data-default-file="{{ asset('product')."/".$product->image }}" class="dropify" data-height="150">
                                        </div>
                                    </div>





                                </div>
                                <button type="submit" id="submit_btn" class="btn btn-primary float-end my-5"> Create </button>

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
