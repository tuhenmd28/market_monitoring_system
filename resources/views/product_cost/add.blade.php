@extends('layouts.skeleton')
@section('title', 'Add Product Cost')

@section('content')


    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-lg-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">Add Product Cost</div>
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('admin.product_cost.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="card-header border-bottom-0">
                                <h3 class="card-title">Add Product Cost </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Product Name<span class="text-red">*</span></label>
                                            <select name="product_id" class="form-control serchBox" required
                                                id="product_id">
                                                <option value=""> Product Name </option>
                                                @foreach ($products as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Lend<span class="text-red">*</span> ( katha )</label>
                                            <input type="number" step=any class="form-control" name="land"
                                                placeholder="Enter Product Production land" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Start Date<span class="text-red">*</span></label>
                                            <input type="text" any class="form-control start_date rangeDatepicker"
                                                name="start_date" id="start_date" placeholder="Enter Production Start Date"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">End Date<span class="text-red">*</span></label>
                                            <input type="text" any class="form-control end_date rangeDatepicker"
                                                name="end_date" id="end_date" placeholder="Enter Production End Date"
                                                required>
                                        </div>
                                    </div>


                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Perpose Of the Cost <span
                                                    class="text-red">*</span></label>
                                            <input type="text" step=any class="form-control" id='perpose'
                                                name="parpose" placeholder="Enter Product perpose" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Cost <span class="text-red">*</span></label>
                                            <input type="number" step=any class="form-control" id='cost'
                                                name="cost" placeholder="Enter Product cost" required>
                                        </div>
                                    </div>


                                    {{-- <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Product Quentity </label>
                                            <input type="number" step=any  class="form-control" name="qty"
                                                placeholder="Enter Product Quentity" >
                                        </div>
                                    </div> --}}








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
