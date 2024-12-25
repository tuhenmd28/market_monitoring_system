@extends('layouts.skeleton')
@section('title',"Sale Order Details")

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
                <div class="page-title">Sale Order Details</div>
            </div>
            <div class="page-rightheader ms-md-auto">

            </div>
        </div>
        <!--End Page header-->

        <!--/app header-->
        <div class="main-proifle">
            <div class="row">
                <div class="col-xl-7">
                    <div class="box-widget widget-user">
                        <div class="widget-user-image d-sm-flex">
                            <span class="avatar" style="background-image: url({{ $Party->logo == ''?asset('assets/images/users/avatar5.png'):asset('uploads/party/').$Party->logo }})">
                                <span class="avatar-status bg-green"></span>
                            </span>
                            <div class="ms-sm-4 mt-4">
                                <h4 class="pro-user-username mb-3 font-weight-semibold">{{ $Party->name }}<i class="ri-checkbox-circle-line text-success ms-1 fs-14"></i></h4>
                                {{-- <div class="d-flex mb-2">
                                    <span class="ri-global-line icons"></span>
                                    <div class="h6 mb-0 ms-3 mt-1">https://demowebsite.com</div>
                                </div> --}}
                                <div class="d-flex mb-2">
                                    <span class="ri-mail-line icons"></span>
                                    <div class="h6 mb-0 ms-3 mt-1">{{ $Party->email }}</div>
                                </div>
                                <div class="d-flex">
                                    <span class="ri-phone-line icons"></span>
                                    <div class="h6 mb-0 ms-3 mt-1">{{ $Party->phone }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-7">
                    {{-- <div class="text-xl-end mt-4 mt-xl-0">
                        <a  href="javascript:void(0);" class="btn btn-white">Message</a>
                        <a  href="javascript:void(0);" class="btn btn-primary">Edit Profile</a>
                    </div> --}}
                    <div class="mt-5">
                        <div class="main-profile-contact-list row justify-content-end">

                            @isset($orderPrice)
                            <div class="media col-sm-4 p-0">

                                <div class="media-body text-center">
                                    <span class="text-bold h3">Order Total</span>
                                    <div class="h1 text-secondary">
                                       {{$orderPrice}}
                                    </div>
                                </div>
                            </div>
                            <div class="media col-sm-4 p-0">
                                {{-- <div class="media-icon bg-orange me-3 mt-1">
                                    <i class="las la-wifi fs-20 text-white"></i>
                                </div> --}}
                                <div class="media-body text-center">
                                    <span class="text-bold h3">Order Due</span>
                                    <div class="h1 text-worning ">
                                        {{ $orderdue }}
                                    </div>
                                </div>
                            </div>

                            @endisset
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-cover">
                <div class="wideget-user-tab">
                    <div class="tab-menu-heading p-0">
                        <div class="tabs-menu1 px-3">
                            <ul class="nav">
                                <li><a href="#tab-7" class="active" data-bs-toggle="tab">Sale List</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- /.profile-cover -->
        </div>
        <!-- Row -->
        <div class="">
            <div class="">
                <div class="border-0">
                    <div class="tab-content">

                        <div class="tab-pane active" id="tab-7">
                            <div class="">
                                <div class="">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Party Sale List</h3>
                                        </div>

                                        <div class="card-body">
                                            <div class="table-responsive">

                                                <table  width="100%" class="partyList display table-striped table-responsive text-center">
                                                    <thead class="bg-primary">
                                                        <tr role="row">
                                                            <th class="text-center text-white">SL.</th>
                                                            <th width="20%" class="text-center text-white">Name</th>
                                                            <th class="text-center text-white">Size </th>
                                                            <th class="text-center text-white">Color </th>
                                                            <th class="text-center text-white">GMS </th>
                                                            <th class="text-center text-white">Price</th>
                                                            <th class="text-center text-white"> Qty</th>
                                                            <th class="text-center text-white">Total Price</th>
                                                            <th class="text-center text-white">Paid</th>
                                                            <th class="text-center text-white">Due</th>
                                                            <th class="text-center text-white">Create Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($sales as $key => $item)
                                                            @php
                                                                $create = \Carbon\Carbon::parse($item->created_at)->format('d-m-Y');

                                                            @endphp
                                                            <tr>
                                                                <td>{{ ++$key }}</td>
                                                                <td>{{ $item->product?->name }}</td>
                                                                <td>{{ $item->size?->name }}</td>
                                                                <td>{{ $item->color?->name }}</td>
                                                                <td>{{ $item->gsm?->name }}</td>

                                                                <td>{{ $item->product_price }}</td>
                                                                <td>{{ $item->qty }}</td>
                                                                <td>{{ ($item->product_price)*($item->qty) }}</td>
                                                                <td>{{ $item->pay_amount }}</td>
                                                                <td>{{ (($item->product_price)*($item->qty)) - $item->pay_amount }}</td>

                                                                <td>{{ $create }} </td>
                                                                {{-- <td>{!! $item->status == 1?'<span class="badge badge-success-light">Show</span>':'<span class="badge badge-danger-light">Hide</span>' !!} </td> --}}



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
<script>
    $(".partyList").DataTable()
</script>
@endpush
