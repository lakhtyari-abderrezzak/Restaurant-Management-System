<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Menu</th>
            <th>Table</th>
            <th>Waiter</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Change</th>
            <th>Payment Type</th>
            <th>Payment Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sales as $sale)
            <tr>
                <td>{{$sale->id}}</td>
                <td>
                    @foreach ($sale->menus as $menu)
                        {{$menu->title}}
                    @endforeach
                </td>
                <td>
                    @foreach ($sale->tables as $table)
                        {{$table->name}}
                    @endforeach
                </td>
                <td>{{$sale->servant->name}}</td>
                <td>{{$sale->quantity}}</td>
                <td>{{$sale->total}}</td>
                <td>{{$sale->change}}</td>
                <td>{{$sale->payment_type}}</td>
                <td>{{$sale->payment_status}}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="5">
                Report From {{$startDate}} To {{$endDate}}
            </td>
            <td>
                {{$total}}
            </td>
        </tr>
    </tbody>
</table>