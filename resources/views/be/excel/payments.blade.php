<table>
    <thead>
    <tr>
        <th>sbd</th>
        <th>amount</th>
        <th>reference</th>
        <th>payment</th>
        <th>number</th>
    </tr>
    </thead>
    <tbody>
    @foreach($payments as $payment)
        <tr>
        <td>{{$payment->payments_id}}</td>
        <td>{{$payment->amount}}</td>
        <td>{{$payment->reference}}</td>
        <td>1</td>
        <td>{{$payment->number}}</td>
        </tr>
    @endforeach
    </tbody>
</table>