@extends('layouts.skeleton')
@section('title', 'Edit Sale')

@section('content')



    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-lg-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">Edit Sale</div>
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

                        <form action="{{ route('admin.sale.update',$sale->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <div class="card-header border-bottom-0">
                                <h3 class="card-title">Edit Sale </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Product Name <span class="text-red">*</span></label>
                                            <select onchange="getProductValue(this)"  class="form-control  serchBox " value="{{ $sale->name }}" name="sale_product_id"
                                                 required >
                                                @foreach ($product as $item)
                                                  <option @selected($item->id == $sale->sale_product_id) value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Select Size Category<span class="text-red">*</span></label>
                                            <select name="category_size_id" class="form-controll serchBox" required id="category_size_id" >
                                                <option value=""> Select Size Category </option>
                                                @foreach ($size as $item)
                                                <option {{ ($item->id == $sale->size?->id)?"selected":"" }} value="{{ $item->id }}"> {{ $item->name }} </option>

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
                                                <option {{ ($item->id == $sale->gsm?->id)?"selected":"" }} value="{{ $item->id }}"> {{ $item->name }} </option>

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
                                                <option {{ ($item->id == $sale->color?->id)?"selected":"" }} value="{{ $item->id }}"> {{ $item->name }} </option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Product Price <span class="text-red">*</span></label>
                                            <input onkeyup="calculatePrice()" type="number" step=any  class="form-control" value="{{ $sale->product_price }}" id='product_price' name="product_price"
                                                placeholder="Enter Product Price" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Product Quentity </label>
                                            <input onkeyup="calculatePrice()" type="number" step=any  class="form-control" id="qty" name="qty"
                                                placeholder="Enter Product Quentity" value="{{ $sale->qty }}" >
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Total  Const </label>
                                            <input readonly type="number" step=any  class="form-control" name="total_amount" id="total_amount"
                                                placeholder="Enter Product Quentity" value="{{ $sale->total_amount }}" >
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
        let count = 0;
function getProductValue(e) {

        let sale_product_id = $(e).val();
        count++;
            if (count>1) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.getProductPrice') }}",
                    data: {
                        sale_product_id: sale_product_id,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        $("#product_price").val(response.data.category_color_id)
                        // $("#total_amount").val(response.data.price)
                        // $("#qty").val(response.data.qty)
                        calculatePrice();


                    }
                })
            }
            // console.log(sale_product_id, category_color_id, category_size_id, category_gsm_id);

        }

        function calculatePrice(){
            let product_price = Number($("#product_price").val());
            let qty = Number($("#qty").val());
            let total = product_price*qty;
            console.log(total);

            $("#total_amount").val(product_price*qty)

        }

        // $(document).ready(function() {
        //     $("#category").on('change', function() {
        //         let id = $(this).val();
        //         // console.log(id);
        //         $.ajax({
        //             type: "POST",
        //             url: "",
        //             data: {
        //                 id: id,
        //                 _token: "{{ csrf_token() }}",
        //             },
        //             success: function(response) {
        //                 // console.log(response);
        //                 $("#subcategory").html(response)
        //             }
        //         })
        //     })
        // })
    </script>
@endpush
