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
            <form action="{{route('news_update', $news->id)}}" method="post" enctype="multipart/form-data"
                class="form-horizontal" id="form-sample-1" novalidate="novalidate">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="title" type="text" placeholder="Title"
                            value="{{$news->title}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="description" type="text" value="{!!$news->description!!}" placeholder="Description">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Content</label>
                    <div class="col-sm-10">
                        <textarea id="content" rows="2" value="" name="content">{!!$news->content!!}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Link video</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="link" type="text" value="{{$news->link}}" placeholder="link">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="image" type="file">
                    </div>
                    <div class="col-sm-4">
                        <img width="100%" src="upload/news/{{$news->image}}" alt="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Highlight</label>
                    <div class="col-sm-10">
                        <input name="highlight" value="1" type="checkbox" @if ($news->highlight ==1)
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
    CKEDITOR.replace('content', {
    extraPlugins: 'easyimage',
    extraPlugins: 'videoembed',
    cloudServices_tokenUrl: 'https://75250.cke-cs.com/token/dev/9cbdb94bc99cca85d149260b0869f12d521638ffbe6af9798ca7c54bec4a',
    cloudServices_uploadUrl: 'https://75250.cke-cs.com/easyimage/upload/'
})
</script>
<script>
    CKEDITOR.replace('des')
</script>
@endsection