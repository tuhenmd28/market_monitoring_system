@extends('layouts.skeleton')
@section('title', 'View Package')
@push('styles')
    <style>
        .cursor-pointer {
            cursor: pointer;
        }

        #package {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #package td,
        #package th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #package tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #package tr:hover {
            background-color: #ddd;
        }

        #package th {
            padding-top: 12px;
            padding-bottom text-center modelTextColor: 12px;
            text-align: center;
            background-color: #04AA6D;
            color: white;
        }

        .productList:has(li) {
            display: block;
        }

        .productList li:hover {
            color: #fff;
            background: #3c8dbc;
        }

        .productList li {
            padding: 7px 0px 7px 10px;

        }

        .productList {
            position: absolute;
            left: 0;
            top: 100%;
            width: 100%;
            background: #fff;
            list-style: none;
            display: none;
            z-index: 10;
            box-shadow: 0 8px 14px 4px #00000030;
        }
    </style>
@endpush
@section('content')


    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-lg-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">View Package</div>
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
                        <form action="{{ route('admin.package.update', $package->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="card-header border-bottom text-center modelTextColor-0">
                                <h3 class="card-title"> View Package </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Package Name <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Enter Package Name" readonly value="{{ $package->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Package Tag Line (Optional)</label>
                                            <input type="text" readonly class="form-control" name="tag_name"
                                                placeholder="Enter Package Tag Line" value="{{ $package->tag_name }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Package Type</label>
                                            <select id="type" readonly name="type" class="form-control select2 "
                                                id="">
                                                <option {{ $package->type == 1 ? 'selected' : '' }} value="1">Single
                                                </option>
                                                <option {{ $package->type == 2 ? 'selected' : '' }} value="2">Combo
                                                </option>
                                            </select>
                                            {{-- <input type="text" class="form-control" name="user_first_name" placeholder="First name" required> --}}
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group ">
                                            <label class="form-label">Package Image</label>
                                            <img src="{{ asset('uploads/package/' . $package->image) }}" class="w-100" alt="img">
                                            {{-- <input type="file" name="image"
                                                data-default-file="{{ asset('uploads/package/' . $package->image) }}"
                                                class="dropify" data-height="180"> --}}
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <label class="form-label">Package Multiple Image</label>
                                        <div class="d-flex flex-wrap justify-content-center previewImg">
                                            @foreach (json_decode($package->multiple_image) as $item)
                                            <img  width="150" src="{{ asset('uploads/package/' . $item) }}" alt="img">
                                            @endforeach
                                        </div>
                                        {{-- <div class="form-group ">
                                            <input type="file" name="images[]" id="file-input" multiple>
                                        </div> --}}
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Package Description </label>
                                                    <p>{!! $package->description !!}</p>
                                                    {{-- <textarea  class="form-control content" name="description"
                                                    placeholder="Enter Package Description" >{!! $package->description !!}</textarea> --}}
                                            {{-- <input type="text" class="form-control" name="description"
                                                placeholder="Enter Package Description" value="{{ $package->description }}"
                                                required> --}}
                                        </div>
                                    </div>



                                    {{-- <div class=" offset-sm-3 col-sm-6 col-md-6">
                                        <div class="form-group position-relative">
                                            <label class="form-label">Search Product Name</label>
                                            <input type="text" class="form-control" id="productName" name=""
                                                placeholder="Product name">
                                            <ul class="productList">

                                            </ul>
                                        </div>
                                    </div> --}}

                                    <div id="tableContent">
                                        <table id="package">
                                            <table id="package">
                                                <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Product Image</th>
                                                        <th width="10%">Quantity</th>
                                                        <th>Admin Profit</th>
                                                        <th>Total Admin Profit</th>
                                                        <th>Price</th>
                                                        <th>Total Price</th>
                                                        <th class="">
                                                            <h3 class="m-0"><i class="ion-trash-a"></i></h3>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $id = json_decode($package->product_id);
                                                        $qty = json_decode($package->product_qty);
                                                        // dd($id);
                                                        $products = \App\Models\Product::whereIn('pro_id', $id)->get();
                                                        $price = 0;
                                                        $admin_profit = 0;
                                                    @endphp
                                                    @foreach ($products as $key => $product)
                                                        @php

                                                            $price = $price + (intval($product->pro_price)*($qty[$key]));
                                                            $admin_profit = $admin_profit + (intval($product->admin_profit)*($qty[$key]));
                                                        @endphp
                                                         <tr>
                                                            <td>{{ $product->product_name }} <input type="hidden" value="{{ $product->pro_id }}"
                                                                    name="product_id[]"> </td>
                                                            <td><img src="{{ asset('uploads/product/' . $product->product_img) }}"
                                                                    style="width:100%;max-width:100px;margin:auto;" alt="product image"></td>
                                                            <td><input min="1" type="number" onkeyup="changeQty(this)" name="product_qty[]"
                                                                    class="form-control" value="{{ $qty[$key] }}"></td>
                                                            <td class="text-center qtyAdminProfitTd">{{ $product->admin_profit }}</td>
                                                            <td class="text-center qtyTotalAdminProfit">{{ $product->admin_profit*($qty[$key]) }}</td>
                                                            <td class="text-center qtyPrice">{{ $product->pro_price }}</td>
                                                            <td class="text-center productPrice">{{ $product->pro_price*($qty[$key]) }}</td>
                                                            <td>
                                                                <h3 class="text-center m-0 text-danger cursor-pointer" onclick="removeItem(this)"><i
                                                                        class="ion-close-round"></i></h3>
                                                            </td>
                                                        </tr>

                                                        @php
                                                            $key++;
                                                        @endphp
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="3" class="text-end">
                                                            <input id="total_price" type="hidden" value="{{ $price }}" name="total_price">
                                                            <input id="adminProfitInput" type="hidden" value="{{ $admin_profit }}" name="admin_profit">
                                                        Net Admin Profit: </th>
                                                        <th colspan="2" id="adminProfitFooter" class=" text-end">{{ $admin_profit }}</th>
                                                        <th colspan="1" class="text-end">Net Amount : </th>
                                                        <th colspan="1" id="totalPrice" class="text-end"> {{ $price }} </th>
                                                        <th></th>


                                                    </tr>
                                                </tfoot>
                                            </table>

                                            <div class="row justify-content-end">
                                                <div class="col-sm-6 py-4">
                                                    <div class="form-group">
                                                        <label class="form-label fs-5">Custom Price</label>
                                                        <input type="number" step=any  readonly class="form-control" id="custom_price"
                                                            value="{{ $package->custom_price }}" name="custom_price"
                                                            placeholder="Enter Custorm Price">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>


                                </div>

                                {{-- <button type="submit" id="submit_btn" class="btn btn-primary float-end mb-5"> Update --}}
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
<script src="{{ asset('assets/plugins/wysiwyag/jquery.richtext.js') }}"></script>
<script src="{{ asset('assets/js/form-editor.js') }}"></script>
    <script>
        // function changeQty(el){
        //     // console.log($(el).parent().siblings('.productPrice'));
        //     let totalPriceClumn = Number($(el).parent().siblings('.qtyPrice').html())
        //     let qty = Number($(el).val())
        //     $(el).parent().siblings('.productPrice').html(totalPriceClumn*qty)
        //     $('#totalPrice').html(getTotalProductPrice())
        //     $('#total_price').val(getTotalProductPrice())
        //     $('#custom_price').val(getTotalProductPrice())
        // }
        // function getTotalProductPrice(){
        //     let totalPrice = 0;
        //     if($(".productPrice").length){
        //         $(".productPrice").each(function(){
        //             totalPrice = totalPrice + Number($(this).html())
        //         })
        //     }
        //     return totalPrice;
        // }
        // function removeItem(el) {
        //     Swal.fire({
        //         title: "Are you sure?",
        //         // text: "You won't be able to revert this!",
        //         icon: "warning",
        //         showCancelButton: true,
        //         confirmButtonColor: "#3085d6",
        //         cancelButtonColor: "#d33",
        //         confirmButtonText: "Yes, delete it!"
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             $(el).parents('tr').remove();
        //             let tr = $("#tableContent table tbody tr");
        //             if (tr.length == 0) {
        //                 $("#tableContent").html('');
        //             }
        //             $('#totalPrice').html(getTotalProductPrice())
        //             $('#total_price').val(getTotalProductPrice())
        //             $('#custom_price').val(getTotalProductPrice())
        //         }
        //     });
        // }

        // function getProductId() {
        //     let productId = [];
        //     if ($('input[name="product_id[]"]').length) {
        //         $('input[name="product_id[]"]').each(function() {
        //             let id = $(this).val();
        //             productId.push(id);
        //         })
        //     }
        //     return productId;
        // }

        // function productId(id) {
        //     let type = $("#type").val();
        //     let content = $('#tableContent').text();
        //     let productId = getProductId();
        //     // console.log(productId);


        //     $(".productList").html('');
        //     $("#productName").val('')
        //     $.ajax({
        //         type: "POST",
        //         url: "{{ route('admin.packageContent') }}",
        //         data: {
        //             productId: productId,
        //             id: id,
        //             type: type,
        //             content: content,
        //             _token: "{{ csrf_token() }}",
        //         },
        //         success: function(response) {
        //             if (content) {
        //                 if (type == 1) {
        //                     $("#tableContent table tbody").html(response)
        //                 } else if (type == 2) {
        //                     $("#tableContent table tbody").append(response)
        //                 }
        //             } else {
        //                 $("#tableContent").html(response)
        //             }
        //             $('#totalPrice').html(getTotalProductPrice())
        //             // console.log(response);
        //             $('#custom_price').val(getTotalProductPrice())
        //             $('#total_price').val(getTotalProductPrice())
        //         }
        //     })
        // }
        // $("#productName").on('keyup', function() {
        //     let name = $(this).val();
        //     let productId = getProductId();
        //     if (name.length > 1) {
        //         $.ajax({
        //             type: "POST",
        //             url: "{{ route('admin.getProductName') }}",
        //             data: {
        //                 name: name,
        //                 productId: productId.length ? productId : [0],
        //                 _token: "{{ csrf_token() }}",
        //             },
        //             success: function(response) {
        //                 if (response) {
        //                     $(".productList").html(response)

        //                 } else {

        //                     $(".productList").html('')
        //                 }
        //             }
        //         })
        //     } else {
        //         $(".productList").html('')
        //     }
        // })

        function changeQty(el){
            // console.log($(el).parent().siblings('.productPrice'));
            let totalPriceClumn = Number($(el).parent().siblings('.qtyPrice').html())
            let totalAdminProfit = Number($(el).parent().siblings('.qtyAdminProfitTd').html())
            let qty = Number($(el).val())
            $(el).parent().siblings('.productPrice').html(totalPriceClumn*qty)
            $(el).parent().siblings('.qtyTotalAdminProfit').html(totalAdminProfit*qty)
            $('#adminProfitInput').val(getTotalAdminProfit())
            $('#adminProfitFooter').html(getTotalAdminProfit())

            $('#totalPrice').html(getTotalProductPrice())
            $('#total_price').val(getTotalProductPrice())
            $('#custom_price').val(getTotalProductPrice())
        }
        function getTotalProductPrice(){
            let totalPrice = 0;
            if($(".productPrice").length){
                $(".productPrice").each(function(){
                    totalPrice = totalPrice + Number($(this).html())
                })
            }
            return totalPrice;
        }
        function getTotalAdminProfit(){
            let totalPrice = 0;
            if($(".qtyTotalAdminProfit").length){
                $(".qtyTotalAdminProfit").each(function(){
                    totalPrice = totalPrice + Number($(this).html())
                })
            }
            return totalPrice;
        }
        function removeItem(el) {
            Swal.fire({
                title: "Are you sure?",
                // text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $(el).parents('tr').remove();
                    let tr = $("#tableContent table tbody tr");
                    if(tr.length == 0){
                        $("#tableContent").html('');
                    }
                    $('#totalPrice').html(getTotalProductPrice())
                    $('#total_price').val(getTotalProductPrice())
                    $('#custom_price').val(getTotalProductPrice())

                    $('#adminProfitInput').val(getTotalAdminProfit())
                    $('#adminProfitFooter').html(getTotalAdminProfit())
                }
            });
        }

        function getProductId() {
            let productId = [];
            if ($('input[name="product_id[]"]').length) {
                $('input[name="product_id[]"]').each(function() {
                    let id = $(this).val();
                    productId.push(id);
                })
            }
            return productId;
        }

        function productId(id) {
            let type = $("#type").val();
            let content = $('#tableContent').text();
            let productId = getProductId();
            // console.log(productId);


            $(".productList").html('');
            $("#productName").val('')
            $.ajax({
                type: "POST",
                url: "{{ route('admin.packageContent') }}",
                data: {
                    productId: productId,
                    id: id,
                    type: type,
                    content: content,
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    if (content) {
                        if (type == 1) {
                            $("#tableContent table tbody").html(response)
                        } else if (type == 2) {
                            $("#tableContent table tbody").append(response)
                        }
                    } else {
                        $("#tableContent").html(response)
                    }
                    $('#totalPrice').html(getTotalProductPrice())
                    // console.log(response);
                    $('#custom_price').val(getTotalProductPrice())
                    $('#total_price').val(getTotalProductPrice())

                    $('#adminProfitInput').val(getTotalAdminProfit())
                    $('#adminProfitFooter').html(getTotalAdminProfit())
                }
            })
        }
        $("#productName").on('keyup', function() {
            let name = $(this).val();
            let productId = getProductId();
            if (name.length > 1) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.getProductName') }}",
                    data: {
                        name: name,
                        productId: productId.length ? productId : [0],
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        if (response) {
                            $(".productList").html(response)

                        } else {

                            $(".productList").html('')
                        }
                    }
                })
            } else {
                $(".productList").html('')
            }
        })
    </script>
@endpush
