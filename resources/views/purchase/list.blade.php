@extends('layouts.skeleton')
@section('title', 'Purchase Product List')

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
                    <div class="page-title">Purchase Product List</div>
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
                                                    <thead class="bg-primary">
                                                        <tr role="row">
                                                            <th class="text-center text-white">SL.</th>
                                                            <th  class="text-center text-white">Party Name</th>
                                                            <th width="15%" class="text-center text-white">Name</th>
                                                            <th  class="text-center text-white">Purchase ID</th>
                                                            <th class="text-center text-white">Size </th>
                                                            <th class="text-center text-white">Color </th>
                                                            <th class="text-center text-white">GMS </th>
                                                            <th class="text-center text-white">Unit </th>
                                                            <th class="text-center text-white"> Qty</th>
                                                            <th class="text-center text-white">Total </th>
                                                            <th class="text-center text-white">Payment </th>
                                                            <th class="text-center text-white">Due </th>
                                                            <th class="text-center text-white">Image</th>
                                                            <th class="text-center text-white">Create Date</th>
                                                            {{-- <th class="text-center text-white">Status</th> --}}
                                                            <th class="text-center text-white"> Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($purchase as $key => $item)
                                                            @php
                                                                $create = \Carbon\Carbon::parse($item->created_at)->format('d-m-Y');

                                                            @endphp
                                                            <tr>
                                                                <td>{{ ++$key }}</td>
                                                                <td>{{ $item->party?->name }}</td>
                                                                <td>{{ $item->product?->name }}</td>
                                                                <td>{{ $item->order_id }}</td>
                                                                <td>{{ $item->size?->name }}</td>
                                                                <td>{{ $item->color?->name }}</td>
                                                                <td>{{ $item->gsm?->name }}</td>
                                                                <td>{{ $item->unit?->name }}</td>

                                                                <td>{{ $item->qty }}</td>
                                                                <td>{{ $item->total_price }}</td>
                                                                <td>{{ $item->payment }}</td>
                                                                <td>{{ $item->due }}</td>
                                                                <td><img width="150" src="{{ asset('uploads/purchase_product/'.$item->product?->image) }}" alt=""> </td>
                                                                <td>{{ $create }} </td>


                                                                <td>


                                                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                                                            <a href="{{ route('admin.purchase.show', $item->id) }}"
                                                                                class="btn btn-warning btn-sm"
                                                                                >
                                                                                <i class="fa fa-eye" data-bs-toggle="tooltip" title="" data-bs-original-title="Show Purchase Details" aria-label="Show Purchase Details"></i>
                                                                            </a>





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


    </script>



@endpush
