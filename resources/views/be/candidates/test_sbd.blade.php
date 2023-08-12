<html>

<style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #c7c4c4;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>

<body>
    <table id="customers">
        <thead>
            <tr>
                <th>tt</th>
                <th>address_code_1</th>
                <th>room_1</th>
                <th>stt</th>
                <th>sbd</th>
                <th>room</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1;
            @endphp
            @foreach($students_by_school as $student)
            @php
            $students = DB::table('final_list')->where('address_code', $student->address_code)->get();

            $sbd = 1;
            $r = 1;
            $lv = 1;
            $check =1;
            @endphp
            @foreach ($students as $item)
            @php

            $count = $students->where('level', $lv)->count();
            
            @endphp
            <tr>
                <td>{{$i++}} {{($check++)}}</td>
                <td>{{$address = str_pad($student->address_code, 2, '0', STR_PAD_LEFT)}}</td>
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
                <td>{{$room}}</td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
</body>

</html>