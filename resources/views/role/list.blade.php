@extends('layouts.skeleton')
@section('title', 'User List')

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <style>
        .modal .select2-container {
            text-align: left;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {

            text-align: left;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {

            text-align: left;
        }

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
            align-users: center;
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


    <div class="modal fade" id="modaldemo8" data-bs-backdrop="static">
        <div class="modal-dialog  text-center " role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Assign User Role</h6><button aria-label="Close" class="btn-close"
                        data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.assignRole') }}" method="post">
                        @csrf
                        <h6 class="text-start mt-3">User Name</h6>
                        <input type="text" name="user_id" readonly id="user_id" class="form-control">
                        <h6 class="text-start mt-3">User Id</h6>
                        <input type="text" readonly name="name" id="user_name" class="form-control">
                        <h6 class="text-start mt-3">Select User Role </h6>
                        <select name="role[]" id="role" multiple
                            class="form-control select2 select2-dropdown text-start">
                            <option value="">Select Role</option>
                            @foreach (role() as $item)
                                <option value="{{ $item->name }}">{{ $item->name }} </option>
                            @endforeach
                        </select>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Assign</button> <button class="btn ripple btn-danger"
                        data-bs-dismiss="modal" type="button">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-lg-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">User List</div>
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
                                                            <th class="text-center text-white">User Name</th>
                                                            <th class="text-center text-white">Role</th>

                                                            <th class="text-center text-white">Facebook Page URL </th>
                                                            <th class="text-center text-white">Mobile No.</th>
                                                            <th class="text-center text-white">NID</th>
                                                            <th class="text-center text-white">User ID</th>
                                                            <th class="text-center text-white">Status</th>

                                                            <th class="text-center text-white">
                                                                Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($users as $key => $user)
                                                            @php
                                                                $create = \Carbon\Carbon::parse($user->created_at)->format('d-m-Y');

                                                            @endphp
                                                            <tr>
                                                                <td>{{ ++$key }}</td>
                                                                <td>{{ $user->name }}</td>
                                                                <td>
                                                                    @php
                                                                        $array = $user->getRoleNames();
                                                                    @endphp
                                                                    @foreach ($array as $item)
                                                                        @if ($loop->last)
                                                                            {{ $item }}
                                                                        @break
                                                                    @endif
                                                                    {{ $item . ', ' }}
                                                                @endforeach
                                                            </td>
                                                            <td>{{ $user->f_page_url }}</td>

                                                            <td>{{ $user->phone }} </td>
                                                            <td>{{ $user->nid }} </td>
                                                            <td>{{ $user->id }} </td>
                                                            <td>{{ $user->seller_status == 0 ? 'Pending' : ($user->seller_status == 1 ? 'Approve' : 'Reject') }}
                                                            </td>
                                                            {{-- <td><img width="150" src="{{ asset('uploads/package/'.$user->image) }}" alt=""> </td> --}}
                                                            {{-- <td>{{ $create }} </td> --}}


                                                            <td class="text-center">


                                                                <div class="btn-group" role="group"
                                                                    aria-label="Basic mixed styles example">
                                                                    <a data-id="{{ $user->id }}"
                                                                        data-user-name="{{ $user->name }}"
                                                                        class="modal-effect btn btn-success btn-sm"
                                                                        data-effect="effect-slide-in-right"
                                                                        data-bs-toggle="modal" href="#modaldemo8">
                                                                        <i class="fa fa-user" data-bs-toggle="tooltip"
                                                                            title=""
                                                                            data-bs-original-title="Assign Role"
                                                                            aria-label="Assign Role"></i>
                                                                    </a>


                                                                    {{-- <button type="button" class="btn btn-danger btn-sm" onclick="deleteuser('{{ $user->id }}','user')" >
                                                                        <i class="ti-trash" data-bs-toggle="tooltip" title="" data-bs-original-title="Delete" aria-label="Delete"></i>
                                                                    </button> --}}
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
    $(document).ready(function() {
        $(".modal-effect").each(function() {
            $(this).click(function() {
                let id = $(this).attr('data-id');
                let name = $(this).attr('data-user-name');
                $("#user_id").val(id);
                $("#user_name").val(name);
                $.ajax({
                    type: "post",
                    url: "{{ route('admin.getUserRole') }}",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        // console.log(response);
                        $("#role").val(response).trigger('change');
                        // $("#subcategory").html(response)
                    }
                })
            })
        })
    })


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
