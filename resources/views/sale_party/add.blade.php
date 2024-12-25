@extends('layouts.skeleton')
@section('title', 'Add Sale Party')
@push('styles')
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
                    <div class="page-title">Add Sale Party</div>
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
                        <form action="{{ route('admin.party.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="card-header border-bottom-0">
                                <h3 class="card-title"> Add Sale Party </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"> Name <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Enter Party Name" required value="{{ old('name') }}">

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
                                            <label class="due">Due<span class="text-red">*</span></label>
                                            <input type="number" step=any  id="due" class="form-control" name="due"
                                                placeholder="Enter Party Due Amount" value="{{ old('due') }}" value="0" required>

                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="due">Advence<span class="text-red">*</span></label>
                                            <input type="number" step=any  id="advence" class="form-control" name="advence"
                                                placeholder="Enter Party Advence Amount" value="{{ old('advence') }}" value="0" required>

                                        </div>
                                    </div>



                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Party Address <span class="text-red">*</span></label>
                                            <textarea class="form-control content m-0" name="address" placeholder="Enter Party Address" required>{{ old('address') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Party Logo (Optional)</label>
                                            <input type="file" name="logo" class="dropify" data-height="150">
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
