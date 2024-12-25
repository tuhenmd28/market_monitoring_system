@extends('layouts.skeleton')
@section('title', 'Purchase Product')

@section('content')


    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-lg-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">Purchase Product</div>
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
                    <form action="{{ route('admin.purchase.store') }}" id="productForm" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card">

                            <div class="card-header border-bottom-0">
                                <h3 class="card-title">Purchase Party </h3>
                            </div>
                            <div class="card-body">
                                <div class="row partyDetails_row">

                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Select Party<span class="text-red">*</span></label>
                                            <select name="party_id" class="form-controll serchBox"
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
                        <div class="row disabledBox">
                            <div class="col-md-5">
                                <div class="card productDetails">
                                    <div class="card-header border-bottom-0">
                                        <h3 class="card-title">Product Details </h3>
                                    </div>

                                    <div class="card-body">
                                        <div class="alert alert-success qtyAlert d-none" role="alert"><button class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                                            This Product Abailable Stock is <strong></strong></div>
                                        <div class="row productRow">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Select Product Name<span
                                                            class="text-red">*</span></label>
                                                    <select onchange="getProductValue(this)" class="form-controll serchBox "
                                                        id="product_id" required>
                                                        <option value="" disabled selected> Select Product Name
                                                        </option>
                                                        @foreach ($product as $item)
                                                            <option value="{{ $item->id }}"> {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Select Size Category<span
                                                            class="text-red">*</span></label>
                                                    <select class="form-controll serchBox category_size_id"
                                                        id="category_size_id">
                                                        <option value="" disabled selected> Select Size Category
                                                        </option>
                                                        @foreach ($size as $item)
                                                            <option value="{{ $item->id }}"> {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Select GSM Category<span
                                                            class="text-red">*</span></label>
                                                    <select class="form-controll serchBox category_gsm_id"
                                                        id="category_gsm_id">
                                                        <option value="" disabled selected> Select GSM Category
                                                        </option>
                                                        @foreach ($gsm as $item)
                                                            <option value="{{ $item->id }}"> {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Select Color Category<span
                                                            class="text-red">*</span></label>
                                                    <select class="form-controll serchBox category_color_id"
                                                        id="category_color_id">
                                                        <option value="" disabled selected> Select Color Category
                                                        </option>
                                                        @foreach ($color as $item)
                                                            <option value="{{ $item->id }}"> {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Select Unit Category<span
                                                            class="text-red">*</span></label>
                                                    <select class="form-controll serchBox category_unit_id"
                                                        id="category_unit_id">
                                                        <option value="" disabled selected> Select Unit Category
                                                        </option>
                                                        @foreach ($unit as $item)
                                                            <option value="{{ $item->id }}"> {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Per Product Price <span
                                                            class="text-red">*</span></label>
                                                    <input type="number" step=any  readonly class="form-control price" id='price'
                                                        placeholder="Enter Product Price" >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="button" onclick="addProduct()" id="addProductContent"
                                                    class="btn btn-success  my-5 me-2"> Add
                                                    Product
                                                </button>
                                            </div>



                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 d-flex">
                                <div class="card">
                                    <div class="card-header border-bottom-0">
                                        <h3 class="card-title">Purchase Product </h3>
                                    </div>
                                    <div class="card-body">
                                        @php
                                            $total = 0;
                                            $k = 0;
                                        @endphp
                                        <table class="table table-bordered table-responsive table-striped" id="product">
                                            <thead>
                                                <tr>
                                                    <th>#SL</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Qty</th>
                                                    <th>SubTotal</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cart as $item)
                                                    @php
                                                        $total += $item['price'] * $item['qty'];
                                                        $price = $item['price'] * $item['qty'] ;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ ++$k }}</td>
                                                        <td>{{ $item['name'] }}</td>
                                                        <td>{{ $item['price'] }} <input name='price[]' type='hidden'
                                                                value="{{ $item['price'] }}"></td>
                                                        <td width="20%"> <input class='form-control' min='1'
                                                                name='qty[]' type='number'
                                                                value="{{ $item['qty'] }}"
                                                                onkeyup="qtyChange(this,'{{ $item['id'] }}','{{ $item['price'] }}')">
                                                        </td>
                                                        <td class='price{{ $item['id'] }}'>

                                                            <input type='hidden' name='category_size_id[]'
                                                                value='{{ $item['size'] }}'>
                                                            <input type='hidden' name='category_color_id[]'
                                                                value='{{ $item['color'] }}'>
                                                            <input type='hidden' name='category_gsm_id[]'
                                                                value='{{ $item['gsm'] }}'>
                                                            <input type='hidden' name='category_unit_id[]'
                                                                value='{{ $item['unit'] }}'>
                                                            <input type='hidden' name='purchase_product_id[]'
                                                                value='{{ $item['id'] }}'>
                                                            <input type='hidden' class='price' name='total_price[]'
                                                                value='{{ $price }}'><span>

                                                                {{ $price }}</span>
                                                        </td>
                                                        <td><a class="btn btn-danger mt-0 "
                                                                onclick="removeItem('{{ $item['id'] }} ')"><i
                                                                    class="fa fa-trash"></i>
                                                            </a></td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="3"></td>
                                                    <th colspan="1">Total</th>
                                                    <th colspan="1" class="totalItemPrice">{{ $total }}</th>
                                                    <td colspan="1"></td>
                                                    </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card disabledBox">
                            <div class=" card-body row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Total Product Amount</label>
                                        <input type="number" step=any  readonly class="form-control total_gross_amount"
                                            id="total_gross_amount" name="total_gross_amount" placeholder="Enter Payment Amount">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Total Party Advance Amount</label>
                                        <input type="number" step=any  value="0" class="form-control advance_amount" id="party_advance_amount"
                                            name="party_advance_amount" placeholder="Enter Advance amount" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Party Remaining Advance</label>
                                        <input type="number" step=any  value="0" class="form-control advance_amount" id="party_remaining_advance"
                                            name="party_remaining_advance" placeholder="Enter Party Remaining Advance" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Total Payment Amount</label>
                                        <input type="number" step=any  value="0" onkeyup="payment(this)" class="form-control total_payment"
                                            id="total_payment" name="total_payment" placeholder="Enter Payment Amount">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Total Product Due Amount</label>
                                        <input type="number" step=any  value="0" class="form-control due_amount" id="due_amount"
                                            name="due_amount" placeholder="Enter Due Amount" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Total Party Due Amount</label>
                                        <input type="number" step=any  class="form-control party_duce_amount" id="party_duce_amount"
                                            name="party_duce_amount" placeholder="Enter Due Amount" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-12 text-end">

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
         $(document).ready(function(){
        $('.disabledBox').addClass('contentDisabled')
       })
       function totalPartydue(){
            let partyDue = Number($("#party_due").val());
            let due_amount = Number($("#due_amount").val());
            let party_advance = Number($("#party_advance").val());
            $("#party_duce_amount").val(due_amount + partyDue);
            $("#party_advance_amount").val(party_advance);
            // console.log(partyDue);
        }
        function calculateTotalAmount(){
            let total = Number($(".totalItemPrice").html());
            let total_payment = Number($("#total_payment").val());
            let party_advance = Number($("#party_advance").val());
            let advance = (total - party_advance) > 0 ? 0 : (party_advance - total);
             $("#party_remaining_advance").val(advance);
            // $("#due_amount").val(total);
            // console.log("total"+total);
            // console.log("total_payment"+total_payment);
            // console.log("party_advance"+party_advance);

            let due = total < party_advance? 0 :total - (total_payment + party_advance);

            $("#due_amount").val(due)
            $("#total_gross_amount").val(total);
            totalPartydue();

        }
        calculateTotalAmount()
        function qtyChange(e, id, price) {
            console.log(id);

            let qty = $(`.qty${id} input`).val();
            let price1 = $(`.inputPice${id} input`).val();

            // let total = price * qty;
            // $(`.price${id} input.price`).val(total);
            // $(`.price${id} span`).html(total);

            $.ajax({
                type: 'Post',
                url: "{{ route('admin.qtyChange') }}",
                data: {
                    item_id: id,
                    qty: qty,
                    price1: price1,
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    // console.log(response);
                    if (response.data.ms) {
                        alert(response.data.ms)
                    }
                    $("table tbody").html(response.data.content);
                    calculateTotalAmount();
                    // $("#table tbody").html(response);
                    // console.log(response);
                },
                error: function(response) {
                    console.log(response)
                }
            });

        }

        function removeItem(id) {

            $.ajax({
                type: 'Post',
                url: "{{ route('admin.removeItem') }}",
                data: {
                    item_id: id,
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    $("table tbody").html(response.data.content);
                    // console.log(response.data);
                    calculateTotalAmount();
                },
                error: function(response) {
                    console.log(response)
                }
            });

        }

        function addProduct() {
            let id = $("#product_id").val();
            if (!id) {
                alert("Please Select Item");
            }
            $.ajax({
                type: 'Post',
                url: "{{ route('admin.addItem') }}",
                data: {
                    item_id: id,
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    // console.log(response);
                    if (response.data.ms) {
                        alert(response.data.ms);
                    } else {
                        $("table tbody").html(response.data.content);

                    }
                    calculateTotalAmount();
                    // console.log(response);
                },
                error: function(response) {
                    console.log(response)
                }
            });

        }

        function quentity(e) {
            let row = $(e).parents('.productRow');

            let price = row.find(".price").val();
            let productQty = Number(row.find(".productQty").val());
            let qty = Number($(e).val());
            if (productQty < qty) {
                alert(`This Product Abaleable Quantity is ${productQty}`);
                $("#submit_btn").attr('disabled', true);
            } else {
                $("#submit_btn").attr('disabled', false);
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
            let party_advance = Number($("#party_advance").val());
            let restAmount = total_amount - party_advance;
            // if(restAmount < payment){
            //     $(e).val(restAmount)
            //      payment = Number($(e).val());
            // }
            $(".due_amount").val(total_amount - (payment+party_advance));
            totalPartydue();

        }

        function getProductValue(e) {
            let row = $(e).parents('.productRow');
            let alert = row.siblings('.qtyAlert');

            let product_id = $("#product_id").val();
            // let category_color_id = row.find(".category_color_id").val();
            // let category_size_id = row.find(".category_size_id").val();
            // let category_gsm_id = row.find(".category_gsm_id").val();
            // console.log(product_id);
            if (product_id) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.getPurchaseProductPrice') }}",
                    data: {
                        product_id: product_id,
                        // category_color_id: category_color_id,
                        // category_size_id: category_size_id,
                        // category_gsm_id: category_gsm_id,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        let data = response.data;
                        // row.find(".price").val(response.data.price)
                        // row.find(".productQty").val(response.data.qty)
                        // // console.log( response);
                        // alert.removeClass('d-none')
                        // alert.children("strong").html(response.data.qty)
                        // // console.log( response.data.category_color_id);
                        // row.find(".category_color_id").val(response.data.category_color_id)
                        // row.find(".category_size_id").val(response.data.category_size_id)
                        // row.find(".category_gsm_id").val(response.data.category_gsm_id)
                        // row.find(".category_unit_id").val(response.data.category_unit_id)
                        // // $('#mySelect')[0].sumo.reload();
                        // row.find(".category_color_id")[0].sumo.reload()
                        // row.find(".category_size_id")[0].sumo.reload()
                        // row.find(".category_gsm_id")[0].sumo.reload()
                        // row.find(".category_unit_id")[0].sumo.reload()

                        alert.removeClass('d-none')
                        alert.children("strong").html(response.data.qty)
                        $("#price").val(data.price)
                        $("#category_color_id").val(data.category_color_id)
                        $("#category_size_id").val(data.category_size_id)
                        $("#category_gsm_id").val(data.category_gsm_id)
                        $("#category_unit_id").val(data.category_unit_id)
                        // $('#mySelect')[0].sumo.reload();
                        $("#category_color_id")[0].sumo.reload()
                        $("#category_size_id")[0].sumo.reload()
                        $("#category_gsm_id")[0].sumo.reload()
                        $("#category_unit_id")[0].sumo.reload()

                    }
                })
            }
            // console.log(sale_product_id, category_color_id, category_size_id, category_gsm_id);

        }

        function getPartyInfo(e) {
            let id = $(e).val();
            let row = $(e).parents('.partyDetails_row');
            $('.disabledBox').removeClass('contentDisabled')
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
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Advance Amount </label>
                                            <input type="text" value="${response.data.advence}" readonly class="form-control price" id='party_advance'
                                                name="party_advance" placeholder="Enter Advance Amount" required>
                                        </div>
                                    </div>
                                    `);
                        } else {
                            $("#party_phone").val(response.data.phone)
                            $("#party_address").val(response.data.address)
                            $("#party_due").val(response.data.due)
                            $("#party_advance").val(response.data.advence)
                        }
                        calculateTotalAmount();
                    }
                    // row.find(".price").val(response)
                }
            })
            // console.log(sale_product_id, category_color_id, category_size_id, category_gsm_id);

        }



        $(document).ready(function() {
            $('.category_color_id').addClass("disabled")
            $('.category_size_id').addClass("disabled")
            $('.category_gsm_id').addClass("disabled")
            $('.category_unit_id').addClass("disabled")
        })
    </script>
@endpush
