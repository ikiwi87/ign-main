@extends('be.layouts.index')
@section('title')
Edit blog
@endsection
@section('content')
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Edit blog</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <form action="{{route('project_update', $project->id)}}" method="post" enctype="multipart/form-data"
                class="form-horizontal" id="form-sample-1" novalidate="novalidate">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="title" value="{{$project->title}}" type="text" placeholder="Title">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>

                    <div class="col-sm-10">
                        <textarea id="des" rows="5" value="" name="description">{!!$project->title!!}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Information</label>

                    <div class="col-sm-10">
                        <textarea id="info" rows="2" value="" name="info">{!!$project->info!!}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Client</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="client" type="text" value="{{$project->client}}" placeholder="client">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Link</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="link" type="text" value="{{$project->link}}" placeholder="link">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="image" type="file">
                    </div>
                    <div class="col-sm-4">
                        <img width="100%" src="upload/project/{{$project->image}}" alt="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Highlight</label>
                    <div class="col-sm-10">
                        <input name="highlight" value="1" type="checkbox" @if ($project->highlight ==1)
                        checked
                        @endif>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 ml-sm-auto">
                        <button class="btn btn-info" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<hr>
@endsection
@section('script')
<script>
    CKEDITOR.replace('info', {
    extraPlugins: 'easyimage',
    extraPlugins: 'videoembed',
    cloudServices_tokenUrl: 'https://76126.cke-cs.com/token/dev/3b24a03d5f881ff23a6a6a64b88e0ddae155e86b9c5a13f6927077dc1181',
    cloudServices_uploadUrl: 'https://76126.cke-cs.com/easyimage/upload/'
})
</script>
<script>
    CKEDITOR.replace('des')
</script>
@endsection