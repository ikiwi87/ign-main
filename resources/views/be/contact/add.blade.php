@extends('be.layouts.index')
@section('title')
Add new service
@endsection
@section('content')
@include('msg')
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Add new service</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <form action="{{route('store_contact')}}" method="post" enctype="multipart/form-data" class="form-horizontal"
                id="form-sample-1" novalidate="novalidate">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="name" type="text" placeholder="Title">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">email</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="email" type="text" placeholder="Description">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">message</label>

                    <div class="col-sm-10">
                        <textarea id="content" rows="2" value="" name="message">message</textarea>
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