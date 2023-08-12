@extends('be.layouts.index')
@section('title')
List Users
@endsection
@section('content')
<!-- START PAGE CONTENT-->
<div>
    <h3 style="text-align: center; padding-bottom:20px">Chào mừng bạn đến với trang quản trị</h3>
    <img  src="{{ url('fe/img/header.png') }}" alt="">
</div>
<!-- END PAGE CONTENT-->
@endsection
@section('script')

<script src="assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function() {
        $('#example-table').DataTable({
            pageLength: 10,
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
