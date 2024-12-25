@extends('layouts.skeleton')
@section('title', 'Add Sale Stock')

@section('content')


    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-lg-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">Add New Stock</div>
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
                        <form action="{{ route('admin.sale_stock.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="status" value="3">
                            <div class="card-header border-bottom-0">
                                <h3 class="card-title">Adjust Stock </h3>
                            </div>
                            <div class="card-body">
                                <div class="row productRow">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Select Product <span class="text-red">*</span></label>
                                            <select name="sale_product_id" onchange="getProductValue(this)" class="form-control serchBox" required
                                                id="sale_product_id">
                                                <option value="" disabled selected> Select Product </option>
                                                @foreach ($products as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Select Size Category<span
                                                    class="text-red">*</span></label>
                                            <select name="category_size_id" class="form-control serchBox"
                                                id="category_size_id">
                                                <option value="" disabled selected> Select Size Category </option>
                                                @foreach ($size as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Select GSM Category<span
                                                    class="text-red">*</span></label>
                                            <select name="category_gsm_id" class="form-control serchBox"
                                                id="category_gsm_id">
                                                <option value="" disabled selected> Select GSM Category </option>
                                                @foreach ($gsm as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" disabled selected>Select Color Category<span
                                                    class="text-red">*</span></label>
                                            <select name="category_color_id" class="form-control serchBox"
                                                id="category_color_id">
                                                <option value=""> Select Color Category </option>
                                                @foreach ($color as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Stock Quantity <span class="text-red">*</span></label>
                                            <input type="number" step=any  class="form-control" id='qty' name="qty"
                                                placeholder="Enter Stock Quantity" required>
                                        </div>
                                    </div>


                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Comment</label>
                                            <textarea  class="form-control" name="comment"
                                                placeholder="Enter Comment" > </textarea>
                                        </div>
                                    </div>






                                </div>
                                <button type="submit" id="submit_btn" class="btn btn-primary float-end my-5"> Create
                                </button>

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
       $(document).ready(function(){
        $('#category_color_id').addClass("disabled")
        $('#category_size_id').addClass("disabled")
        $('#category_gsm_id').addClass("disabled")
       })
        function getProductValue(e) {
            let row = $(e).parents('.productRow');

            let sale_product_id = row.find("#sale_product_id").val();
            // let category_color_id = row.find(".category_color_id").val();
            // let category_size_id = row.find(".category_size_id").val();
            // let category_gsm_id = row.find(".category_gsm_id").val();

            if (sale_product_id) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.getProductPrice') }}",
                    data: {
                        sale_product_id: sale_product_id,
                        // category_color_id: category_color_id,
                        // category_size_id: category_size_id,
                        // category_gsm_id: category_gsm_id,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {

                        row.find("#category_color_id").val(response.data.category_color_id)
                        row.find("#category_size_id").val(response.data.category_size_id)
                        row.find("#category_gsm_id").val(response.data.category_gsm_id)
                        // $('#mySelect')[0].sumo.reload();
                        row.find("#category_color_id")[0].sumo.reload()
                        row.find("#category_size_id")[0].sumo.reload()
                        row.find("#category_gsm_id")[0].sumo.reload()

                    }
                })
            }

        }

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
