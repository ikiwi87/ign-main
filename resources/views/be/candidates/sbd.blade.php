<html>


<body>
    <table>
        <thead>
            <tr>
                <th>stt</th>
                <th>checker</th>
                <th>count</th>
                <th>address_code_1</th>
                <th>room_1</th>
                <th>stt2</th>
                <th>sbd</th>
                <th>first_name</th>
                <th>name</th>
                <th>day</th>
                <th>month</th>
                <th>year</th>
                <th>gender</th>
                <th>grade</th>
                <th>class</th>
                <th>level</th>
                <th>room</th>
                <th>school</th>
                <th>address_code</th>
                <th>school_id</th>
                <th>location_name</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1;
            @endphp
            @php
            $students = DB::table('final_list')->where('location_code', $id)
            ->orderBy('level', 'asc')->orderBy('name', 'asc')->get();
            // dd($students);
            $sbd = 1;
            $r = 1;
            $lv = 1;
            $check =1;
            $count = $students->where('level', $lv)->count();
            @endphp
            @foreach ($students as $item)
            @php
            if ($count == 0) {
                $lv++;
                
            $count = $students->where('level', $lv)->count();
            }
            if ($count == 0) {
                $lv++;
                
            $count = $students->where('level', $lv)->count();
            } else {
            $count = $students->where('level', $lv)->count();
            }
            
            
            
            @endphp
            <tr>
                <td>{{$i++}}</td>
                <td>{{($check++)}}</td>
                <td>{{($count)}}</td>
                <td>{{$address = str_pad($id, 2, '0', STR_PAD_LEFT)}}</td>
                <td>
                    {{$room = str_pad($r, 2, '0', STR_PAD_LEFT)}}
                    @php
                    if ($sbd >=30 || $check > $count) {
                    $r++;
                    }
                    @endphp
                </td>
                <td>
                    {{$stt = str_pad($sbd++, 2, '0', STR_PAD_LEFT)}}
                    @php
                    if ($sbd > 30 || $check > $count) {
                    $sbd = 1;
                    }
                    if ($check > $count) {
                    $lv++;
                    $check =1;
                    }
                    @endphp
                </td>
                <td>
                    {{$address}}{{$room}}{{$stt}}
                </td>
                <td>{{$item->full_name}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->day}}</td>
                <td>{{$item->month}}</td>
                <td>{{$item->year}}</td>
                <td>{{$item->gender}}</td>
                <td>{{$item->grade}}</td>
                <td>{{$item->class}}</td>
                <td>{{$item->level}}</td>
                <td>{{$room}}</td>
                <td>{{$item->school_name}}</td>
                <td>{{$item->location_code}}</td>
                <td>{{$item->school_id}}</td>
                <td>{{$item->location_name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>