@extends('be.layouts.index')
@section('title')
Danh sách Thí sinh đã thanh toán và chưa gửi mail

@endsection
@section('content')

<!-- START PAGE CONTENT-->
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Paid - ({{$students->count()}}) <br>
                <a class="btn btn-success"
                href="{{route('mail_payment_list')}}"><i class="fa fa-envelope fa-fw"></i>
                Send Email confirm</a>
            </div>
        </div>
        <div class="ibox-body" style="overflow-x:auto;">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Code</th>
                        <th>Dob</th>
                        <th>School</th>
                        <th>Combo</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Code</th>
                        <th>Dob</th>
                        <th>School</th>
                        <th>Combo</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->last_name}} {{$student->first_name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->code}}</td>
                        <td>{{$student->dob}}</td>
                        <td>
                            @if ($student->school == null)
                            Null
                            @else
                            {{$student->school->name}}
                            @endif
                        </td>
                        <td>
                            @if ($student->combo == 1)
                            Combo
                            @else
                            Thi
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->
@endsection
@section('script')

<script src="assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function() {
        $('#example-table').DataTable({
            // pageLength: 10,
            "order": [[0, "desc"]]
            //"ajax": './assets/demo/data/table_data.json',
            /*"columns": [
                { "data": "name" },
                { "data": "office" },
                { "data": "extn" },
                { "data": "start_date" },
                { "data": "salary" }
            ]*/
        });
    })
</script>
@endsection