
    <table>
        <thead>
            <tr>
                <th>stt</th>
                <th>check</th>
                <th>count</th>
                <th>address_code_1</th>
                <th>room</th>
                <th>stt</th>
                <th>sbd</th>
                <th>code_tuan</th>
                <th>level</th>
                <th>location_name</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1;
            @endphp
            @foreach($students_by_school as $student)
            @php
            $students = DB::table('list_24')->where('location_code', $student->location_code)
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

            }
            $count = $students->where('level', $lv)->count();
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
                <td>{{$address = str_pad($student->location_code, 2, '0', STR_PAD_LEFT)}}</td>
                <td>
                    {{$room = str_pad($r, 2, '0', STR_PAD_LEFT)}}
                    @php
                    if ($sbd >=24 || $check > $count) {
                    $r++;
                    }
                    @endphp
                </td>
                <td>
                    {{$stt = str_pad($sbd++, 2, '0', STR_PAD_LEFT)}}
                    @php
                    if ($sbd > 24 || $check > $count) {
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
                <td>{{$item->code}}</td>
                <td>{{$item->level}}</td>
                <td>{{$item->location_code}}</td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>