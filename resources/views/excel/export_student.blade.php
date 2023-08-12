<style>
    .table-striped>tbody>tr:nth-child(odd)>td,
    .table-striped>tbody>tr:nth-child(odd)>th {
        background-color: #d3e1ff;
    }

    .table-striped>tbody>tr:nth-child(even)>td,
    .table-striped>tbody>tr:nth-child(even)>th {
        background-color: #fff;
    }

    .table-bordered>tbody>tr>td {
        border: 1px solid #0000 !important;
    }
</style>
<table id="customers" class="table table-striped table-bordered">
    <tr></tr>
    <thead>
        <tr style="font-weight:bold; background-color: #d38585;">
            <th>STT</th>
            <th>Mã ĐD</th>
            <th>code</th>
            <th>Họ và tên</th>
            <th>Ngày sinh</th>
            <th>Tháng sinh</th>
            <th>Năm sinh</th>
            <th>Giới tính</th>
            <th>Nơi sinh</th>
            <th>Trường mầm non</th>
            <th>Mã định danh</th>
            <th>Họ và tên phụ huynh</th>
            <th>SĐT</th>
            <th>Cơ sở nhập học</th>
            <th>Chương trình</th>
            <th>Thanh toán</th>
            <th>Created at</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($students as $student)
            <tr>
                <td>
                    {{$i++}}
                </td>
                <td>
                    {{$student->ma_dinh_danh}}
                </td>
                <td>
                    {{$student->code}}
                </td>
                <td>
                    {{$student->fullname}}
                </td>
                <td>
                    {{str_pad($student->day, 2, '0', STR_PAD_LEFT)}}
                </td>
                <td>
                    {{str_pad($student->month, 2, '0', STR_PAD_LEFT)}}
                </td>
                <td>
                    {{$student->year}}
                </td>
                <td>
                    {{$student->gender}}
                </td>
                <td>
                    {{$student->noi_sinh}}
                </td>
                <td>
                    {{$student->schools_mau_giao}}
                </td>
                <td>
                    {{$student->ma_dinh_danh}}
                </td>
                <td>
                    {{$student->parent_name}}
                </td>
                <td>
                    {{$student->parent_phone}}
                </td>
                <td>
                    {{$student->schools_id}}
                </td>
                <td>
                    {{$student->chuong_trinh}}
                </td>
                <td>
                    @if ($student->payment == 0)
                chưa thanh toán
                @else
                đã thanh toán
                @endif
                </td>
                <td>
                    {{$student->created_at}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>