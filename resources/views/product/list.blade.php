@extends('layouts.skeleton')
@section('title', ' Product List')

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
                    <div class="page-title"> Product List</div>
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


                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" style="width:100%"
                                                    id="responsive-datatable">
                                                    <thead class="bg-primary " >
                                                        <tr role="row ">
                                                            <th class="text-center text-white">SL.</th>
                                                            <th width="20%" class="text-center text-white">Name</th>
                                                            <th class="text-center text-white"> Category</th>
                                                            {{-- <th class="text-center text-white">Images</th> --}}
                                                            <th class="text-center text-white">Price</th>
                                                            <th class="text-center text-white">Image</th>
                                                            <th class="text-center text-white">Date</th>
                                                            <th class="text-center text-white">Status</th>
                                                            <th class="text-center text-white">Auction</th>
                                                            <th class="text-center text-white"> Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($products as $key => $item)
                                                            @php
                                                                $create = \Carbon\Carbon::parse($item->created_at)->format('d-m-Y');

                                                            @endphp
                                                            <tr>
                                                                <td>{{ ++$key }}</td>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->category?->name }}</td>
                                                                {{-- <td>{{ $item->type?->name }}</td> --}}

                                                                <td>{{ $item->start_price }}</td>

                                                                <td><img width="150" src="{{ asset('product/'.$item->image) }}" alt=""> </td>
                                                                <td>{{ $create }} </td>
                                                                <td>{!! '<span class="badge badge-success-light">'.$item->status.'</span>' !!} </td>
                                                                <td>

                                                                    <a class="modal-effect btn btn-primary btn-sm" onclick="SetAuctionTime('{{ $item->id }}')" data-effect="effect-super-scaled" data-bs-toggle="modal" href="#modaldemo8">  Set Auction Time</a>
                                                                </td>
                                                                    {{-- <button type="button" class="btn btn-danger btn-sm" onclick="SetAuctionTime('{{ $item->id }}')" >
                                                                        Set Auction Time
                                                                    </button> --}}
                                                                <td>


                                                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                                                            <a href="{{ route('admin.product.edit', $item->id) }}"
                                                                                class="btn btn-warning btn-sm"
                                                                                >
                                                                                <i class="fa fa-edit" data-bs-toggle="tooltip" title="" data-bs-original-title="Edit" aria-label="Edit"></i>
                                                                            </a>

                                                                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteItem('{{ $item->id }}','product')" >
                                                                            <i class="ti-trash" data-bs-toggle="tooltip" title="" data-bs-original-title="Delete" aria-label="Delete"></i>
                                                                            </button>



                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @empty

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
    <div class="modal fade"  id="modaldemo8" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content modal-content-demo">
                <form action="{{ route('admin.set_product_auction') }}" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h6 class="modal-title">Message Preview</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" id="product_id" value="">
                        <div class="form-group">
                        <label class="form-label text-start h5">Set Start Time <span class="text-red">*</span></label>
                            <input type="text" class="form-control" name="start_time" id="datetimepicker" placeholder="Select Date and Time">
                        </div>
                        <div class="form-group">
                        <label class="form-label text-start h5">Set End Time <span class="text-red">*</span></label>
                            <input type="text" class="form-control" id="endTime" name="end_time" placeholder="Select Date and Time">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Save </button> <button type="button" class="btn btn-light" data-bs-dismiss="modal" >Close</button>
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

    <!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}


<script>
    $(document).ready(function(){
  $("#datetimepicker").flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    time_24hr: true,
    defaultDate: new Date()
  });
  $("#endTime").flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    time_24hr: true,
    defaultDate: new Date()
  });
});

    function SetAuctionTime(id) {
        // alert(id);
        $('#product_id').val(id);
        // $.ajax({
        //     type: "GET",
        //     url: "",
        //     data: {
        //         id: id
        //     },
        //     success: function (response) {
        //         if (response.status == 200) {
        //             toastr.success(response.message);
        //             setTimeout(() => {
        //                 location.reload();
        //             }, 1000);
        //         } else {
        //             toastr.error(response.message);
        //         }
        //     }
        // });
    }
</script>


@endpush
