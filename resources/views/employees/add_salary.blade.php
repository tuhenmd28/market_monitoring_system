@extends('layouts.skeleton')
@section('title', 'Employee Salary')

@push('styles')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css"> --}}
    <style>
        .table td {
            padding: 1px;
        }

        .table td input,
        select {
            /* border: none; */
        }

        .table td:has(select) {
            width: 150px;
        }

        .category {
            text-align: center;
            font-weight: 500;
        }

        .select2-container--default .select2-selection--single {
            /* border: none !important; */
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
        .table td input[type=number] {
    /* border: none; */
    min-width: 100px;
}
    </style>
@endpush
@section('content')





    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-lg-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">Employee Salary</div>
                </div>

            </div>




            <!-- Row -->
            <div class="row flex-lg-nowrap">
                <form action="{{ route('admin.salary.store') }}" method="post">
                    @csrf
                    <div class="col-12">
                        <div class="row flex-lg-nowrap">
                            <div class="col-12 mb-3">


                                <div class="e-panel card">
                                    <div class="card-body">
                                        {{-- <h2 class="card-title">Add Production</h2> --}}
                                        {{-- <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label">Select Production Date</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <span class="feather feather-calendar"></span>
                                                        </div>
                                                    </div><input class="form-control fc-datepicker1 " name="production_date"
                                                        placeholder="MM/DD/YYYY" type="text" id="production_date">
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="e-table">
                                            <div class="table-lg mt-3" id="tableContainer">


                                                <div class="table-responsive">
                                                    <table class="table table-bordered text-nowrap border-bottom"
                                                        style="width:100%" id="responsive-datatabl">
                                                        <thead class="bg-primary">
                                                            <tr role="row">

                                                                <th width="30" class="text-center text-white">
                                                                    <input type="checkbox" class="select_all">
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
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {{-- {{ dd($employees) }} --}}
                                                            @forelse ($employees as $key => $item)
                                                                <tr>

                                                                    <td class="text-center">
                                                                        <input type="checkbox"
                                                                            onchange="removeRequired(this,{{ $key }})"
                                                                            value="{{ $item->id }}" name="employe_id[]"
                                                                            class="employe_id">
                                                                    </td>
                                                                    <td>{{ $item->name }}</td>
                                                                    <td>{{ $item->salary }} <input required type="hidden" value="{{ $item->salary }}" name="salary[]"> </td>
                                                                    <td class="daily_salary{{ $key }}">
                                                                        <input type="number" required readonly class="form-control"
                                                                            any value="{{ round($item->salary / 30, 2) }}"
                                                                            name="daily_salary[]">
                                                                    </td>
                                                                    <td class="work_days{{ $key }}">
                                                                        <input type="number" required
                                                                            onkeyup="workDays(this,{{ $key }})"
                                                                            class="form-control" value=""
                                                                            name="work_days[]">
                                                                    </td>
                                                                    <td class="basic_salary{{ $key }}">
                                                                        <input type="number" class="form-control" readonly
                                                                            value="" required name="base_salary[]">
                                                                    </td>
                                                                    <td class="overtime_hour{{ $key }}">
                                                                        <input type="number"
                                                                            onkeyup="overTimeHour(this,{{ $key }})"
                                                                            class="form-control" value="" required
                                                                            name="overtime_hour[]">
                                                                    </td>
                                                                    <td class="per_hour{{ $key }}">
                                                                        <input type="number"
                                                                            onkeyup="PerHour(this,{{ $key }})"
                                                                            class="form-control" value="" required
                                                                            name="per_hour[]">
                                                                    </td>
                                                                    <td class="overtime_salary{{ $key }}">
                                                                        <input type="number" class="form-control" readonly
                                                                            value="" required name="overtime_salary[]">
                                                                    </td>
                                                                    <td class="bonuse{{ $key }}">
                                                                        <input type="number"
                                                                            onkeyup="bonuse1(this,{{ $key }})"
                                                                            class="form-control" value=""
                                                                            name="bonuse[]" required>
                                                                    </td>
                                                                    <td class="due{{ $key }}">
                                                                        <input type="number" readonly class="form-control"
                                                                            value="{{ $item->due_salary }}" name="due[]">
                                                                        @if ($item->due_salary > 0)
                                                                            <span class="d-block"> <input type="checkbox"
                                                                                    class="due_status"
                                                                                    onclick="due_status(this,{{ $key }})">
                                                                                <input type="hidden" class="status_value" name="due_status[]"
                                                                                    value="0">
                                                                            </span>
                                                                            @else
                                                                            <span class="d-block">
                                                                            <input type="hidden" class="status_value"
                                                                                name="due_status[]"
                                                                                value="0">
                                                                        </span>
                                                                        @endif
                                                                    </td>
                                                                    <td class="advance{{ $key }}">
                                                                        <input type="number" readonly
                                                                            class="form-control"
                                                                            value="{{ $item->addvance_salary }}"
                                                                            name="advance[]">
                                                                        @if ($item->addvance_salary > 0)
                                                                            <span class="d-block"> <input type="checkbox"
                                                                                    class="advance_status"
                                                                                    onclick="advance_status(this,{{ $key }})">
                                                                                <input type="hidden" class="status_value"
                                                                                    name="advance_status[]"
                                                                                    value="0">
                                                                            </span>
                                                                        @else
                                                                        <span class="d-block">
                                                                        <input type="hidden" class="status_value"
                                                                            name="advance_status[]"
                                                                            value="0">
                                                                    </span>
                                                                        @endif
                                                                    </td>
                                                                    <td class="total{{ $key }}">
                                                                        <input type="number" class="form-control"
                                                                            readonly value="" required name="total[]">
                                                                    </td>
                                                                    <td class="paid{{ $key }}">
                                                                        <input type="number" onkeyup="paid1(this,{{ $key }})" class="form-control"
                                                                            value="" required  name="paid[]">
                                                                    </td>
                                                                    <td class="due_salary{{ $key }}">
                                                                        <input type="number" class="form-control" required readonly
                                                                            value="" name="due_salary[]">
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
                                                                </tr>
                                                            @endforelse


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body text-end"><button class="btn btn-primary">Add Salary</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End Row -->

        </div>



    </div><!-- end app-content-->



    </div>

@endsection

@push('scripts')
    {{-- <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script> --}}
    {{-- <script src="{{ asset('assets/plugins/datatable/buttons.server-side.js') }}"></script> --}}

    <script>
        let daily_salary = '';
        let work_days = '';
        let basic_salary = '';
        let overtime_hour = '';
        let per_hour = '';
        let overtime_salary = '';
        let bonuse = '';
        let total = '';
        let paid = '';
        let due = '';
        let due_salary = '';
        let advance = '';
        let dueCheck = '';
        let advanceCheck = '';
        function totalSalary(){
            let sum = 0;
            sum += Number(basic_salary.val());
            sum += Number(overtime_salary.val());
            sum += Number(bonuse.val());

            if(dueCheck.val() == 1){
                sum += Number(due.val());
            }
            if(advanceCheck.val() == 1){
                sum -= Number(advance.val());
            }
            total.val(sum)
            paid.val(sum)
            due_salary.val(0)
        }
        function selectAllInput(id){
             daily_salary = $(`.daily_salary${id} input`);
             work_days = $(`.work_days${id} input`);
             basic_salary = $(`.basic_salary${id} input`);
             overtime_hour = $(`.overtime_hour${id} input`);
             per_hour = $(`.per_hour${id} input`);
             overtime_salary = $(`.overtime_salary${id} input`);
             bonuse = $(`.bonuse${id} input`);
             total = $(`.total${id} input`);
             paid = $(`.paid${id} input`);
             due = $(`.due${id} > input`);
             due_salary = $(`.due_salary${id} > input`);
             advance = $(`.advance${id} > input`);
             dueCheck = $(`.due${id} > span input.status_value`);
             advanceCheck = $(`.advance${id} > span input.status_value`);
        }

        function paid1(e, id) {
            console.log(Math.ceil(Number(total.val()) - Number(paid.val())));

            due_salary.val(Math.ceil(Number(total.val()) - Number(paid.val())))
        }
        function workDays(e, id) {
            selectAllInput(id)
            if(work_days.val()>30){
                work_days.val(30)
            }
            basic_salary.val(Math.ceil(Number(work_days.val())*Number(daily_salary.val())))
            totalSalary()

        }
        function PerHour(e, id) {
            selectAllInput(id)
            overtime_salary.val(Math.ceil(Number(overtime_hour.val())*Number(per_hour.val())))
            totalSalary()

        }
        function bonuse1(e, id) {
            totalSalary()

        }
        function overTimeHour(e, id) {
            overtime_salary.val(Math.ceil(Number(overtime_hour.val())*Number(per_hour.val())))
            totalSalary()
        }

        function removeRequired(e, id) {

            if (!($(e).is(":checked"))) {
                $(e).parents('tr').remove()

            }
        }

        function select2() {
            $('.select2-show-search').select2({
                minimumResultsForSearch: '',
                placeholder: "Search",
                width: '100%'
            });
        }






        function due_status(e) {
            if ($(e).is(':checked')) {
                $(e).siblings('input').val(1)
            } else {
                $(e).siblings('input').val(0)
            }

            totalSalary()
        }

        function advance_status(e) {
            if ($(e).is(':checked')) {
                $(e).siblings('input').val(1)
            } else {
                $(e).siblings('input').val(0)
            }
            totalSalary()
        }
        $(document).ready(function() {
            $('.select_all').on('click', function() {
                // console.log($(this).is(":checked"));
                if ($(this).is(":checked")) {
                    $('table tr td:first-child input').each(function() {
                        $(this).prop("checked", true);
                    })
                } else {
                    $('table tr td:first-child input').each(function() {
                        $(this).prop("checked", false);
                    })

                }
            })
        })
    </script>
@endpush
