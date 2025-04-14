@extends('layouts.skeleton')
@section('title', 'Purchase Product')

@section('content')


    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-lg-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">Add Purchase Product</div>
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
                        <form action="{{ route('admin.purchase_product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="card-header border-bottom-0">
                                <h3 class="card-title">Add Purchase Product </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"> Name <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Enter Government Storage Name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Division <span class="text-red">*</span></label>
                                            <select onchange="getDistrict(this)" name="division_id" class="form-control serchBox" required id="division_id" >
                                                <option value=""> Division  </option>
                                                @foreach ($division as $item)
                                                <option value="{{ $item->id }}"> {{ $item->name }} </option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">District <span class="text-red">*</span></label>
                                            <select onchange="getUpazila(this)" name="district_id" class="form-control " required id="district" >
                                                <option value=""> District  </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">upazila <span class="text-red">*</span></label>
                                            <select onchange="getUnion(this)" name="upazila_id" class="form-control " required id="upazila" >
                                                <option value=""> upazila  </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Union <span class="text-red">*</span></label>
                                            <select  name="union_id" class="form-control " required id="union" >
                                                <option value=""> Union  </option>


                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Address <span class="text-red">*</span></label>
                                            <input type="text" step=any  class="form-control"  id='address' name="address"
                                                placeholder="Enter Address" required>
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Product Price <span class="text-red">*</span></label>
                                            <input type="number" step=any  class="form-control"  id='price' name="price"
                                                placeholder="Enter Product Price" required>
                                        </div>
                                    </div> --}}


                                    {{-- <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Product Quentity </label>
                                            <input type="number" step=any  class="form-control" name="qty"
                                                placeholder="Enter Product Quentity" >
                                        </div>
                                    </div> --}}








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
