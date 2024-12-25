@extends('layouts.skeleton')
@section('title', $advance == 1 ? 'Sale' : 'Purchase' . ' Party Advance Collection')

@section('content')


    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-lg-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">{{ $advance == 1 ? 'Sale' : 'Purchase' }} Party Advance Collection</div>
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
                    <form action="{{ route('admin.advance_collection.store') }}" id="productForm" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="status" value="{{ $advance }}">
                        <div class="card">

                            <div class="card-header border-bottom-0">
                                <h3 class="card-title">{{ $advance == 1 ? 'Sale' : 'Purchase' }} Party </h3>
                            </div>
                            <div class="card-body">
                                <div class="row partyDetails_row">

                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Select Party<span class="text-red">*</span></label>
                                            <select name="party_id" class="form-controll serchBox"
                                                onchange="getPartyInfo(this)" required id="sale_party_id">
                                                <option value="" disabled selected> Select Party </option>
                                                @if ($advance == 1)
                                                    @foreach ($saleParty as $item)
                                                        <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                                    @endforeach
                                                @else
                                                    @foreach ($purchaseParty as $item)
                                                        <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                                    @endforeach

                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    {{-- <button type="submit" id="submit_btn" class="btn btn-primary float-end my-5"> Create
                                </button> --}}

                                </div>

                            </div>
                        </div>


                        <div class="card">
                            <div class=" card-body row">

                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Total Payment Amount</label>
                                        <input type="number" step=any  onkeyup="payment(this)" class="form-control total_payment"
                                            id="total_payment" value="0" name="total_payment"
                                            placeholder="Enter Payment Amount">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Total Advance Amount</label>
                                        <input type="number" step=any  class="form-control advance_amount" id="advance_amount"
                                            name="advance_amount" placeholder="Enter Advance Amount" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-12 text-end">
                                    {{-- <button type="button" id="addProductContent" class="btn btn-success  my-5 me-2"> Add
                                        Product
                                    </button> --}}
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
        function payment(e) {

            let total_amount = $("#party_advance").val();
            // let total_amount = $(".total_gross_amount").val();
            total_amount = Number(total_amount);
            let payment = Number($(e).val());
            // if (payment > total_amount) {
            //     $("#submit_btn").attr('disabled', true);
            // } else {
            //     $("#submit_btn").attr('disabled', false);

            // }
            $("#advance_amount").val(total_amount + payment)

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
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Advance Amount </label>
                                            <input type="text" value="${response.data.advence}" readonly class="form-control price" id='party_advance'
                                                name="advance" placeholder="Enter Advance Amount" required>
                                        </div>
                                    </div>`);
                        } else {
                            $("#party_phone").val(response.data.phone)
                            $("#party_address").val(response.data.address)
                            $("#party_advance").val(response.data.advence)
                            $("#party_due").val(response.data.due)
                        }
                        $("#due_amount").val(response.data.due)
                        $("#advance_amount").val(response.data.advence)
                        // calculateTotalAmount();
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
