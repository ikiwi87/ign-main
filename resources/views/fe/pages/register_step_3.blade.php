
<style>
    .row .hidden{
        display: none;
    }
</style>
@extends('fe.layouts.index')

@section('title')

@endsection
@section('content')

@if ($student->done == 1)

<div class="row">
    <div class="col-lg-12">
        <div class="appointment">
            <h2 class="appointment-title">Email đã được đăng ký thành công!</h2>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-lg-12">
        <div class="appointment">
            <h2 class="appointment-title">TIỂU HỌC MARIE CURIE</h2>
            <h6 class="appointment-title">PHIẾU ĐĂNG KÝ VÀO LỚP 1</h6>
            <form method="post" action="{{route('store_student')}}" class="text-left" accept-charset="utf-8"
                enctype="multipart/form-data" id="registerform">
                {{ csrf_field() }}
                <div class="row">
                    <h4 class="appointment-title" style="font-size: 1.5rem">Bước 3:</h4>
                    <div class="form-group col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="control-label">Email</label>
                                <input type="email" class="form-control" disabled required="true"
                                    placeholder="VD: kangaroo@ieg.vn" value="{{ session('email') }}">
                            </div>
                            <div class="row" hidden>
                                <div class="col-sm-6">
                                    <label class="control-label">Email</label>
                                    <input type="email" class="form-control" required="true" name="email"
                                        placeholder="VD: kangaroo@ieg.vn" value="{{ session('email') }}">
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">Email</label>
                                    <input type="text" class="form-control" required="true" name="verify_code"
                                        placeholder="VD: kangaroo@ieg.vn" value="{{ session('verify_code') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <h2 class="appointment-title" style="text-align: left;">1. Học Sinh</h2>
                <div class="row">
                    <div class="col-sm-3">
                        <label class="control-label">Số phiếu:</label>
                        <input type="email" class="form-control" disabled required="true"
                            value="{{ session('verify_code') }}">
                    </div>
                </div>
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
                        <input type="text" class="form-control" name="tinh_hk" required="true">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Huyện/ Quận:</label>
                        <input type="text" class="form-control" name="quan_hk" required="true">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Xã/ Phường:</label>
                        <input type="text" class="form-control" name="phuong_xa_hk" required="true">
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
                        <input type="text" class="form-control" name="tinh_tt" required="true">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Huyện/ Quận:</label>
                        <input type="text" class="form-control" name="quan_tt" required="true">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Xã/ Phường:</label>
                        <input type="text" class="form-control" name="phuong_xa_tt" required="true">
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

@endif
@endsection