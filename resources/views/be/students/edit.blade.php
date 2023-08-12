@extends('be.layouts.index')
@section('title')
Edit student
@endsection
@section('content')
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Sửa thông tin đăng ký</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
            </div>
        </div>
        {{-- {{$student->school->name}} --}}
        <div class="ibox-body">
            <form action="{{route('students_update', $student->id)}}" method="post" enctype="multipart/form-data"
                class="form-horizontal" id="form-sample-1" novalidate="novalidate">
                {{ csrf_field() }}
                {{-- <div class="row">
                    <div class="col-sm-6">
                        <div class="radio">
                            <label><input type="radio" name="combo" @if ($student->combo == 0)
                                checked
                            @endif value="0" required> Thi (350.000 vnđ)</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="combo" @if ($student->combo == 1)
                                checked
                            @endif value="1" required> Combo: thi + 12
                                tháng Câu lạc bộ KMC (600.000 vnđ)</label>
                        </div>
                    </div>

                    <label class="control-label">

                    </label>
                </div> --}}
                <h2 class="appointment-title">Thông tin học sinh</h2>
                <div class="row">
                    <div class="form-group col-sm-6 col-xs-12">
                        <label class="control-label">Họ tên học sinh</label>
                        <input type="text" class="form-control" name="fullname" required="true"
                            placeholder="VD: Nguyễn Thị" value="{{$student->fullname}}">
                    </div>

                        <div class="form-group col-sm-6 col-xs-12">
                            <label class="control-label">Số phiếu:</label>
                            <input type="email" class="form-control" disabled required="true"
                                value="{{$student->verify_code}}">
                        </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 form-group">
                        <label class="control-label">Giới tính</label>
                        <select class="form-control" name="gender">
                            <option style="color:#122111;" value="" selected="" hidden disabled="">Giới tính
                            </option>
                            <option @if ($student->gender == 'Nam')
                                selected
                                @endif value="Nam">Nam</option>
                            <option @if ($student->gender == 'Nữ')
                                selected
                                @endif value="Nữ">Nữ</option>
                        </select>
                    </div>
                    <div class="col-sm-2 form-group">
                        <label class="control-label">Dân tộc:</label>
                        <input type="text" class="form-control" name="dan_toc" maxlength="4" required="true"
                            placeholder="VD: Kinh" value="{{$student->dan_toc}}">
                    </div>
                    <div class="col-sm-2 form-group">
                        <label class="control-label">Ngày sinh</label>
                        <input type="text" class="form-control" name="day" maxlength="2" required="true"
                            placeholder="VD: Trâm" value="{{$student->day}}">
                    </div>
                    <div class="col-sm-2 form-group">
                        <label class="control-label">Tháng sinh</label>
                        <input type="text" class="form-control" name="month" maxlength="2" required="true"
                            placeholder="VD: Trâm" value="{{$student->month}}">
                    </div>
                    <div class="col-sm-2 form-group">
                        <label class="control-label">Năm sinh</label>
                        <input type="text" class="form-control" name="year" maxlength="4" required="true"
                            placeholder="VD: Trâm" value="{{$student->year}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="control-label">Nơi sinh:</label>
                        <input type="text" class="form-control" name="noi_sinh" required="true" placeholder="VD: Trâm"
                            value="{{$student->noi_sinh}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Năm học 2022-2023 học ở trường:</label>
                        <input type="text" class="form-control" name="schools_mau_giao" required="true" placeholder="VD: Trâm"
                            value="{{$student->schools_mau_giao}}">
                    </div>
                    {{-- <div class="form-group col-md-6">
                        <label class="control-label">Lớp</label>
                        <input type="text" class="form-control" name="class" required="true"
                            value="{{$student->class}}">
                    </div> --}}
                </div>
                <hr>
                <h3 style="margin-left: 12px">Năm học 2023 - 2024 đăng ký vào lớp 1:</h3>
                <div class="row">
                    <div class="col-sm-3 form-group">
                        <label class="control-label">Đăng ký nhập học tại cơ sở:</label>
                        <select class="form-control" name="schools_id">
                            <option style="color:#122111;" value="" selected="" hidden disabled="">Chọn cơ sở</option>
                            <option @if ($student->schools_id == 'Mỹ Đình')
                                selected
                                @endif value="Mỹ Đình">Mỹ Đình</option>
                            <option @if ($student->schools_id == 'Kiến Hưng')
                                selected
                                @endif value="Kiến Hưng">Kiến Hưng</option>
                            <option @if ($student->schools_id == 'Việt Hưng')
                                selected
                                @endif value="Việt Hưng">Việt Hưng</option>
                            </select>
                    </div>
                    <div class="col-sm-3 form-group">
                        <label class="control-label">Chương trình đăng ký:</label>
                        <select class="form-control" name="chuong_trinh">
                            <option style="color:#122111;" value="" selected="" hidden disabled="">Chương trình</option>
                            <option @if ($student->chuong_trinh == 'Truyền Thống')
                                selected
                                @endif value="Truyền Thống">Truyền Thống</option>
                            <option @if ($student->chuong_trinh == 'Song Ngữ')
                                selected
                                @endif value="Song Ngữ">Song Ngữ</option>
                        </select>
                    </div>
                </div>





                {{-- <div class="row">
                    <div class="form-group col-sm-6">
                        <label class="control-label">Tỉnh/thành - ĐC Trường</label>
                        <input type="text" class="form-control" required="true" @if ($student->school_id != null)
                        value="{{$student->school->district->province->name}}"
                        @else
                        value="NULL"
                        @endif readonly>
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="control-label">Quận/huyện - ĐC Trường</label>

                        <input type="text" class="form-control" required="true" @if ($student->school_id != null)
                        value="{{$student->school->district->name}}"
                        @else
                        value="NULL"
                        @endif readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label class="control-label">Trường</label>
                        <input type="text" class="form-control" required="true" @if ($student->school_id != null)
                        value="{{$student->school->name}}"
                        @else
                        value="NULL"
                        @endif
                        readonly>
                    </div>
                </div> --}}
                <hr>
                <h2 class="appointment-title">Thông tin phụ huynh</h2>
                <div class="row">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col" style="width: 8%;">#</th>
                            <th scope="col" style="text-align: center; width: 10%;">Họ và tên</th>
                            <th scope="col" style="text-align: center; width: 10%;">Năm sinh</th>
                            <th scope="col" style="text-align: center; width: 10%;">Số ĐT</th>
                            <th scope="col" style="text-align: center; width: 10%;">Nghề Nghiệp</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">TT Cha</th>
                            <td><input type="text" class="form-control" name="name_cha" style="width: auto;" required="true"
                                value="{{$student->name_cha}}"></td>
                            <td><input type="text" class="form-control" name="namsinh_cha" style="width: auto;" required="true"
                                value="{{$student->namsinh_cha}}"></td>
                            <td><input type="text" class="form-control" name="phone_cha" style="width: auto;" required="true"
                                value="{{$student->phone_cha}}"></td>
                            <td><input type="text" class="form-control" name="job_cha" style="width: auto;" required="true"
                                value="{{$student->job_cha}}"></td>
                          </tr>
                          <tr>
                            <th scope="row">TT Mẹ</th>
                            <td><input type="text" class="form-control" name="name_me" style="width: auto;" required="true"
                                value="{{$student->name_me}}"></td>
                            <td><input type="text" class="form-control" name="namsinh_me" style="width: auto;" required="true"
                                value="{{$student->namsinh_me}}"></td>
                            <td><input type="text" class="form-control" name="phone_me" style="width: auto;" required="true"
                                value="{{$student->phone_me}}"></td>
                            <td><input type="text" class="form-control" name="job_me" style="width: auto;" required="true"
                                value="{{$student->job_me}}"></td>
                          </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <p>Hộ khẩu thường trú - Nơi đang thường trú</p>
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col" style="width: 8%;">#</th>
                            <th scope="col" style="text-align: center; width: 8%;">Tỉnh/TP:</th>
                            <th scope="col" style="text-align: center; width: 8%;">Huyện/Quận:</th>
                            <th scope="col" style="text-align: center; width: 8%;">Xã/Phường:</th>
                            <th scope="col" style="text-align: center; width: 20%;">Tổ/Số nhà:</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row" style="font-size: 14px;">Hộ khẩu thường trú:</th>

                            <td>
                                <input type="text" class="form-control" name="tinh_hk" required="true" value="{{$student->tinh_hk}}"></td>
                            <td><input type="text" class="form-control" name="quan_hk" required="true"
                                value="{{$student->quan_hk}}"></td>
                            <td><input type="text" class="form-control" name="phuong_xa_hk" required="true"
                                value="{{$student->phuong_xa_hk}}"></td>
                            <td><input type="text" class="form-control" name="dc_hk"  required="true"
                                value="{{$student->dc_hk}}"></td>
                          </tr>
                          <tr>
                            <th scope="row" style="font-size: 14px;">Nơi đang thường trú:</th>
                            <td><input type="text" class="form-control" name="tinh_tt" required="true"
                                value="{{$student->tinh_tt}}"></td>
                            <td><input type="text" class="form-control" name="quan_tt" required="true"
                                value="{{$student->quan_tt}}"></td>
                            <td><input type="text" class="form-control" name="phuong_xa_tt"  required="true"
                                value="{{$student->phuong_xa_tt}}"></td>
                            <td><input type="text" class="form-control" name="dc_tt"  required="true"
                                value="{{$student->dc_tt}}"></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="btnRegister">Update info</button>
                    </div>
                </div>
            </form>
            <hr>
            {{-- <div class="ibox-body">
                <form action="{{route('students_update_school', $student->id)}}" method="post" class="form-horizontal"
                    id="form-sample-1" novalidate="novalidate">
                    {{ csrf_field() }}
                    <h2 class="appointment-title">Sửa thông tin trường</h2>
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
                    <div class="form-group">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary" id="btnRegister">Sửa thông tin trường</button>
                        </div>
                    </div>
                </form>
            </div> --}}
        </div>
    </div>
</div>
<hr>
@endsection
@section('script')
<script>

    $("#province").change(function(){
    if($(this).val() !== 0){
      $.ajax({
        url: 'https://'+window.location.host+'/getdistrict',
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
            $("<option>").val(0).text('Chọn quận/huyện').appendTo(select).attr("disabled", true).attr("hidden", true);
            $.each(districts, function(i, district){
              $("<option>").val(district.districtid).text(district.name).appendTo(select);
            });
          }
        }
      });
    }
  });
  $("#district").change(function(){
    if($(this).val() !== 0){
      $.ajax({
        url: 'https://'+window.location.host+'/getschool',
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
            $.each(schools, function(i, school){
              $("<option>").val(school.id).text(school.name).appendTo(select);
            });
          }
        }
      });
    }
  });
</script>
@endsection
