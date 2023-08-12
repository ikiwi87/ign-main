@extends('be.layouts.index')
@section('title')
Add new student
@endsection
@section('content')
@include('msg')
<div class="row">
    <div class="col-lg-12">
        <div class="appointment">
            <h2 class="appointment-title">TIỂU HỌC MARIE CURIE</h2>
            <h6 class="appointment-title">PHIẾU ĐĂNG KÝ VÀO LỚP 1</h6>
            <form method="post" action="{{route('students_store')}}" class="text-left" accept-charset="utf-8"
                enctype="multipart/form-data" id="registerform">
                {{ csrf_field() }}
                <div class="row">
                    <h4 class="appointment-title" style="font-size: 1.5rem">Bước 3:</h4>
                    <div class="form-group col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="control-label">Email</label>
                                <input type="email" class="form-control" name="email" required="true"
                                        placeholder="VD: Nguyễn Thị">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <h2 class="appointment-title" style="text-align: left;">1. Học Sinh</h2>
                {{-- <div class="row">
                    <div class="col-sm-3">
                        <label class="control-label">Số phiếu:</label>
                        <input type="email" class="form-control" disabled required="true"
                            value="{{ session('verify_code') }}">
                    </div>
                </div> --}}
                <div class="row">
                    <div class="form-group col-sm-6 col-xs-12">
                        <label class="control-label">Họ tên đệm học sinh:</label>
                        <input type="text" class="form-control" name="fullname" required="true"
                            placeholder="VD: Nguyễn Thị">
                    </div>
                    <div class="col-sm-3 form-group">
                        <label class="control-label">Giới tính:</label>
                        <select class="form-control" name="gender" required>
                            <option style="color:#122111;" value="" selected="" hidden disabled="">Giới tính
                            </option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>
                    <div class="col-sm-3 form-group">
                        <label class="control-label">Dân tộc:</label>
                        <input type="text" class="form-control" name="dan_toc" required="true"
                            placeholder="VD: Kinh">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2 form-group">
                        <label class="control-label">Ngày sinh:</label>
                        <select name="day" class="form-control" required>
                            <option value="" selected="" hidden disabled="">
                                Ngày sinh</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                    </div>
                    <div class="col-sm-2 form-group">
                        <label class="control-label">Tháng sinh:</label>
                        <select name="month" class="form-control" required>
                            <option value="" selected="" hidden disabled="">
                                Tháng sinh</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <div class="col-sm-2 form-group">
                        <label class="control-label">Năm sinh:</label>
                        <select name="year" class="form-control" required>
                            <option value="" selected="" hidden disabled="">
                                Năm sinh</option>
                            <option value="2003">2003</option>
                            <option value="2004">2004</option>
                            <option value="2005">2005</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label class="control-label">Nơi Sinh:</label>
                        <input type="text" class="form-control" name="noi_sinh" required="true"
                            placeholder="VD: Hà Nội">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6 col-xs-12">
                        <label class="control-label">Năm học 2022-2023 học ở trường:</label>
                        <input type="text" class="form-control" name="schools_mau_giao" required="true"
                            placeholder="VD: Trường mầm non ABCD">
                    </div>
                </div>
                <h2 class="appointment-title" style="text-align: left;">2. Năm học 2023 - 2024 đăng ký vào lớp 1</h2>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label class="control-label">Đăng ký nhập học tại cơ sở:</label>
                        <select name="schools_id" class="form-control" id="select1" required>
                            <option value="" selected="" hidden disabled="">Chọn cơ sở </option>
                            <option value="Mỹ Đình">Mỹ Đình</option>
                            <option value="Kiến Hưng">Kiến Hưng</option>
                            <option value="Việt Hưng">Việt Hưng</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label class="control-label">Nhập học chương trình:</label>
                        <select name="chuong_trinh" class="form-control" id="select2" onchange="selectAll(this.value)"
                            required>
                            <option value="" selected="" hidden disabled="">Chọn chương trình nhập học </option>
                            <option value="Truyền Thống">Truyền Thống</option>
                            <option value="Song Ngữ">Song ngữ Việt Nam - Oxford</option>
                        </select>
                    </div>
                </div>

                <h2 class="appointment-title" style="text-align: left;">3. Thông tin phụ huynh</h2>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label class="control-label">Họ tên Cha:</label>
                        <input type="text" class="form-control" name="name_cha" required="true">
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="control-label">Họ tên Mẹ:</label>
                        <input type="text" class="form-control" name="name_me" required="true">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2 form-group">
                        <label class="control-label">Năm sinh Cha:</label>
                        <input type="text" class="form-control" name="namsinh_cha" required="true">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">SĐT Cha:</label>
                        <input type="text" class="form-control" required="true" maxlength="10" minlength="5" value="0" name="phone_cha">
                    </div>
                    <div class="col-sm-2 form-group">
                        <label class="control-label">Năm sinh Mẹ:</label>
                        <input type="text" class="form-control" name="namsinh_me" required="true">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">SĐT Mẹ:</label>
                        <input type="text" class="form-control" required="true" maxlength="10" minlength="5" value="0" name="phone_me">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label class="control-label">Nghề nghiệp của Cha:</label>
                        <input type="text" class="form-control" name="job_cha" required="true">
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="control-label">Nghề nghiệp của Mẹ:</label>
                        <input type="text" class="form-control" name="job_me" required="true">
                    </div>
                </div>

                <h2 class="appointment-title" style="text-align: left;">4. Hộ Khẩu thường trú</h2>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label class="control-label">Tỉnh/ TP:</label>
                        <select class="form-control form-select form-select-sm mb-3" id="city" name="tinh_hk" aria-label=".form-select-sm">
                            <option value="" selected>Chọn tỉnh thành</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Huyện/ Quận:</label>
                        <select class="form-control form-select form-select-sm mb-3" id="district" name="quan_hk" aria-label=".form-select-sm">
                            <option value="" selected>Chọn quận huyện</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Xã/ Phường:</label>
                        <select class="form-control form-select  form-select-sm" id="ward" name="phuong_xa_hk" aria-label=".form-select-sm">
                            <option value="" selected>Chọn phường xã</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="control-label">Tổ/ Số nhà:</label>
                        <input type="text" class="form-control" name="dc_hk" required="true">
                    </div>
                </div>

                <h2 class="appointment-title" style="text-align: left;">5. Nơi đăng ký cư trú</h2>

                <div class="row">
                    <div class="form-group col-sm-4">
                        <label class="control-label">Tỉnh/ TP:</label>
                        <select class="form-control form-select form-select-sm mb-3" id="city2" name="tinh_tt" aria-label=".form-select-sm">
                            <option value="" selected>Chọn tỉnh thành</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Huyện/ Quận:</label>
                        <select class="form-control form-select form-select-sm mb-3" id="district2" name="quan_tt" aria-label=".form-select-sm">
                            <option value="" selected>Chọn quận huyện</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Xã/ Phường:</label>
                        <select class="form-control form-select  form-select-sm" id="ward2" name="phuong_xa_tt" aria-label=".form-select-sm">
                            <option value="" selected>Chọn phường xã</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="control-label">Tổ/ Số nhà:</label>
                        <input type="text" class="form-control" name="dc_tt" required="true">
                    </div>
                </div>

                <h2 class="appointment-title" style="text-align: left;">6. Anh/Chị ruột đang học ở trường Marie Curie (nếu có)</h2>
                <div class="row">
                    <div class="form-group col-sm-8">
                        <label class="control-label">Họ và tên Anh/Chị ruột:</label>
                        <input type="text" class="form-control" name="name_anh_chi" required="true">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Lớp đang học:</label>
                        <input type="text" class="form-control" name="lop_dang_hoc" required="true">
                    </div>
                </div>
                <div class="row">
                    <a>* Chúng tôi cam kết chịu trách nhiệm về thông tin ở trên.</a>
                </div>
                <div class="form-group">
                    <div class="col-sm-11 text-right">
                        <button type="submit" class="btn btn-primary" id="btnRegister" style="border-color: #d23544; background-color: #d23544;">ĐĂNG KÝ!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    let citis = document.getElementById("city");
    let districts = document.getElementById("district");
    let wards = document.getElementById("ward");

    let citis2 = document.getElementById("city2");
    let districts2 = document.getElementById("district2");
    let wards2 = document.getElementById("ward2");

    let Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };

    let promise = axios(Parameter);
    promise.then(function (result) {
        renderCity(result.data);
    });

    function renderCity(data) {
        for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Id);
            citis2.options[citis2.options.length] = new Option(x.Name, x.Id);
        }
        citis.onchange = function () {
            district.length = 1;
            ward.length = 1;
            if(this.value != ""){
                const result = data.filter(n => n.Id === this.value);

                for (const k of result[0].Districts) {
                    district.options[district.options.length] = new Option(k.Name, k.Id);
                }
            }
        };

        district.onchange = function () {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Id === citis.value);
            if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Id);
                }
            }
        };

        citis2.onchange = function () {
            district2.length = 1;
            ward2.length = 1;
            if(this.value != ""){
                const result = data.filter(n => n.Id === this.value);

                for (const k of result[0].Districts) {
                    district2.options[district2.options.length] = new Option(k.Name, k.Id);
                }
            }
        };

        district2.onchange = function () {
            ward2.length = 1;
            const dataCity = data.filter((n) => n.Id === citis2.value);
            if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                for (const w of dataWards) {
                    wards2.options[wards2.options.length] = new Option(w.Name, w.Id);
                }
            }
        };
    }

</script>

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

<script src="fe/bootstrap/js/bootstrap.min.js"></script>
@endsection
