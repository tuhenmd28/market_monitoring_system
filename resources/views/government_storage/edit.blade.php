@extends('layouts.skeleton')
@section('title', 'Edit Government Storage')

@section('content')


    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-lg-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">Edit Government Storage</div>
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

                        <form action="{{ route('admin.government_storage.update',$governmentStorage->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <div class="card-header border-bottom-0">
                                <h3 class="card-title"> Edit Government Storage </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"> Name <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Enter Government Storage Name" value="{{ $governmentStorage->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Division <span class="text-red">*</span></label>
                                            <select onchange="getDistrict(this)" name="division_id" class="form-control serchBox" required id="division_id" >
                                                <option value=""> Division  </option>
                                                @foreach ($division as $item)
                                                <option @selected($governmentStorage->division_id == $item->id) value="{{ $item->id }}"> {{ $item->name }} </option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">District <span class="text-red">*</span></label>
                                            <select onchange="getUpazila(this)" name="district_id" class="form-control " required id="district" >
                                                <option value=""> District  </option>
                                                @foreach ($district as $item)
                                                <option @selected($governmentStorage->district_id == $item->id) value="{{ $item->id }}"> {{ $item->name }} </option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">upazila <span class="text-red">*</span></label>
                                            <select onchange="getUnion(this)" name="upazila_id" class="form-control " required id="upazila" >
                                                <option value=""> upazila  </option>
                                                @foreach ($upazila as $item)
                                                <option @selected($governmentStorage->upazila_id == $item->id) value="{{ $item->id }}"> {{ $item->name }} </option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Union <span class="text-red">*</span></label>
                                            <select  name="union_id" class="form-control " required id="union" >
                                                <option value=""> Union  </option>

                                                @foreach ($union as $item)
                                                <option @selected($governmentStorage->union_id == $item->id) value="{{ $item->id }}"> {{ $item->name }} </option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Address <span class="text-red">*</span></label>
                                            <input type="text" step=any  value="{{ $governmentStorage->address  }}" class="form-control"  id='address' name="address"
                                                placeholder="Enter Address" required>
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
