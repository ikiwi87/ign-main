@extends('fe.layouts.index')

@section('title')

@endsection
@section('content')
<style>
    .button_click {
        background-color: #5d1e62;
        color: #fff;
    }
    .button_click:hover{
        background-color: #ffd400;
        color: #5d1e62;
    }
</style>
<div class="row sections-detail">
    <div class="col-12">
        <h2 class="section-title" id="register">Tra cứu Số báo danh IKMC 2022</h2>
        <p class="section-title-desc">Ngày thi: 17/04/2022</p>
        <p class="section-title-desc"><b>Vui lòng nhập chính xác các thông tin cần thiết bên dưới</b></p>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="appointment">
            <h2 class="appointment-title">Thông tin tra cứu</h2>
            <form method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-sm-6 col-xs-12">
                        <label class="control-label">Họ tên thí sinh</label>
                        <input type="text" class="form-control" name="fullname" required="true"
                            placeholder="VD: Nguyễn Thị">
                    </div>
                    <div class="col-sm-2 form-group">
                        <label class="control-label">Ngày sinh</label>
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
                        <label class="control-label">Tháng sinh</label>
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
                        <label class="control-label">Năm sinh</label>
                        <select name="year" class="form-control" required>
                            <option value="" selected="" hidden disabled="">
                                Năm sinh</option>
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
                            <option value="2016">2016</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <input type="submit" class=" button_click form-control" formaction="{{route('result_candidates')}}"
                            value="Tra cứu số báo danh">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection