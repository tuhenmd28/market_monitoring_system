@extends('layouts.skeleton')
@section('title', 'Cost Category')
@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
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
                    <div class="page-title"> Cost Category</div>
                </div>
                <div class="page-rightheader ms-md-auto">
                    <div class=" btn-list">



                    </div>
                </div>
            </div>

            <!--End Page header-->

            <!-- Row -->
            <div class="row flex-lg-nowrap">


                <div class="col-md-5">
                    <div class="card">
                        <form
                            action="{{ isset($costCategory) ? route('admin.cost_category.update', $costCategory->id) : route('admin.cost_category.store') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @isset($costCategory)
                                @method('PUT')
                            @endisset
                            <div class="card-header border-bottom-0">
                                <h3 class="card-title"> {{ isset($costCategory) ? 'Edit' : 'Add' }} Cost Category </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Category Name <span class="text-red">*</span></label>
                                            <input type="text"
                                                value="{{ isset($costCategory) ? $costCategory->name : '' }}"
                                                class="form-control" name="name" placeholder="Enter Category Name"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Production Cost <span
                                                    class="text-red">*</span></label>
                                            <input type="number" step=any 
                                                value="{{ isset($costCategory) ? $costCategory->cost : '' }}"
                                                class="form-control" name="cost" placeholder="Enter Category Cost"
                                                required>
                                        </div>
                                    </div>
                                    @isset($costCategory)
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Category Show Status </label>
                                                <select name="status" id="" class="form-control select2">
                                                    <option {{ $costCategory->status == 1 ? 'selected' : '' }} value="1">
                                                        Show
                                                    </option>
                                                    <option {{ $costCategory->status == 0 ? 'selected' : '' }} value="0">
                                                        Hide
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    @endisset





                                </div>

                                <button type="submit" id="submit_btn" class="btn btn-primary float-end mb-5">
                                    {{ isset($costCategory) ? 'Update' : 'Add' }}
                                </button>


                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header border-bottom-0">
                            <h3 class="card-title"> Cost Category List </h3>
                        </div>
                        <div class="e-panel card">
                            <div class="card-body">
                                <div class="e-table">
                                    <div class="table-lg mt-3" id="tableContainer">


                                        <div class="table-responsive1">
                                            <table class="display  table-responsive text-center" style="width:100%"
                                                id="package">
                                                <thead class="bg-primary">
                                                    <tr role="row">
                                                        <th class="text-center text-white">SL.</th>
                                                        <th class="text-center text-white">Name</th>
                                                        <th class="text-center text-white">Cost</th>
                                                        <th class="text-center text-white">Status</th>


                                                        <th class="text-center text-white">
                                                            Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($costCategories as $key => $item)
                                                        <tr>
                                                            <td class="text-center">{{ ++$key }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->cost }}</td>
                                                            <td>
                                                                <span
                                                                    class="badge badge-{{ $item->status == 1 ? 'success' : 'danger' }}-light">{{ $item->status == 1 ? 'Show' : 'Hide' }}</span>

                                                            </td>

                                                            <td>


                                                                <div class="btn-group" role="group"
                                                                    aria-label="Basic mixed styles example">
                                                                    <a href="{{ route('admin.cost_category.edit', $item->id) }}"
                                                                        class="btn btn-warning btn-sm">
                                                                        <i class="fa fa-edit" data-bs-toggle="tooltip"
                                                                            title="" data-bs-original-title="Edit"
                                                                            aria-label="Edit"></i>
                                                                    </a>

                                                                    <button type="button" class="btn btn-danger btn-sm"
                                                                        onclick="deleteItem('{{ $item->id }}','CostCategory')">
                                                                        <i class="ti-trash" data-bs-toggle="tooltip"
                                                                            title="" data-bs-original-title="Delete"
                                                                            aria-label="Delete"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            {{-- <td colspan="8" align="center"> no data foudn </td> --}}
                                                            <td></td>
                                                            <td></td>
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
    {{-- {!! $dataTable->scripts() !!} --}}
    <script>
        $("#package").DataTable({
            // dom: 'lrtip'
        })
    </script>
@endpush
