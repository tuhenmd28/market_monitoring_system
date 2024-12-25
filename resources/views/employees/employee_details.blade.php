@extends('layouts.skeleton')
@section('title', 'Employee Salary Details')
@php
    if(session()->has('status')){
        $status = session()->get('status');
    }
    // dd(session()->has('status'))
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
                <div class="page-title">Employee Salary Details</div>
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
                            <span class="avatar" style="background-image: url({{ $employee->logo == ''?asset('assets/images/users/avatar5.png'):asset('uploads/employee/').$employee->logo }})">
                                <span class="avatar-status bg-green"></span>
                            </span>
                            <div class="ms-sm-4 mt-4">
                                <h4 class="pro-user-username mb-3 font-weight-semibold">{{ $employee->name }}<i class="ri-checkbox-circle-line text-success ms-1 fs-14"></i></h4>
                                <div class="d-flex mb-2">
                                    <span class="ri-location icons"></span>
                                    <div class="h6 mb-0 ms-3 mt-1">{{ $employee->address }}</div>
                                </div>
                                <div class="d-flex mb-2">
                                    <span class="ri-mail-line icons"></span>
                                    <div class="h6 mb-0 ms-3 mt-1">{{ $employee->email }}</div>
                                </div>
                                <div class="d-flex">
                                    <span class="ri-phone-line icons"></span>
                                    <div class="h6 mb-0 ms-3 mt-1">{{ $employee->phone }}</div>
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
                            <div class="media col-sm-4 p-0">
                                {{-- <div class="media-icon bg-primary  me-3 mt-1">
                                    <i class="las la-edit fs-20 text-white"></i>
                                </div> --}}
                                <div class="media-body text-center">
                                    <span class="text-bold h3">Salary</span>
                                    <div class="h1 text-danger">
                                        {{ $employee->salary }}
                                    </div>
                                </div>
                            </div>

                            <div class="media col-sm-4 p-0">

                                <div class="media-body text-center">
                                    <span class="text-bold h3"> Due</span>
                                    <div class="h1 text-secondary">
                                       {{$employee->due_salary}}
                                    </div>
                                </div>
                            </div>
                            <div class="media col-sm-4 p-0">
                                {{-- <div class="media-icon bg-orange me-3 mt-1">
                                    <i class="las la-wifi fs-20 text-white"></i>
                                </div> --}}
                                <div class="media-body text-center">
                                    <span class="text-bold h3">Advance</span>
                                    <div class="h1 text-worning ">
                                        {{ $employee->addvance_salary }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-cover">
                <div class="wideget-user-tab">
                    <div class="tab-menu-heading p-0">
                        <div class="tabs-menu1 px-3">
                            <ul class="nav">
                                <li><a href="#tab-7" class="{{ isset($status)?'':'active' }}" data-bs-toggle="tab">Salary List</a></li>
                                <li><a href="#tab-8" data-bs-toggle="tab" class="">Due List</a></li>
                                <li><a href="#tab-9" class="{{ (isset($status) && $status=='Advance')?'active':'' }}" data-bs-toggle="tab" class="">Advance List</a></li>
                                <li><a href="#tab-10" class="{{ (isset($status) && $status=='Due')?'active':'' }}" data-bs-toggle="tab" class="">Due Payment</a></li>
                                <li><a href="#tab-11" data-bs-toggle="tab" class="">Adjust Advance</a></li>
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
                        <div class="tab-pane {{ isset($status)?'':'active' }}" id="tab-7">
                            <div class="">
                                <div class="">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">employee Sale List</h3>
                                        </div>

                                        <div class="card-body">
                                            <div class="table-responsive">

                                                <table  width="100%" class="employeeList display table-striped table-responsive text-center">
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
                        <div class="tab-pane" id="tab-8">
                            <div class="">
                                <div class="">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Employee Due List</h3>
                                        </div>

                                        <div class="card-body">
                                            <div class="table-responsive">

                                                <table  width="100%" class="employeeList display table-striped table-responsive text-center">
                                                    <thead class="bg-primary">
                                                        <tr role="row">
                                                            <th class="text-center text-white">SL.</th>
                                                            <th class="text-center text-white">Name</th>
                                                            <th class="text-center text-white">Payment</th>
                                                            <th class="text-center text-white">Comment</th>
                                                            <th class="text-center text-white">Create Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($dueList as $key => $item)
                                                            @php
                                                                $create = \Carbon\Carbon::parse($item->created_at)->format('d-m-Y');

                                                            @endphp
                                                            <tr>
                                                                <td>{{ ++$key }}</td>
                                                                <td>{{ $employee->name }}</td>
                                                                <td>{{ $item->payment }}</td>
                                                                <td>{{ $item->comment }}</td>

                                                                <td>{{ $create }} </td>



                                                            </tr>
                                                        @empty
                                                            <tr>
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
                        <div class="tab-pane {{ (isset($status) && $status=='Advance')?'active':'' }}" id="tab-9">
                            <div class="">
                                <div class="">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Employee Advance List</h3>
                                        </div>

                                        <div class="card-body">
                                            <div class="table-responsive">

                                                <table  width="100%" class="employeeList display table-striped table-responsive text-center">
                                                    <thead class="bg-primary">
                                                        <tr role="row">
                                                            <th class="text-center text-white">SL.</th>
                                                            <th class="text-center text-white">Name</th>
                                                            <th class="text-center text-white">Payment</th>
                                                            <th class="text-center text-white">Comment</th>
                                                            <th class="text-center text-white">Create Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($advanceList as $key => $item)
                                                            @php
                                                                $create = \Carbon\Carbon::parse($item->created_at)->format('d-m-Y');

                                                            @endphp
                                                            <tr>
                                                                <td>{{ ++$key }}</td>
                                                                <td>{{ $employee->name }}</td>
                                                                <td>{{ $item->payment }}</td>
                                                                <td>{{ $item->comment }}</td>

                                                                <td>{{ $create }} </td>



                                                            </tr>
                                                        @empty
                                                            <tr>
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
                        <div class="tab-pane {{ (isset($status) && $status=='Due')?'active':'' }}" id="tab-10">
                            <div class="">
                                <div class="">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Employee Due Payment List</h3>
                                        </div>

                                        <div class="card-body">
                                            <div class="table-responsive">

                                                <table  width="100%" class="employeeList display table-striped table-responsive text-center">
                                                    <thead class="bg-primary">
                                                        <tr role="row">
                                                            <th class="text-center text-white">SL.</th>
                                                            <th class="text-center text-white">Name</th>
                                                            <th class="text-center text-white">Payment</th>
                                                            <th class="text-center text-white">Comment</th>
                                                            <th class="text-center text-white">Create Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($duePayment as $key => $item)
                                                            @php
                                                                $create = \Carbon\Carbon::parse($item->created_at)->format('d-m-Y');

                                                            @endphp
                                                            <tr>
                                                                <td>{{ ++$key }}</td>
                                                                <td>{{ $employee->name }}</td>
                                                                <td>{{ $item->payment }}</td>
                                                                <td>{{ $item->comment }}</td>

                                                                <td>{{ $create }} </td>



                                                            </tr>
                                                        @empty
                                                            <tr>
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
                        <div class="tab-pane" id="tab-11">
                            <div class="">
                                <div class="">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Employee Adjust Advance List</h3>
                                        </div>

                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table  width="100%" class="employeeList display table-striped table-responsive text-center">
                                                    <thead class="bg-primary">
                                                        <tr role="row">
                                                            <th class="text-center text-white">SL.</th>
                                                            <th class="text-center text-white">Name</th>
                                                            <th class="text-center text-white">Payment</th>
                                                            <th class="text-center text-white">Comment</th>
                                                            <th class="text-center text-white">Create Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($advancePayment as $key => $item)
                                                            @php
                                                                $create = \Carbon\Carbon::parse($item->created_at)->format('d-m-Y');

                                                            @endphp
                                                            <tr>
                                                                <td>{{ ++$key }}</td>
                                                                <td>{{ $employee->name }}</td>
                                                                <td>{{ $item->payment }}</td>
                                                                <td>{{ $item->comment }}</td>

                                                                <td>{{ $create }} </td>



                                                            </tr>
                                                        @empty
                                                            <tr>
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
    $(".employeeList").DataTable()
</script>
@endpush
