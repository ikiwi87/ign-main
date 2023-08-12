@extends('be.layouts.index')
@section('title')
Danh sách Thí sinh

@endsection
@section('content')

<!-- START PAGE CONTENT-->
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">List Candidate</div>
        </div>
        <div class="ibox-body" style="overflow-x:auto;">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Fullname</th>
                        <th>Done</th>
                        <th>Email</th>
                        <th>Code</th>
                        <th>Dob</th>
                        <th>Gender</th>
                        <th>Class</th>
                        <th>School</th>
                        <th>Parent name</th>
                        <th>Parent phone</th>
                        <th>Combo</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Fullname</th>
                        <th>Done</th>
                        <th>Email</th>
                        <th>Code</th>
                        <th>Dob</th>
                        <th>Gender</th>
                        <th>Class</th>
                        <th>School</th>
                        <th>Parent name</th>
                        <th>Parent phone</th>
                        <th>Combo</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->first_name}}</td>
                        <td>{{$student->last_name}} {{$student->first_name}}</td>
                        <td>
                            @if ($student->done == 1)
                                Done
                            @else
                                Undone
                            @endif
                        </td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->code}}</td>
                        <td>{{$student->dob}}</td>
                        <td>{{$student->gender}}</td>
                        <td>{{$student->class}}</td>
                        <td>
                            @if ($student->school == null)
                            Null
                            @else
                            {{$student->school->name}}
                            @endif
                        </td>
                        <td>{{$student->parent_name}}</td>
                        <td>{{$student->parent_phone}}</td>
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