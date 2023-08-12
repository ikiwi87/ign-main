@extends('be.layouts.index')
@section('title')
Add project
@endsection
@section('content')
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Add project</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <form action="{{route('project_store')}}" method="post" enctype="multipart/form-data"
                class="form-horizontal" id="form-sample-1" novalidate="novalidate">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="title" type="text" value="SMALL & MINIMAL HOUSE ON PATERS ON HILL" placeholder="Title">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>

                    <div class="col-sm-10">
                        <textarea id="des" rows="5" value="" name="description">BLOGPOST WITH IMAGE SLIDER THERE ARE MANY VARIATIONS OF PASSAGES</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Information</label>

                    <div class="col-sm-10">
                        <textarea id="info" rows="2" value="" name="info">Information</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Client</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="client" type="text" placeholder="client">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Link</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="link" type="text" placeholder="link">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="image" type="file">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">highlight</label>
                    <div class="col-sm-10">
                        <input name="highlight" value="1" type="checkbox">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Project Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" multiple="multiple" name="list_image[]" type="file">
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