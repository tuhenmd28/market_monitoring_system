@extends('layouts.skeleton')
@section('title', 'Sale Product List')
@php
    $totalCost = 0;
    $totalSale = 0;

    $cost = 0;
    $sale = 0;
@endphp
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
                    <div class="page-title">Sale Product List</div>
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
                                                            <th width="20%" class="text-center text-white">Name</th>
                                                            <th class="text-center text-white">Size</th>
                                                            <th class="text-center text-white">Color</th>
                                                            <th class="text-center text-white">GMS</th>
                                                            <th class="text-center text-white">Create Date</th>
                                                            <th class="text-center text-white">Sale Price</th>
                                                            <th class="text-center text-white">Production Cost</th>
                                                            <th class="text-center text-white">Qty</th>
                                                            <th class="text-center text-white">Total Cost</th>
                                                            <th class="text-center text-white">Total Sale </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($sales as $key => $item)
                                                            @php
                                                                $create = \Carbon\Carbon::parse(
                                                                    $item->created_at,
                                                                )->format('d-m-Y');
                                                                $cost = $item->product?->production_cost * $item->qty;
                                                                $sale = $item->product_price * $item->qty;
                                                                $totalCost += $cost;
                                                                $totalSale += $sale;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ ++$key }}</td>
                                                                <td>{{ $item->product?->name }}</td>
                                                                <td>{{ $item->size?->name }}</td>
                                                                <td>{{ $item->color?->name }}</td>
                                                                <td>{{ $item->gsm?->name }}</td>
                                                                <td>{{ $create }}</td>
                                                                <td>{{ $item->product_price }}</td>
                                                                <td>{{ $item->product?->production_cost }}</td>
                                                                <td>{{ $item->qty }}</td>
                                                                <td>{{ $cost }}
                                                                </td>
                                                                <td>{{ $sale }}</td>

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

                                                {{-- <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td><h4>  Total Production Const</h4> </td>
                                                            <td><h4>  {{ $totalCost }}</h4> </td>
                                                            <td><h4>  Total Sale Amount</h4> </td>
                                                            <td><h4>  {{ $totalSale }}</h4> </td>
                                                            <td><h4>  Total Profit </h4> </td>
                                                            <td><h4>  {{ $totalSale - $totalCost }}</h4> </td>
                                                        </tr>
                                                    </thead>
                                                </table> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header border-bottom-0">
                                            <h3 class="card-title">Product Profit Calculation </h3>
                                        </div>
                                        <div class="table-responsive">
                                            <table
                                                class="table card-table table-vcenter text-nowrap  mb-0">
                                                <thead class="bg-primary text-white">
                                                    <tr>
                                                        <td colspan="2" class="text-white">From Date
                                                        </td>
                                                        <td class="text-white">{{ $from }}</td>
                                                        <td colspan="2" class="text-white">To Date
                                                        </td>
                                                        <td class="text-white">{{ $to }}</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h4> Total Production Const</h4>
                                                        </td>
                                                        <td>
                                                            <h4> {{ numberFormate($totalCost) }}</h4>
                                                        </td>
                                                        <td>
                                                            <h4> Total Sale Amount</h4>
                                                        </td>
                                                        <td>
                                                            <h4> {{ numberFormate($totalSale) }}</h4>
                                                        </td>
                                                        <td>
                                                            <h4> Total Profit </h4>
                                                        </td>
                                                        <td>
                                                            <h4> {{ numberFormate($totalSale - $totalCost) }}</h4>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- table-responsive -->
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
