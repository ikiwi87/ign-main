@if(count($errors) > 0)
<div class="alert alert-danger">
    @foreach($errors->all() as $err)
    {{ $err }} <br>
    @endforeach
</div>
@endif

@if(session('msg'))
<div class="alert alert-success">
    {{ session('msg') }}
</div>
@endif
{{-- @if(count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade in">
    @foreach($errors->all() as $err)

    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ $err }} <br>
    @endforeach
</div>
@endif

@if(session('msg'))
<div style="
position: fixed;
    z-index:9999; top: 30%; " class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session('msg') }}
</div>
@endif --}}