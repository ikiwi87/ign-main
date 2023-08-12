@extends('be.layouts.index')
@section('title')
Dự Trải Nghiệm
@endsection
@section('content')

<!-- START PAGE CONTENT-->
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Danh sách</div>
            <div>
                <a href="{{route('dutrainghiem_admin_create')}}" class="btn btn-primary">Create New</a>
            </div>
        </div>
        <div class="ibox-body" style="overflow-x:auto;">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Code</th>
                        <th>Fullname</th>
                        <th>Day</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>dob</th>
                        <th>Parent Name</th>
                        <th>Parent Phone</th>
                        <th>Ngày dự trải nghiệm</th>
                        <th>Địa điểm tham gia</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
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
   $(document).ready(function () {
        $('#example-table').DataTable({
            "order": [[0, "desc"]],
            "processing": true,
            "serverSide": true,
            "ajax":{
                        "url": "{{ route('dutrainghiem_json_list') }}",
                        "dataType": "json",
                        "type": "POST",
                        "data":{ _token: "{{csrf_token()}}"}
                    },
            "columns": [
                { "data": "id" },
                { "data": "code" },
                { "data": "fullname" },
                { "data": "day" },
                { "data": "month" },
                { "data": "year" },
                { "data": "dob" },
                { "data": "parent_name" },
                { "data": "parent_phone" },
                { "data": "ngaydu_trainghiem" },
                { "data": "diadiem_thamgia" },
                { "data": "options" }
            ]
        });
    });
</script>
@endsection
