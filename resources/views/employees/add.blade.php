@extends('layouts.skeleton')
@section('title', 'Add Employe')
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .ff_fileupload_wrap .ff_fileupload_dropzone {
            height: 162px;

        }

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
            padding-bottom: 12px;
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
                    <div class="page-title">Add Employe</div>
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
                        <form action="{{ route('admin.employe.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="card-header border-bottom-0">
                                <h3 class="card-title"> Add Employe </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Employe Name <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Enter Employe Name" required value="{{ old('name') }}">

                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Phone<span class="text-red">*</span></label>
                                            <input type="text" class="form-control" name="phone"
                                                placeholder="Enter Party Phone Number" value="{{ old('phone') }}" required>

                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Email (Optional)</label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Enter Party Email" value="{{ old('email') }}" >

                                        </div>
                                    </div>


                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Employe salary <span class="text-red">*</span></label>
                                            <input type="number" class="form-control" name="salary"
                                                placeholder="Enter Employe salary" required value="{{ old('salary') }}">

                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Due salary <span class="text-red">*</span></label>
                                            <input type="number" class="form-control" name="due_salary"
                                                placeholder="Enter Due salary" required value="{{ old('due_salary') }}">

                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Addvance salary <span class="text-red">*</span></label>
                                            <input type="number" class="form-control" name="addvance_salary"
                                                placeholder="Enter Addvance salary" required value="{{ old('addvance_salary') }}">

                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class=" form-group">
                                            <label class="form-label">Joining Date <span class="text-red">*</span></label>
                                            <div class="input-group ">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <span class="feather feather-calendar"></span>
                                                    </div>
                                                </div><input class="form-control " name="joining_date" id="selectDate" placeholder="MM/DD/YYYY" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class=" form-group">
                                            <label class="form-label">Select Status<span class="text-red">*</span></label>
                                            <select
                                            class="form-control select2-show-search custom-select"
                                            name="status"
                                            required>

                                            @foreach ($status as $k=>$st)
                                                <option @selected($k == 1) value="{{ $k }}">
                                                    {{ $st }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="form-label"> Address <span class="text-red">*</span></label>
                                            <textarea class="form-control content m-0" name="address" placeholder="Enter Party Address" required>{{ old('address') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Employe Profile Picture  (Optional)</label>
                                            <input type="file" name="image" class="dropify" data-height="150">
                                        </div>
                                    </div>


                                </div>

                                <button type="submit" id="submit_btn" class="btn btn-primary float-end mb-5"> Create
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
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $("#selectDate").flatpickr({
    // enableTime: true,
    dateFormat: "Y-m-d ",
})


</script>

@endpush
