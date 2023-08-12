@extends('be.layouts.index')
@section('title')
Danh sách Trường

@endsection
@section('content')

<!-- START PAGE CONTENT-->
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Schools list</div>
        </div>
        <div class="ibox-body" style="overflow-x:auto;">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                width="100%">
                <thead>
                    <th>Id</th>
                    <th>Code</th>
                    <th>School</th>
                    <th>District</th>
                    <th>Province</th>
                </thead>
            </table>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->
@endsection
@section('script')

<script src="assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function () {
        $('#example-table').DataTable({
            "order": [[0, "desc"]],
            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "{{ route('json_schools') }}",
                     "dataType": "json",
                     "type": "POST",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
            "columns": [
                { "data": "id" },
                { "data": "code" },
                { "data": "name" },
                { "data": "district" },
                { "data": "province" }
                // { "data": "options" }
            ]	 

        });
    });
</script>

@endsection