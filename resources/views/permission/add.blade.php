@extends('layouts.skeleton')
@section('title', 'Permission')
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
                    <div class="page-title">{{!isset($editPermission)?"Add":"Edit" }} Permission</div>
                </div>
                <div class="page-rightheader ms-md-auto">
                    <div class=" btn-list">



                    </div>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row flex-lg-nowrap">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="card">
                        <form action="{{  !isset($editPermission)?route('admin.permission.store'):route('admin.permission.update',$editPermission->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @isset($editPermission)
                                @method("put")
                            @endisset

                            <div class="card-header border-bottom-0">
                                <h3 class="card-title">{{!isset($editPermission)?"Add":"Edit" }} Permission </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 ">
                                        <div class="form-group">
                                            <label class="form-label">Permission Name <span class="text-red">*</span></label>
                                            <input type="text" value="{{ isset($editPermission)?$editPermission->name:'' }}" class="form-control" name="name"
                                                placeholder="Enter permission Name" required>
                                        </div>
                                    </div>







                                </div>
                                <button type="submit" id="submit_btn" class="btn btn-primary float-end my-5"> {{ !isset($editPermission)?"Create":"Update" }}
                                </button>

                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="card">

                        <div class="card-header border-bottom-0">
                            <h3 class="card-title">Permission List</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive1">
                                <table class="display  table-responsive" style="width:100%" id="package">
                                    <thead class="bg-primary">
                                        <tr permission="row">
                                            <th class="text-center text-white">SL.</th>
                                            <th width="" class="text-center text-white">Name</th>
                                            <th class="text-center text-white">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($permissions as $key => $permission)
                                            @php
                                                $create = \Carbon\Carbon::parse($permission->created_at)->format('d-m-Y');

                                            @endphp
                                            <tr>
                                                <td class="text-center">{{ ++$key }}</td>
                                                <td class="text-center">{{ $permission->name }}</td>

                                                <td class="text-center">


                                                    <div class="btn-group" permission="group"
                                                        aria-label="Basic mixed styles example">

                                                            <a href="{{ route('admin.permission.edit', $permission->id) }}"
                                                                class="btn btn-warning btn-sm">
                                                                <i class="fa fa-edit" data-bs-toggle="tooltip"
                                                                    title="" data-bs-original-title="Edit"
                                                                    aria-label="Edit"></i>
                                                            </a>

                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                onclick="deleteItem('{{ $permission->id }}','permission')">
                                                                <i class="ti-trash" data-bs-toggle="tooltip" title=""
                                                                    data-bs-original-title="Delete" aria-label="Delete"></i>
                                                            </button>



                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                {{-- <td colspan="3" align="center"> no data foudn </td> --}}
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse


                                    </tbody>
                                </table>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <!-- End Row -->

        </div>








    </div><!-- end app-content-->

@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets/plugins/datatable/buttons.server-side.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
    <script>
        $("#package").DataTable({
            // dom: 'lrtip'
        })
    </script>
@endpush
