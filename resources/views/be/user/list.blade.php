@extends('be.layouts.index')
@section('title')
List Users
@endsection
@section('content')
<!-- START PAGE CONTENT-->
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">List Users</div>
        </div>
        <div class="ibox-body" style="overflow-x:auto;">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>image</th>
                        <th>FullName</th>
                        <th>Email</th>
                        <th>Phân quyền</th>
                        <th>Action</th>
                    </tr>
                </thead>
                {{-- <tfoot>
                    <tr>
                        <th>id</th>
                        <th>image</th>
                        <th>FullName</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </tfoot> --}}
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><img width="50px" src="upload/users/{{$user->image}}" alt=""></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if ($user->role_id == 1)
                                <p>Admin</p>
                            @elseif ($user->role_id == 2)
                                <p>Tuyển sinh</p>
                            @else
                                <p>Kế toán</p>
                            @endif
                        </td>
                        <td class="center"> <a class="btn btn-success"
                                href="{{route('user_edit', $user->id)}}"><i class="fa fa-pencil fa-fw"></i> Edit</a>
                            <a class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                href="{{route('user_destroy', $user->id)}}"><i class="fa fa-trash"></i> Delete</a>
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
