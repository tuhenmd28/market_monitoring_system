<style>

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

    .salaryTable tr th ,
    .salaryTable tr td {
        padding: 9px 0;
    }
</style>
@include('allreport.header')
@php
    $total = 0;
@endphp
<table class="salaryTable" style="width:100%">
    <thead >
        <tr >
            <th>SL.</th>
            <th>Employe Name</th>
            <th>Sale Product</th>
            <th>Coat Category</th>
            <th>Each Cost</th>
            <th>Quentity</th>
            <th>Total</th>
            <th>Production Date</th>

        </tr>
    </thead>
    <tbody>
        @forelse ($production as $key => $item)
            {{-- @for ($i = 0; $i < 20; $i++) --}}

            <tr>
                @php
                    $total += $item->total_cost;
                    $create = \Carbon\Carbon::parse($item->production_date)->format('d-m-Y');
                @endphp
                <td>{{ ++$key }}</td>
                <td>{{ $item->employe?->name }}</td>
                <td>{{ $item->product?->name }}</td>
                <td>{{ $item->costCategory?->name }}</td>
                <td>{{ $item->each_cost }}</td>
                <td>{{ $item->qty }}</td>
                <td>{{ $item->total_cost }}</td>

                <td>{{ $create }} </td>



            </tr>
            {{-- @endfor --}}
        @empty

        @endforelse


    </tbody>
    <tfoot>
        <tr>
            <td style="text-align:right;font-weight:900;padding-right:20px;" colspan="6" > Total Cost</td>
            <td>{{ takeFormat($total) }}</td>
            <td></td>
        </tr>
    </tfoot>
</table>
@include('allreport.footer')
