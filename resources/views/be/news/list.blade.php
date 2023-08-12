@extends('be.layouts.index')
@section('title')
Danh sách bài viết
@endsection
@section('content')

<!-- START PAGE CONTENT-->
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Tin tức</div>
        </div>
        <div class="ibox-body" style="overflow-x:auto;">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($news as $new)
                    <tr>
                        <td>{{$new->id}}</td>
                        <td><img width="100px" src="upload/news/{{$new->image}}" alt=""></td>
                        <td>{{substr($new->title,0,100)}}</td>
                        <td>{!!substr($new->description,0,100)!!} ...</td>
                        <td>{!!substr($new->content,0,100)!!} ....</td>
                        <td class="center"> <a class="btn btn-success" href="{{route('news_edit', $new->id)}}"><i
                                    class="fa fa-pencil fa-fw"></i> Edit</a>
                            <a class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                href="{{route('news_destroy', $new->id)}}"><i class="fa fa-trash"></i> Delete</a>
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