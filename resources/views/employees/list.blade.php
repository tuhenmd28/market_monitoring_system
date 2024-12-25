@extends('layouts.skeleton')
@section('title', 'Employee List')

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
                    <div class="page-title">Employee List</div>
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
                                                <table class="table table-bordered text-nowrap border-bottom"
                                                    style="width:100%" id="responsive-datatable">
                                                    <thead class="bg-primary">
                                                        <tr role="row">
                                                            <th class="text-center text-white">SL.</th>
                                                            <th class="text-center text-white">Name</th>
                                                            <th class="text-center text-white">Phone</th>
                                                            <th class="text-center text-white">Email</th>
                                                            <th class="text-center text-white">Address</th>
                                                            <th class="text-center text-white">Salary</th>
                                                            <th class="text-center text-white">Join Date</th>
                                                            <th class="text-center text-white">Due</th>
                                                            <th class="text-center text-white">Advance</th>

                                                            <th class="text-center text-white">Profile</th>
                                                            <th class="text-center text-white">Status</th>

                                                            {{-- <th class="text-center text-white">Create Date</th> --}}

                                                            <th class="text-center text-white">
                                                                Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($employe as $key => $item)
                                                            @php
                                                                $create = \Carbon\Carbon::parse(
                                                                    $item->joining_date,
                                                                )->format('d-m-Y');

                                                            @endphp
                                                            <tr>
                                                                <td class="text-center">{{ ++$key }}</td>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->phone }}</td>
                                                                <td>{{ $item->email }}</td>
                                                                <td>{{ $item->address }}</td>
                                                                <td>{{ $item->salary }}</td>
                                                                <td>{{ $create }} </td>
                                                                <td>{{ $item->due_salary }}</td>
                                                                <td>{{ $item->addvance_salary }}</td>
                                                                <td><img width="150"
                                                                        src="{{ asset('uploads/employe/' . $item->image) }}"
                                                                        alt="logo"> </td>
                                                                <td>
                                                                    <span
                                                                        class="badge badge-{{ $item->status == 1 ? 'success' :($item->status == 2?'primary':'danger') }}-light">{{ $item->status == 1 ? 'Production' :($item->status == 2?'Others':'Inactive') }}</span>
                                                                </td>



                                                                <td>


                                                                    <div class="btn-group" role="group"
                                                                        aria-label="Basic mixed styles example">
                                                                        <a href="{{ route('admin.employe.edit', $item->id) }}"
                                                                            class="btn btn-warning btn-sm">
                                                                            <i class="fa fa-edit" data-bs-toggle="tooltip"
                                                                                title="" data-bs-original-title="Edit"
                                                                                aria-label="Edit"></i>
                                                                        </a>
                                                                        {{-- <a class=" modal-effect btn btn-primary btn-sm"
                                                                            onclick="formDateSalary('{{ $item->id }}','{{ $item->name }}',1,'{{ route('admin.employe.employe_salary', $item->id) }}','{{ $item->salary }}','{{ $item->addvance_salary }}')"
                                                                            data-effect="effect-slide-in-right"
                                                                            data-bs-toggle="modal" href="#modaldemo7">
                                                                            <i class="fa fa-plus" data-bs-toggle="tooltip"
                                                                                title=""
                                                                                data-bs-original-title="Pay Due Salary"
                                                                                aria-label="Pay Due Salary"></i>
                                                                        </a> --}}
                                                                        <a class=" modal-effect btn btn-primary btn-sm"
                                                                             onclick="formDate('{{ $item->id }}','{{ $item->name }}',3,'{{ route('admin.employe.addvance_salary', $item->id) }}','{{ $item->due_salary }}')"
                                                                            data-effect="effect-slide-in-right"
                                                                            data-bs-toggle="modal" href="#modaldemo8">
                                                                            <i class="fa fa-plus" data-bs-toggle="tooltip"
                                                                                title=""
                                                                                data-bs-original-title="Pay Due Salary"
                                                                                aria-label="Pay Due Salary"></i>
                                                                        </a>
                                                                        <a class="modal-effect btn btn-secondary btn-sm"
                                                                            onclick="formDate('{{ $item->id }}','{{ $item->name }}',2,'{{ route('admin.employe.addvance_salary', $item->id) }}')"
                                                                            data-effect="effect-slide-in-right"
                                                                            data-bs-toggle="modal" href="#modaldemo8">
                                                                            <i class="fa fa-plus" data-bs-toggle="tooltip"
                                                                                title=""
                                                                                data-bs-original-title="Pay Advance Salary"
                                                                                aria-label="Pay Advance Salary"></i>
                                                                        </a>
                                                                        {{-- <a href="{{ route('admin.employeSalaryList', $item->id) }}"
                                                                            class="btn btn-success btn-sm">
                                                                            <i class="fa fa-eye" data-bs-toggle="tooltip"
                                                                                title=""
                                                                                data-bs-original-title="Salary List"
                                                                                aria-label="Salary List"></i>
                                                                        </a> --}}
                                                                        <a href="{{ route('admin.employe.show', $item->id) }}"
                                                                            class="btn btn-success btn-sm">
                                                                            <i class="fa fa-eye" data-bs-toggle="tooltip"
                                                                                title=""
                                                                                data-bs-original-title="Salary List"
                                                                                aria-label="Salary List"></i>
                                                                        </a>

                                                                        <button type="button" class="btn btn-danger btn-sm"
                                                                            onclick="deleteItem('{{ $item->id }}','employe')">
                                                                            <i class="ti-trash" data-bs-toggle="tooltip"
                                                                                title=""
                                                                                data-bs-original-title="Delete"
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
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content modal-content-demo">
                <form action="" method="post" id="form" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h6 class="modal-title">Due Salary Payment</h6><button type="button" aria-label="Close" class="btn-close"
                            data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="employe_id" id="employe_id">
                        <input type="hidden" name="status" id="status">

                        <div class="form-group">
                            <label class="form-label text-start">Employe Name <span class="text-red">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Employe Name"
                                id="name" required value="">

                        </div>
                        <div class="form-group">
                            <label class="form-label text-start">Payment Amount <span class="text-red">*</span></label>
                            <input type="text" class="form-control" name="amount" placeholder="Enter Payment Amount"
                                id="amount" required value="">

                        </div>
                        <div class="form-group">
                            <label class="form-label text-start">Payment Note <span class="text-red">*</span></label>
                            <input type="text" class="form-control" name="comment" placeholder="Enter Payment Note"
                                id="comment" required value="">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modaldemo7" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content modal-content-demo">
                <form action="" method="post" id="form" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h6 class="modal-title">Due Salary Payment</h6><button type="button" aria-label="Close" class="btn-close"
                            data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="employe_id" id="employe_id">
                        <input type="hidden" name="status" id="status">

                        <div class="form-group">
                            <label class="form-label text-start">Employe Name <span class="text-red">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Employe Name"
                                id="name" required value="">

                        </div>
                        <div class="form-group">
                            <label class="form-label text-start">Employe Salary <span class="text-red">*</span></label>
                            <input type="number" class="form-control" name="salary" placeholder="Enter Employe Salary"
                                id="salary" readonly required value="">

                        </div>
                        <div class="form-group">
                            <label class="form-label text-start">Employe Advance Salary <span class="text-red">*</span></label>
                            <input type="number" readonly class="form-control" name="addvance_salary" placeholder="Enter Employe Advance Salary"
                                id="addvance_salary" required value="">

                        </div>
                        <div class="form-group">
                            <label class="form-label text-start">Deduct from advance salary <span class="text-red">*</span></label>
                            <input type="checkbox" class="" name="deduct"
                                id="" >

                        </div>
                        <div class="form-group">
                            <label class="form-label text-start">Employe Daily Salary <span class="text-red">*</span></label>
                            <input type="number" readonly max="31" any class="form-control" name="daily_salary" placeholder="Enter Employe Daily Salary"
                                id="daily_salary" required value="">
                        </div>
                        <div class="form-group">
                            <label class="form-label text-start">Employe Total Working Days <span class="text-red">*</span></label>
                            <input type="number" onkeyup="calculateSalary(this)" any class="form-control" name="work_day" placeholder="Enter Employe Total working Days"
                                id="working_days" required value="">
                        </div>
                        <div class="form-group">
                            <label class="form-label text-start">Payment Amount <span class="text-red">*</span></label>
                            <input type="text" class="form-control" name="amount" placeholder="Enter Payment Amount"
                                id="amount" required value="">

                        </div>
                        <div class="form-group">
                            <label class="form-label text-start">Payment Note <span class="text-red">*</span></label>
                            <input type="text" class="form-control" name="comment" placeholder="Enter Payment Note"
                                id="comment" required value="">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
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
        function formDate(id, name, status, route,due=0) {
            if (status == 2) {
                $("#modaldemo8 .modal-title").html('Advance Salary Payment');
            } else {
                $("#modaldemo8 .modal-title").html('Due Salary Payment');
            }
            $('#modaldemo8 #form').attr('action', route);
            $('#modaldemo8 #employe_id').val(id);
            $('#modaldemo8 #name').val(name);
            $('#modaldemo8 #name').attr('readonly',true)
            if(status != 2){
                $('#modaldemo8 #amount').val(due);
                $('#modaldemo8 #amount').attr('readonly',true);
            }else{
                $('#modaldemo8 #amount').attr('readonly',false);
                $('#modaldemo8 #amount').val('');
            }
            $('#modaldemo8 #status').val(status);
        }
        function formDateSalary(id, name, status, route,salary,addvance_salary) {
            $("#modaldemo7 .modal-title").html('Advance Salary Payment');
            $('#modaldemo7 #form').attr('action', route);
            $('#modaldemo7 #employe_id').val(id);
            $('#modaldemo7 #salary').val(salary);
            $('#modaldemo7 #daily_salary').val((salary/30).toFixed(2));
            $('#modaldemo7 #name').val(name);
            $('#modaldemo7 #status').val(status);
            $('#modaldemo7 #addvance_salary').val(addvance_salary);
        }
        function calculateSalary(e){
            let day = $(e).val();
            let salary = $('#modaldemo7 #salary').val();
            let daily_salary = $('#modaldemo7 #daily_salary').val();
            $('#modaldemo7 #amount').val(Math.ceil(daily_salary*day));

        }
    </script>
@endpush
