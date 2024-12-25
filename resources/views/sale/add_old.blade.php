@extends('layouts.skeleton')
@section('title', 'Sale Product')

@section('content')


    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-lg-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">Sale Product</div>
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
                    <form action="{{ route('admin.sale.store') }}" id="productForm" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card">

                            <div class="card-header border-bottom-0">
                                <h3 class="card-title">Sale Party </h3>
                            </div>
                            <div class="card-body">
                                <div class="row partyDetails_row">

                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Select Party<span class="text-red">*</span></label>
                                            <select name="sale_party_id" class="form-controll serchBox"
                                                onchange="getPartyInfo(this)" required id="sale_party_id">
                                                <option value="" disabled selected> Select Party </option>
                                                @foreach ($party as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- <button type="submit" id="submit_btn" class="btn btn-primary float-end my-5"> Create
                                </button> --}}

                                </div>

                            </div>
                        </div>
                        <div class="card productDetails">
                            <div class="card-header border-bottom-0">
                                <h3 class="card-title">Product Details 1</h3>
                            </div>

                            <div class="card-body">
                                <div class="alert alert-success qtyAlert d-none" role="alert"><button class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                                     This Product Abailable Stock is <strong></strong></div>
                                <div class="row productRow">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Select Product Name<span
                                                    class="text-red">*</span></label>
                                            <select name="sale_product_id[]" onchange="getProductValue(this)"
                                                class="form-controll serchBox sale_product_id" required>
                                                <option value="" disabled selected> Select Product Name </option>
                                                @foreach ($product as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Select Size Category<span
                                                    class="text-red">*</span></label>
                                            <select name="category_size_id[]"
                                                class="form-controll serchBox category_size_id" required id="">
                                                <option value="" disabled selected> Select Size Category </option>
                                                @foreach ($size as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Select GSM Category<span
                                                    class="text-red">*</span></label>
                                            <select name="category_gsm_id[]" class="form-controll serchBox category_gsm_id"
                                                required id="">
                                                <option value="" disabled selected> Select GSM Category </option>
                                                @foreach ($gsm as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Select Color Category<span
                                                    class="text-red">*</span></label>
                                            <select name="category_color_id[]"
                                                class="form-controll serchBox category_color_id" required id="">
                                                <option value="" disabled selected> Select Color Category </option>
                                                @foreach ($color as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Per Product Price <span
                                                    class="text-red">*</span></label>
                                            <input type="number" step=any  readonly class="form-control price" id=''
                                                name="price[]" placeholder="Enter Product Price" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Product Quentity </label>
                                            <input type="hidden" name="productQty" class="productQty">
                                            <input type="number" step=any  onkeyup="quentity(this)" class="form-control qty"
                                                name="qty[]" placeholder="Enter Product Quentity">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Product Total Amount</label>
                                            <input type="number" step=any  class="form-control total_amount" id=""
                                                name="total_amount[]" placeholder="Enter Product Total Amount" readonly>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="card">
                            <div class=" card-body row">
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Total Amount</label>
                                        <input type="number" step=any  readonly class="form-control total_gross_amount"
                                            id="" name="total_gross_amount" placeholder="Enter Payment Amount">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Total Payment Amount</label>
                                        <input type="number" step=any  onkeyup="payment(this)" class="form-control total_payment"
                                            id="" name="total_payment" placeholder="Enter Payment Amount">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Total Due Amount</label>
                                        <input type="number" step=any  class="form-control due_amount" id=""
                                            name="due_amount" placeholder="Enter Due Amount" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-12 text-end">
                                    <button type="button" id="addProductContent" class="btn btn-success  my-5 me-2"> Add
                                        Product
                                    </button>
                                    <button type="submit" id="submit_btn" class="btn btn-primary  my-5"> Create
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!-- End Row -->

        </div>








    </div><!-- end app-content-->

@endsection

@push('scripts')
    <script>
        function quentity(e) {
            let row = $(e).parents('.productRow');

            let price = row.find(".price").val();
            let productQty = Number(row.find(".productQty").val());
            let qty = Number($(e).val());
            if(productQty<qty){
                alert(`This Product Abaleable Quantity is ${productQty}`);
                $("#submit_btn").attr('disabled',true);
            }else{
                $("#submit_btn").attr('disabled',false);
            }
            row.find(".total_amount").val(qty * price);
            let total = 0;
            $(".total_amount").each(function() {
                total += Number($(this).val());
            })
            $(".total_gross_amount").val(total);

        }

        function payment(e) {

            let total_amount = $(".total_gross_amount").val();
            total_amount = Number(total_amount);
            let payment = Number($(e).val());
            $(".due_amount").val(total_amount - payment);

        }

        function getProductValue(e) {
            let row = $(e).parents('.productRow');
            let alert = row.siblings('.qtyAlert');


            let sale_product_id = row.find(".sale_product_id").val();
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
                        row.find(".price").val(response.data.price)
                        row.find(".productQty").val(response.data.qty)
                        // console.log( response);
                        alert.removeClass('d-none')
                        alert.children("strong").html(response.data.qty)
                        // console.log( response.data.category_color_id);
                        row.find(".category_color_id").val(response.data.category_color_id)
                        row.find(".category_size_id").val(response.data.category_size_id)
                        row.find(".category_gsm_id").val(response.data.category_gsm_id)
                        // $('#mySelect')[0].sumo.reload();
                        row.find(".category_color_id")[0].sumo.reload()
                        row.find(".category_size_id")[0].sumo.reload()
                        row.find(".category_gsm_id")[0].sumo.reload()

                    }
                })
            }
            // console.log(sale_product_id, category_color_id, category_size_id, category_gsm_id);

        }

        function getPartyInfo(e) {
            let id = $(e).val();
            let row = $(e).parents('.partyDetails_row');
            // console.log( row.children().length);
            $.ajax({
                type: "POST",
                url: "{{ route('admin.getPartyInfo') }}",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    // console.log(response);
                    if (response.data) {
                        if (row.children().length < 2) {
                            row.append(` <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Phone Number </label>
                                            <input type="text" value="${response.data.phone}" readonly class="form-control price" id='party_phone'
                                                name="phone" placeholder="Enter Phone Number" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Address </label>
                                            <input type="text" value="${response.data.address}" readonly class="form-control price" id='party_address'
                                                name="address" placeholder="Enter Address" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Due Amount </label>
                                            <input type="text" value="${response.data.due}" readonly class="form-control price" id='party_due'
                                                name="due" placeholder="Enter Due Amount" required>
                                        </div>
                                    </div>`);
                        } else {
                            $("#party_phone").val(response.data.phone)
                            $("#party_address").val(response.data.address)
                            $("#party_due").val(response.data.due)
                        }
                    }
                    // row.find(".price").val(response)
                }
            })
            // console.log(sale_product_id, category_color_id, category_size_id, category_gsm_id);

        }

        function remove(e) {
            $(e).parents('.productDetails').remove()
        }
        $("#addProductContent").click(function() {
            let numberOfContent = $("#productForm .productDetails").length;
            let id = [];
            $(".sale_product_id").each(function() {
                id.push($(this).val())
            })
            $.ajax({
                type: "POST",
                url: "{{ route('admin.getProductName') }}",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    // console.log(response.data);
                    let data = response.data;
                    if (numberOfContent <= 10) {
                        let htmlContent = `<div class="card productDetails">
                                        <div class="card-header border-bottom-0 justify-content-between">
                                            <h3 class="card-title">Product Details ${numberOfContent+1}</h3>
                                            <button type="button" onclick="remove(this)" class="btn btn-danger  float-end"> Remove Product
                                            </button>
                                        </div>
                                        <div class="card-body" >
                                            <div class="alert alert-success qtyAlert d-none" role="alert"><button class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                                     This Product Abailable Stock is <strong></strong></div>
                                            <div class="row newContent productRow" >
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Select Product Name<span
                                                                class="text-red">*</span></label>
                                                        <select name="sale_product_id[]" onchange="getProductValue(this)"
                                                            class="form-controll serchBox sale_product_id" required >
                                                            <option value="" disabled selected> Select Product Name </option>
                                                            ${data.map(ele => `<option value="${ele.id}"> ${ele.name} </option>`)}

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Select Size Category<span
                                                                class="text-red">*</span></label>
                                                        <select name="category_size_id[]"
                                                            class="form-controll serchBox category_size_id" required id="">
                                                            <option value="" disabled selected> Select Size Category </option>
                                                            @foreach ($size as $item)
                                                                <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Select GSM Category<span
                                                                class="text-red">*</span></label>
                                                        <select name="category_gsm_id[]"
                                                            class="form-controll serchBox category_gsm_id" required id="">
                                                            <option value="" disabled selected> Select GSM Category </option>
                                                            @foreach ($gsm as $item)
                                                                <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Select Color Category<span
                                                                class="text-red">*</span></label>
                                                        <select name="category_color_id[]"
                                                            class="form-controll serchBox category_color_id" required id="">
                                                            <option value="" disabled selected> Select Color Category </option>
                                                            @foreach ($color as $item)
                                                                <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Per Product Price <span
                                                                class="text-red">*</span></label>
                                                        <input type="number" step=any  readonly class="form-control price" id=''
                                                            name="price[]" placeholder="Enter Product Price" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Product Quentity </label>
                                                        <input type="hidden" name="productQty" class="productQty">
                                                        <input type="number" step=any  onkeyup="quentity(this)" class="form-control qty" name="qty[]"
                                                            placeholder="Enter Product Quentity">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Product Total Amount</label>
                                                        <input type="number" step=any  class="form-control total_amount" id=""
                                                            name="total_amount[]" placeholder="Enter Product Total Amount" readonly>
                                                    </div>
                                                </div>


                                            </div>  </div>
                                    </div>`;
                        $("#productForm").children('.productDetails').last().after(htmlContent)
                        window.Search = $('.serchBox').SumoSelect({
                            csvDispCount: 3,
                            search: true,
                            searchText: 'Enter here.'
                        });

                        $('.category_color_id').addClass("disabled")
                        $('.category_size_id').addClass("disabled")
                        $('.category_gsm_id').addClass("disabled")

                    } else {
                        alert(`Can not add more then ${numberOfContent} Product`);
                    }


                }
            })
        })

        $(document).ready(function() {
            $('.category_color_id').addClass("disabled")
                        $('.category_size_id').addClass("disabled")
                        $('.category_gsm_id').addClass("disabled")
        })
    </script>
@endpush
