<style>
    table {
        font-size: 9px;
    }
    .salaryTable{
        margin-top: 30px;
    }
    .salaryTable tr th {
        background-color: #00873a;
        color: white;
    }

    .salaryTable tr th,
    .salaryTable tr td {
        border: 1px solid #00873ab7;
        font-family: futura;
        text-align: center;
        padding: 3px 0;
    }

    .salaryTable tr th {}

    .salaryTable tr td {}
</style>
@include('allreport.header')
<table class="salaryTable" style="width:100%">
    <thead>
        <tr>

            <th> SL.</th>
            <th>Name</th>
            <th>Salary</th>
            <th>Daily</th>
            <th>Work Day</th>

            <th>Basic Salary</th>

            <th>OverTime(H) </th>
            <th>Per Hour</th>
            <th>OverTime </th>
            <th> Bonus </th>
            <th> Due </th>
            <th> Advance</th>
            <th> Total Salary</th>
            <th> Paid Salary </th>
            <th> Due Salary </th>
            <th> Production </th>
            <th> Status </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($salary as $key => $item)
            <tr>
                @php
                    $report = TotalAmount($item->employee_id,$item->created_at);
                @endphp
                <td> {{ ++$key }}</td>
                <td>{{ $item->employe->name }}</td>
                <td>{{ $item->salary }} </td>
                <td> {{ $item->daily_salary }}</td>
                <td> {{ $item->work_days }}</td>
                <td> {{ $item->base_salary }} </td>
                <td> {{ $item->overtime_hour }}</td>
                <td> {{ $item->per_hour }}</td>
                <td> {{ $item->overtime_salary }} </td>
                <td>{{ $item->bonuse }} </td>
                <td> {{ $item->due }} </td>
                <td> {{ $item->advance }} </td>
                <td> {{ $item->total }} </td>
                <td> {{ $item->paid }} </td>
                <td> {{ $item->due_salary }} </td>
                <td>
                    {{$report}}
                </td>
                <td>
                    @php
                        $status =  $report - $item->total;
                    @endphp
                    <span style="color:{{ $status>=0?'#00873a':'red' }}">
                        {{ $status }}
                    </span>
                </td>



            </tr>
        @empty
        @endforelse


    </tbody>
</table>
@include('allreport.footer')
