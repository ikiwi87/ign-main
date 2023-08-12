<table>
    <thead>
        <tr>
            <th>id</th>
            <th>sbd</th>
            <th>payment</th>
            <th>fullname</th>
            <th>email</th>
            <th>gender</th>
            <th>dob</th>
            <th>d</th>
            <th>m</th>
            <th>y</th>
            <th>grade</th>
            <th>class</th>
            <th>level</th>
            {{-- <th>school</th>
        <th>District</th>
        <th>Province</th> --}}
            <th>Dad name</th>
            <th>dad phone</th>
            <th>dad mom</th>
            <th>Mom name</th>
            <th>Mom phone</th>
            <th>Mom mom</th>
            <th>amount</th>
            <th>date reg</th>
            {{-- <th>Phone</th>
        <th>address</th>
        <th>logistic</th>
        <th>payment_code</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach($contestants as $cont)
        {{-- @if ($cont->payment == 1) --}}

        <tr>
            <td>{{ $cont->id }}</td>
            <td>{{ $cont->sbd }}</td>
            <td>
                @if ($cont->payment == 0)
                chưa thanh toán
                @else
                đã thanh toán
                @endif
            </td>
            <td>{{ $cont->fullname }}</td>
            <td>{{ $cont->email }}</td>
            <td>{{ $cont->gender }}</td>
            <td>{{ $cont->dob }}</td>
            <td>{{ substr($cont->dob, -2, 0) }}</td>
            <td>{{ substr($cont->dob, 6, 8) }}</td>
            <td>{{ substr($cont->dob, 0, 4) }}</td>
            <td>{{ $cont->grade }}</td>
            <td>{{ $cont->class }}</td>
            <td>{{ $cont->level }}</td>
            {{-- <td>{{ $cont->school->name }}</td>
            <td>{{ $cont->school->districts->name }}</td>
            <td>{{ $cont->school->districts->provinces->name }}</td> --}}
            <td>{{ $cont->dad_name }}</td>
            <td>{{ $cont->dad_phone }}</td>
            <td>{{ $cont->dad_email }}</td>
            <td>{{ $cont->mom_name }}</td>
            <td>{{ $cont->mom_phone }}</td>
            <td>{{ $cont->mom_email }}</td>
            <td>{{ $cont->amount }}</td>
            <td>{{ $cont->day_reg }}</td>
            {{-- <td>{{ $cont->parentname }}</td>
            <td>{{ $cont->phone }}</td>
            <td>{{ $cont->address }}</td>
            <td>{{ $cont->logistic }}</td> --}}
        </tr>
        {{-- @endif --}}
        @endforeach
    </tbody>
</table>