@extends('layouts.skeleton')
@section('title', 'Delivary Charge')
@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <style>
        .row {
            margin: 0 !important;
        }

        .top {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .top>.dt-buttons {
            display: flex;
            border: 1px solid #4e9eff;
            border-radius: 4px;
        }

        .top .dt-buttons>.dt-button:hover {
            background: #fff !important;
            box-shadow: none !important;
            border: none !important;
            border-right: 1px solid #4e9eff !important;
        }

        .top .dt-buttons>.dt-button {
            margin: 0;
            border: none !important;
            border-right: 1px solid #4e9eff !important;
            color: #4e9eff;
            background: #fff;
            box-shadow: none !important;
        }

        .top .dt-buttons>.dt-button:last-child {
            border: none !important;
        }

        .app-content .side-app.main-container {
            min-height: 709px;
        }

        table tr th {
            background: #4e9eff !important;
        }


        td>span {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        td>span.no i,
        td>span.yes i {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: grid;
            place-content: center;
            color: white;
            font-size: 18px;
            background: green;
        }

        td>span.no i {
            background: red;

        }
    </style>
@endpush
@section('content')


    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-lg-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">Delivary Charge</div>
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
                        <form action="{{  route('admin.delivary_charge_setting') }}" method="post" enctype="multipart/form-data">
                            @csrf


                            <div class="card-header border-bottom-0">
                                <h3 class="card-title">Delivary Charge </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 ">
                                        <div class="form-group">
                                            <label class="form-label"> Delivary Charge From <span class="text-red">*</span></label>
                                            <select name="charge_from" required id="charge_from" class="form-controll select2">
                                                <option {{ $setting->charge_from == 0?"selected":"" }} value="0">Admin</option>
                                                <option {{ $setting->charge_from == 1?"selected":"" }} value="1">Vendor</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Delivary Charge <span class="text-red">*</span></label>
                                            <select name="status" required id="status" class="form-controll select2">
                                                <option {{ $setting->status == 0?"selected":"" }} value="0">Include</option>
                                                <option {{ $setting->status == 1?"selected":"" }} value="1">Free</option>
                                            </select>
                                        </div>
                                    </div>







                                </div>
                                <button type="submit" id="submit_btn" class="btn btn-primary float-end my-5"> {{ "Update" }}
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

@endpush
