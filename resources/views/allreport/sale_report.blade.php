@include('allreport.header',['party'=>$party,'sales'=>true])

<div class="detailContent">

    <div class="designtable"></div>
    <div class="designtable"></div>
    <div class="designtable"></div>
    <div class="designtable">
        <span class="total">Total</span>
    </div>
    <div class="designtable">
        <span class="amount">{{ takeFormat($total) }}</span>
    </div>
    <table width="100%" class="detailsTable">
        <thead>
            <tr>
                <th width="10%">Sl. No.</th>
                <th width="40%">Descriptions</th>
                <th width="15%">Quantity</th>
                <th width="10%">Rate</th>
                <th width="25%">Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $key=>$item)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $item->product?->name  }} ( {{ $item->gsm?->name }},{{ $item->size?->name }},{{ $item->color?->name }})</td>
                <td>{{ $item->qty }}</td>
                <td>{{ $item->product_price }}</td>
                <td>{{ takeFormat($item->total_amount) }}</td>
            </tr>

            @endforeach
        </tbody>
    </table>

</div>
<div class="taka">
    <span>Taka ( In Word )</span>
    <span>{{ takeFormatforHumans($total) }}</span>
</div>
@include('allreport.footer',['salse'=>true])
