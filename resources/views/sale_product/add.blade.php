@extends('layouts.skeleton')
@section('title', 'Add Product')

@section('content')


    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-lg-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">Add New Product</div>
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
                        <form action="{{ route('admin.sale_product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="card-header border-bottom-0">
                                <h3 class="card-title">Add Product </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Product Name <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Enter Product Name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Select Size Category<span class="text-red">*</span></label>
                                            <select name="category_size_id" class="form-control serchBox" required id="category_size_id" >
                                                <option value=""> Select Size Category </option>
                                                @foreach ($size as $item)
                                                <option value="{{ $item->id }}"> {{ $item->name }} </option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Select GSM Category<span class="text-red">*</span></label>
                                            <select name="category_gsm_id" class="form-control serchBox" required id="category_gsm_id" >
                                                <option value=""> Select GSM Category </option>
                                                @foreach ($gsm as $item)
                                                <option value="{{ $item->id }}"> {{ $item->name }} </option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Select Color Category<span class="text-red">*</span></label>
                                            <select name="category_color_id" class="form-control serchBox" required id="category_color_id" >
                                                <option value=""> Select Color Category </option>
                                                @foreach ($color as $item)
                                                <option value="{{ $item->id }}"> {{ $item->name }} </option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Product Price <span class="text-red">*</span></label>
                                            <input type="number" step=any  class="form-control"  id='price' name="price"
                                                placeholder="Enter Product Price" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="production_cost">Total Production Cost <span class="text-red">*</span></label>
                                            <input type="number" step=any  class="form-control"  id='production_cost' name="production_cost"
                                                placeholder="Enter Total Production Cost" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="qty">Opening Stock (Quantity) <span class="text-red">*</span></label>
                                            <input type="number" step=any  class="form-control"  id='qty' name="qty"
                                                placeholder="Enter Opening Stock (Quantity)" >
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
                                            <input type="file" name="image" class="dropify" data-height="150">
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
    </script>
@endpush
