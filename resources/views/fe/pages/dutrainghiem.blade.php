@extends('fe.layouts.index')

@section('title')

@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="appointment">
            <h2 class="appointment-title">PHIẾU DỰ TRẢI NGHIỆM</h2>
            <form method="post" action="{{route('store_dutrainghiem')}}" class="text-left" accept-charset="utf-8" id="registerform">
                {{ csrf_field() }}
                <div class="row">
                    <h4 class="appointment-title" style="font-size: 1.5rem">(Trước khi vào lớp 1)</h4>
                </div>
        <hr>

        <h2 class="appointment-title">Thông tin học sinh</h2>
        <div class="row">
            <div class="form-group col-sm-6 col-xs-12">
                <label class="control-label">Họ tên đệm học sinh</label>
                <input type="text" class="form-control" name="fullname" required="true" placeholder="VD: Nguyễn Thị">
            </div>
            <div class="col-sm-2 form-group">
                <label class="control-label">Ngày sinh</label>
                <select name="day" class="form-control" required>
                    <option value="none" selected="" hidden disabled="">
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
                <label class="control-label">Tháng sinh</label>
                <select name="month" class="form-control" required>
                    <option value="none" selected="" hidden disabled="">
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
                <label class="control-label">Năm sinh</label>
                <select name="year" class="form-control" required>
                    <option value="none" selected="" hidden disabled="">
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
        </div>
        <div class="row">
            <div class="form-group col-sm-9 col-xs-12">
                <label class="control-label">Họ và tên cha/mẹ học sinh:</label>
                <input type="text" class="form-control" name="parent_name" required="true" placeholder="VD: Nguyễn Thị">
            </div>
            <div class="col-sm-3 form-group">
                <label class="control-label">ĐT DD:</label>
                <input type="text" class="form-control" name="parent_phone" required="true" placeholder="VD: 0987 xxx xxx">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 form-group" style="margin-bottom: 0px;">
                <label class="control-label">Ngày dự trải nghiệm : 8h:00 - 16h ngày <input id="ngaydu_trainghiem" name="ngaydu_trainghiem" width="200" />
                    <script>
                        $('#datepicker').datepicker({
                            uiLibrary: 'bootstrap3'
                        });
                    </script></label>
            </div>
        </div>
        <table style="width:100%; border:30px solid rgb(255, 255, 255);">
            <tr>
                <td>Địa điểm: </td>
                <td><div class="radio">
                    <label><input type="radio" name="diadiem_thamgia" value="1" required> Cơ sở 1 - Mỹ Đình 1, Nam Từ Liêm</label>
                </div></td>
            </tr>
            <tr>
                <td></td>
                <td><label><input type="radio" name="diadiem_thamgia" value="0" required> Cơ sở 2 - Kiến Hưng, Hà Đông</label></td>
            </tr>
        </table>
        <div class="form-group">
            <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-primary" id="btnRegister">ĐĂNG KÝ!</button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
@endsection
