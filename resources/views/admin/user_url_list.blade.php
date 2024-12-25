@extends('layouts.skeleton')
@section('title', 'User URL List')

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    {{-- <style>
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
            align-tenants: center;
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

        table tbody tr td,
        th {
            text-align: center;
        }
    </style> --}}
@endpush
@section('content')





    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-lg-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">User URL List</div>
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
                                                <table class="display  table-responsive" style="width:100%" id="package">
                                                    <thead class="bg-primary">
                                                        <tr role="row">
                                                            <th class="text-center text-white">SL.</th>

                                                            <th class="text-center text-white">Image</th>
                                                            <th class="text-center text-white">Name</th>
                                                            <th class="text-center text-white">User Name</th>
                                                            <th class="text-center text-white">User URL</th>
                                                            <th class="text-center text-white">Create Date</th>



                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($tenants as $key => $tenant)
                                                            @php
                                                                $create = \Carbon\Carbon::parse(
                                                                    $tenant->created_at,
                                                                )->format('d-m-Y');

                                                            @endphp
                                                            <tr>
                                                                <td>{{ ++$key }}</td>

                                                                <td>
                                                                    @if ($tenant?->user?->photo == null)
                                                                        <img src="{{ asset('assets/images/users/avatar5.png') }}"
                                                                            alt="img" class="avatar avatar-md bradius">
                                                                    @else
                                                                        <img src="{{ asset('uploads/profile/' . $tenant?->user?->photo) }}"
                                                                            alt="img" class="avatar avatar-md bradius">
                                                                    @endif
                                                                </td>
                                                                <td>{{ $tenant?->user?->name }}</td>
                                                                <td>
                                                                    @role('Super Admin|Admin')
                                                                    <button
                                                                        onclick="changeDomainName('{{ $tenant?->user?->id }}','{{ $tenant?->user?->user_name }}')"
                                                                        data-effect="effect-scale" data-bs-toggle="modal"
                                                                        href="#modaldemo8" data-bs-toggle="tooltip"
                                                                        data-bs-original-title="Edit User Name"
                                                                        class="btn btn-sm btn-primary-transparent modal-effect">{{ $tenant?->user?->user_name }}
                                                                    </button>
                                                                    @else
                                                                    {{ $tenant?->user?->user_name }}
                                                                    @endrole

                                                                </td>
                                                                <td>{{ $tenant->domain }}</td>
                                                                {{-- <input type="hidden" name="" value="{{ asset('uploads/images/'.$tenant->image) }}" > --}}
                                                                {{-- <td>
                                                                    <button class="btn btn-success" title="Copy"
                                                                        onclick="CopyUrl('#img{{ $tenant->id }}')">Copy</button>
                                                                </td> --}}
                                                                <td>{{ $create }} </td>



                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                {{-- <td colspan="3" align="center"> no data foudn </td> --}}

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
    <div class="modal fade" id="modaldemo8" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
                <form id="submitForm" action="{{ route('admin.change_domain') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="userId">
                    <div class="modal-header">
                        <h6 class="modal-title">Edit Domain Name</h6><button aria-label="Close" class="btn-close"
                            type="button" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <h6>Change Domain Name </h6>
                        <input type="text" class="form-control" name="user_name" id="userName">

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Update</button> <button type="button"
                            class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
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
          function changeDomainName(id, userName) {
            $("#userId").val(id);
            $("#userName").val(userName)
        }


        function CopyUrl(el) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(el).attr('src')).select();
            document.execCommand("copy");
            $temp.remove();
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "Image URL Copy successfully"
            });
        }
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
