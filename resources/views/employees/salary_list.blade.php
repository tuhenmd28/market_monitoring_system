@extends('layouts.skeleton')
@section('title', 'Salary Employee List')

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
                    <div class="page-title">Salary Employee List</div>
                </div>

            </div>




            <!-- Row -->
            <div class="row flex-lg-nowrap">
                <div class="col-12">
                    <div class="row flex-lg-nowrap">
                        <div class="col-12 mb-3">

                            <div class="card">
                                <form action="{{ route('admin.salary_report') }}" target="_blank" method="post">
                                    @csrf
                                    <div class="card-header border-bottom-0">
                                        <h3 class="card-title"> Choose Date </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row align-items-end">
                                            <div class="col-md-5">
                                                <label class="form-label">From and To Date</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <span class="feather feather-calendar"></span>
                                                        </div>
                                                    </div><input class="form-control rangeDatepicker " name="from"
                                                        placeholder="MM/DD/YYYY" type="text" id="from">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Select Employe</label>
                                                <select
                                                class="form-control select2-show-search custom-select"
                                                name="employee_id"
                                                >
                                                <option value="">Select Employe
                                                </option>
                                                @foreach ($employee as $em)
                                                    <option value="{{ $em->id }}">
                                                        {{ $em->name }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit" value="search" name="search" class="btn btn-info">Search</button>
                                                <button type="submit" value="print" name="print" class="btn btn-secondary ml-2">Print</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="e-panel card">
                                <div class="card-body">
                                    <div class="e-table">
                                        <div class="table-lg mt-3" id="tableContainer">


                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" style="width:100%"
                                                id="responsive-datatable">
                                                <thead class="bg-primary">
                                                    <tr role="row">

                                                        <th width="30" class="text-center text-white">
                                                           SL.
                                                        </th>
                                                        <th class="text-center text-white" width="150">Employe
                                                            Name</th>
                                                        <th class="text-center text-white">Salary</th>
                                                        <th class="text-center text-white">Daily</th>
                                                        <th class="text-center text-white">Work Day</th>

                                                        <th class="text-center text-white" >Basic Salary</th>

                                                        <th class="text-center text-white" >
                                                            OverTime(H) </th>
                                                        <th class="text-center text-white" >Per Hour
                                                        </th>
                                                        <th class="text-center text-white" >OverTime Amount </th>
                                                        <th class="text-center text-white" > Bonus </th>
                                                        <th class="text-center text-white" > Due </th>
                                                        <th class="text-center text-white" > Advance
                                                        </th>
                                                        <th class="text-center text-white" > Total Salary</th>
                                                        <th class="text-center text-white" > Paid Salary </th>
                                                        <th class="text-center text-white" > Due Salary </th>
                                                        <th class="text-center text-white" > Action </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($salary as $key => $item)

                                                        <tr>

                                                            <td class="text-center">
                                                                {{++$key}}
                                                            </td>
                                                            <td>{{ $item->employe->name }}</td>
                                                            <td>{{ $item->salary }}  </td>
                                                            <td >
                                                                {{ $item->daily_salary }}
                                                            </td>
                                                            <td>
                                                                {{ $item->work_days }}
                                                            </td>
                                                            <td >
                                                                    {{ $item->base_salary }}
                                                            </td>
                                                            <td class="overtime_hour{{ $key }}">
                                                                {{ $item->overtime_hour }}

                                                            </td>
                                                            <td class="per_hour{{ $key }}">
                                                                {{ $item->per_hour }}

                                                            </td>
                                                            <td class="overtime_salary{{ $key }}">
                                                                {{ $item->overtime_salary }}

                                                            </td>
                                                            <td class="bonuse{{ $key }}">
                                                                {{ $item->bonuse }}

                                                            </td>
                                                            <td class="due{{ $key }}">
                                                                {{ $item->due }}

                                                            </td>
                                                            <td class="advance{{ $key }}">
                                                                {{ $item->advance }}

                                                            </td>
                                                            <td class="total{{ $key }}">
                                                                {{ $item->total }}

                                                            </td>
                                                            <td class="paid{{ $key }}">
                                                                {{ $item->paid }}

                                                            </td>
                                                            <td class="due_salary{{ $key }}">
                                                                {{ $item->due_salary }}
                                                            </td>
                                                            <td>
                                                                <div class="btn-group" role="group"
                                                                        aria-label="Basic mixed styles example">
                                                                        <a href="{{ route('admin.salary.edit', $item->id) }}"
                                                                            class="btn btn-warning btn-sm">
                                                                            <i class="fa fa-edit" data-bs-toggle="tooltip"
                                                                                title="" data-bs-original-title="Edit"
                                                                                aria-label="Edit"></i>
                                                                        </a>
                                                                </div>
                                                            </td>



                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
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
            </div>
            <!-- End Row -->

        </div>



    </div><!-- end app-content-->



    </div>

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
        // $("#responsive-datatable").DataTable({
        //     // dom: 'lrtip'
        // })
        function package() {
            // var table = $('#package').DataTable({
            //     // dom: '<lB<t>ip>',
            //     dom: '<"top"lB>t<"bottom"ip><"clear">',
            //     // columnDefs: [{
            //     //         targets: 11,
            //     //         orderable: false,
            //     //     },
            //     //     {
            //     //         targets: 10,
            //     //         orderable: false
            //     //     },
            //     //     {
            //     //         targets: 9,
            //     //         orderable: false
            //     //     },
            //     //     {
            //     //         targets: 8,
            //     //         orderable: false
            //     //     },
            //     //     {
            //     //         targets: 2,
            //     //         orderable: false
            //     //     },
            //     //     {
            //     //         targets: 3,
            //     //         orderable: false
            //     //     },
            //     //     {
            //     //         targets: 4,
            //     //         orderable: false
            //     //     },
            //     // ],
            //     // buttons: [{

            //     //         // extend: 'printHtml5',
            //     //         text: '<i class="fa fa-print"></i> Print',
            //     //         titleAttr: 'Print',
            //     //     },
            //     //     {
            //     //         extend: 'excelHtml5',
            //     //         text: '<i class="fa fa-file-excel-o"></i> Excel',
            //     //         titleAttr: 'Excel'
            //     //     },
            //     //     {
            //     //         extend: 'csvHtml5',
            //     //         text: '<i class="fa fa-file-text-o"></i> CSV',
            //     //         titleAttr: 'CSV'
            //     //     },
            //     //     {
            //     //         extend: 'pdfHtml5',
            //     //         text: '<i class="fa fa-file-pdf-o"></i> PDF',
            //     //         titleAttr: 'PDF'
            //     //     },
            //     //     {
            //     //         extend: 'colvis',
            //     //         text: '<i class="fa fa-eye"></i> Columns',
            //     //         titleAttr: 'colvis'
            //     //     },

            //     // ]
            // });

            // $('#toggleColumns').on('click', function() {
            //     table.columns().visible(!table.column(0).visible()); // Toggle the visibility of the first column
            // });
        }
        package()

    </script>



@endpush
