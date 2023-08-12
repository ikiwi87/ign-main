<table>
    <thead>
        <tr>
            <th>id</th>
            <th>sbd</th>
            <th>fullname</th>
            <th>email</th>
            <th>gender</th>
            <th>dob</th>
            <th>day</th>
            <th>month</th>
            <th>year</th>
            <th>grade</th>
            <th>class</th>
            <th>level</th>
            <th>id school</th>
            <th>school</th>
            <th>District</th>
            <th>Province</th>
            <th>Dad name</th>
            <th>dad phone</th>
            <th>dad mom</th>
            <th>Mom name</th>
            <th>Mom phone</th>
            <th>Mom mom</th>
            <th>amount</th>
            <th>date reg</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contestants as $cont)
        <tr>
            <td>{{ $cont->id }}</td>
            <td>{{ $cont->sbd }}</td>
            <td>{{ $cont->fullname }}</td>
            <td>{{ $cont->email }}</td>
            <td>{{ $cont->gender }}</td>
            <td>{{ $cont->dob }}</td>
            <td>{{ $cont->day }}</td>
            <td>{{ $cont->month }}</td>
            <td>{{ $cont->year }}</td>
            <td>{{ $cont->grade }}</td>
            <td>{{ $cont->class }}</td>
            <td>{{ $cont->level }}</td>
            <td>{{ $cont->school_id }}</td>
            <td>{{ $cont->school->name }}</td>
            <td>{{ $cont->school->districts->name }}</td>
            <td>{{ $cont->school->districts->provinces->name }}</td>
            <td>{{ $cont->dad_name }}</td>
            <td>{{ $cont->dad_phone }}</td>
            <td>{{ $cont->dad_email }}</td>
            <td>{{ $cont->mom_name }}</td>
            <td>{{ $cont->mom_phone }}</td>
            <td>{{ $cont->mom_email }}</td>
            <td>{{ $cont->amount }}</td>
            <td>{{ $cont->day_reg }}</td>
        </tr>
        @endforeach
    </tbody>
</table>