@extends('layouts.skeleton')
@section('title', 'Package List')

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
                    <div class="page-title">Package List</div>
                </div>

            </div>




            <!-- Row -->
            <div class="row flex-lg-nowrap">
                <div class="col-12">
                    <div class="row flex-lg-nowrap">
                        <div class="col-12 mb-3">


                            <div class="e-panel card">
                                <div class="card-body">
                                    <div class="e-table">
                                        <div class="table-lg mt-3" id="tableContainer">


                                            <div class="table-responsive1">
                                                <table class="display  table-responsive" style="width:100%"
                                                    id="package">
                                                    <thead class="bg-primary">
                                                        <tr role="row">
                                                            <th class="text-center text-white">SL.</th>
                                                            <th width="20%" class="text-center text-white">Name</th>
                                                            <th class="text-center text-white">Price</th>
                                                            <th class="text-center text-white">Admin Profit</th>
                                                            <th class="text-center text-white">Seller Profit</th>
                                                            <th class="text-center text-white">Added From</th>
                                                            <th class="text-center text-white">Product Qty</th>
                                                            <th class="text-center text-white">Image</th>
                                                            <th class="text-center text-white">Create Date</th>
                                                            <th class="text-center text-white">Approve Status</th>

                                                            <th class="text-center text-white">
                                                                Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($products as $key => $item)
                                                            @php
                                                                $create = \Carbon\Carbon::parse($item->created_at)->format('d-m-Y');

                                                            @endphp
                                                            <tr>
                                                                <td>{{ ++$key }}</td>
                                                                <td>{{ $item->product_name }}</td>
                                                                <td>{{ $item->pro_price }}</td>
                                                                <td>{{ $item->admin_profit }}</td>
                                                                <td>{{ $item->seller_profit==null?0:$item->seller_profit }}</td>
                                                                <td>{{ $item->login_id != null?"Sbilbd":"Here" }} </td>
                                                                <td>{{ $item->p_qty }}</td>
                                                                {{--

                                                                <td>{{ $item->product_qty }} </td> --}}
                                                                {{-- <td>{{ $item->total_price }} </td>
                                                                <td>{{ $item->custom_price }} </td> --}}
                                                                <td><img width="150" src="{{ asset('uploads/product/'.$item->product_img) }}" alt=""> </td>
                                                                <td>{{ $create }} </td>
                                                                <td>{!! $item->vendor_approve_st == 1?'<span class="text-success">Approved</span>':'<span class="text-danger">Panding</span>' !!} </td>


                                                                <td>
                                                                    {{-- <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                                        <button type="button" class="btn btn-danger">Left</button>
                                                                        <button type="button" class="btn btn-warning">Middle</button>
                                                                        <button type="button" class="btn btn-success">Right</button>
                                                                    </div> --}}

                                                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                                        @if (auth()->user()->id == $item->user_id || ($item->login_id != null && auth()->user()->login?->id == $item->login_id) || auth()->user()->user_type == 1)
                                                                            <a href="{{ route('admin.product.edit', $item->pro_id) }}"
                                                                                class="btn btn-warning btn-sm"
                                                                                >
                                                                                <i class="fa fa-edit" data-bs-toggle="tooltip" title="" data-bs-original-title="Edit" aria-label="Edit"></i>
                                                                            </a>
                                                                            @if (auth()->user()->user_type == 1 && $item->vendor_approve_st == 0 )
                                                                            <a href="{{ route('admin.product.approved', $item->pro_id) }}"
                                                                                class="btn btn-success btn-sm"
                                                                                >
                                                                                <i class="fa fa-edit" data-bs-toggle="tooltip" title="" data-bs-original-title="Approve" aria-label="Approve"></i>
                                                                            </a>
                                                                            @endif
                                                                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteItem('{{ $item->id }}','product')" >
                                                                            <i class="ti-trash" data-bs-toggle="tooltip" title="" data-bs-original-title="Delete" aria-label="Delete"></i>
                                                                            </button>

                                                                        @endif

                                                                        {{-- <a href="{{ route('admin.product.show', $item->pro_id) }}"
                                                                            class="btn btn-success btn-sm"
                                                                            >
                                                                            <i class="fa fa-eye" data-bs-toggle="tooltip" title="" data-bs-original-title="View Package" aria-label="View Package"></i>
                                                                        </a> --}}
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
        $("#package").DataTable({
            // dom: 'lrtip'
        })
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
