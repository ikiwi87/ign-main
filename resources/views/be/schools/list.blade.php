@extends('be.layouts.index')
@section('title')
Danh sách trường
@endsection
@section('content')
@include('msg')
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Danh sách trường</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="control-label">Tỉnh/thành - ĐC Trường</label>
                    <select class="form-control" name="school_province" id="province">
                        <option selected="" hidden disabled="">-Tỉnh thành-</option>
                        @foreach($provinces as $province)
                        <option value="{{$province->provinceid}}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label">Quận/huyện - ĐC Trường</label>
                    <select name="school_district" class="form-control" id="district">
                        <option value="" selected="" hidden disabled="">-Quận Huyện-</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="control-label">Trường</label>
                    <select name="school_id" class="form-control" id="school" required>
                        <option value="" selected="" hidden disabled="">-Trường-</option>
                    </select>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>


<script>
    $("#province").change(function(){
if($(this).val() !== 0){
    $.ajax({
    url: 'http://'+window.location.host+'/getdistrict',
    type:'get',
    data:{
        'province_id':$(this).val()
    },
    success: function(data){
        var select = $("#district");
        select.empty();
        console.log(data.districts);
        if(data.state){
        var districts = data.districts;
            $("<option>").val(0).text('chọn quận/huyện').appendTo(select).attr("disabled", true).attr("hidden", true);
        $.each(districts, function(i, district){
            $("<option>").val(district.districtid).text(district.name+-+district.districtid).appendTo(select);
        });
        }
    }

    });
}
});
$("#district").change(function(){
if($(this).val() !== 0){
    $.ajax({
    url: 'http://'+window.location.host+'/getschool',
    type:'get',
    data:{
        'district_id':$(this).val()
    },
    success: function(data){
        var select = $("#school");
        select.empty();
        console.log(data.schools);
        if(data.state){
        var schools = data.schools;
            $("<option>").val(0).text('chọn trường').appendTo(select).attr("disabled", true).attr("hidden", true);
        $.each(schools, function(i, school){
            $("<option>").val(school.id).text(school.name + - + school.id).appendTo(select);
        });
        }
    }

    });
}
});
</script>
@endsection