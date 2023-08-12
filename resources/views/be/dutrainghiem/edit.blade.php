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
            <form method="post" action="{{route('dutrainghiem_admin_update', $dutrainghiem->id)}}" class="text-left" accept-charset="utf-8" id="registerform">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-sm-6 col-xs-12">
                        <label class="control-label">Họ tên đệm học sinh</label>
                        <input type="text" class="form-control" name="fullname" required="true" placeholder="VD: Nguyễn Thị" value="{{$dutrainghiem->fullname}}">
                    </div>
                    <div class="col-sm-2 form-group">
                        <label class="control-label">Ngày sinh</label>
                        <select name="day" class="form-control" required>
                            <option value="none" selected="" hidden disabled="">
                                Ngày sinh</option>
                            <option value="01" {{$dutrainghiem->day == "01" ? 'selected' : ''}}>01</option>
                            <option value="02" {{$dutrainghiem->day == "02" ? 'selected' : ''}}>02</option>
                            <option value="03" {{$dutrainghiem->day == "03" ? 'selected' : ''}}>03</option>
                            <option value="04" {{$dutrainghiem->day == "04" ? 'selected' : ''}}>04</option>
                            <option value="05" {{$dutrainghiem->day == "05" ? 'selected' : ''}}>05</option>
                            <option value="06" {{$dutrainghiem->day == "06" ? 'selected' : ''}}>06</option>
                            <option value="07" {{$dutrainghiem->day == "07" ? 'selected' : ''}}>07</option>
                            <option value="08" {{$dutrainghiem->day == "08" ? 'selected' : ''}}>08</option>
                            <option value="09" {{$dutrainghiem->day == "09" ? 'selected' : ''}}>09</option>
                            <option value="10" {{$dutrainghiem->day == "10" ? 'selected' : ''}}>10</option>
                            <option value="11" {{$dutrainghiem->day == "11" ? 'selected' : ''}}>11</option>
                            <option value="12" {{$dutrainghiem->day == "12" ? 'selected' : ''}}>12</option>
                            <option value="13" {{$dutrainghiem->day == "13" ? 'selected' : ''}}>13</option>
                            <option value="14" {{$dutrainghiem->day == "14" ? 'selected' : ''}}>14</option>
                            <option value="15" {{$dutrainghiem->day == "15" ? 'selected' : ''}}>15</option>
                            <option value="16" {{$dutrainghiem->day == "16" ? 'selected' : ''}}>16</option>
                            <option value="17" {{$dutrainghiem->day == "17" ? 'selected' : ''}}>17</option>
                            <option value="18" {{$dutrainghiem->day == "18" ? 'selected' : ''}}>18</option>
                            <option value="19" {{$dutrainghiem->day == "19" ? 'selected' : ''}}>19</option>
                            <option value="20" {{$dutrainghiem->day == "20" ? 'selected' : ''}}>20</option>
                            <option value="21" {{$dutrainghiem->day == "21" ? 'selected' : ''}}>21</option>
                            <option value="22" {{$dutrainghiem->day == "22" ? 'selected' : ''}}>22</option>
                            <option value="23" {{$dutrainghiem->day == "23" ? 'selected' : ''}}>23</option>
                            <option value="24" {{$dutrainghiem->day == "24" ? 'selected' : ''}}>24</option>
                            <option value="25" {{$dutrainghiem->day == "25" ? 'selected' : ''}}>25</option>
                            <option value="26" {{$dutrainghiem->day == "26" ? 'selected' : ''}}>26</option>
                            <option value="27" {{$dutrainghiem->day == "27" ? 'selected' : ''}}>27</option>
                            <option value="28" {{$dutrainghiem->day == "28" ? 'selected' : ''}}>28</option>
                            <option value="29" {{$dutrainghiem->day == "29" ? 'selected' : ''}}>29</option>
                            <option value="30" {{$dutrainghiem->day == "30" ? 'selected' : ''}}>30</option>
                            <option value="31" {{$dutrainghiem->day == "31" ? 'selected' : ''}}>31</option>
                        </select>
                    </div>
                    <div class="col-sm-2 form-group">
                        <label class="control-label">Tháng sinh</label>
                        <select name="month" class="form-control" required>
                            <option value="none" selected="" hidden disabled="">
                                Tháng sinh</option>
                            <option value="01" {{$dutrainghiem->month == "01" ? 'selected' : ''}}>01</option>
                            <option value="02" {{$dutrainghiem->month == "02" ? 'selected' : ''}}>02</option>
                            <option value="03" {{$dutrainghiem->month == "03" ? 'selected' : ''}}>03</option>
                            <option value="04" {{$dutrainghiem->month == "04" ? 'selected' : ''}}>04</option>
                            <option value="05" {{$dutrainghiem->month == "05" ? 'selected' : ''}}>05</option>
                            <option value="06" {{$dutrainghiem->month == "06" ? 'selected' : ''}}>06</option>
                            <option value="07" {{$dutrainghiem->month == "07" ? 'selected' : ''}}>07</option>
                            <option value="08" {{$dutrainghiem->month == "08" ? 'selected' : ''}}>08</option>
                            <option value="09" {{$dutrainghiem->month == "09" ? 'selected' : ''}}>09</option>
                            <option value="10" {{$dutrainghiem->month == "10" ? 'selected' : ''}}>10</option>
                            <option value="11" {{$dutrainghiem->month == "11" ? 'selected' : ''}}>11</option>
                            <option value="12" {{$dutrainghiem->month == "12" ? 'selected' : ''}}>12</option>
                        </select>
                    </div>
                    <div class="col-sm-2 form-group">
                        <label class="control-label">Năm sinh</label>
                        <select name="year" class="form-control" required>
                            <option value="none" selected="" hidden disabled="">
                                Năm sinh</option>
                            <option value="2003" {{$dutrainghiem->year == "2003" ? 'selected' : ''}}>2003</option>
                            <option value="2004" {{$dutrainghiem->year == "2004" ? 'selected' : ''}}>2004</option>
                            <option value="2005" {{$dutrainghiem->year == "2005" ? 'selected' : ''}}>2005</option>
                            <option value="2006" {{$dutrainghiem->year == "2006" ? 'selected' : ''}}>2006</option>
                            <option value="2007" {{$dutrainghiem->year == "2007" ? 'selected' : ''}}>2007</option>
                            <option value="2008" {{$dutrainghiem->year == "2008" ? 'selected' : ''}}>2008</option>
                            <option value="2009" {{$dutrainghiem->year == "2009" ? 'selected' : ''}}>2009</option>
                            <option value="2010" {{$dutrainghiem->year == "2010" ? 'selected' : ''}}>2010</option>
                            <option value="2011" {{$dutrainghiem->year == "2011" ? 'selected' : ''}}>2011</option>
                            <option value="2012" {{$dutrainghiem->year == "2012" ? 'selected' : ''}}>2012</option>
                            <option value="2013" {{$dutrainghiem->year == "2013" ? 'selected' : ''}}>2013</option>
                            <option value="2014" {{$dutrainghiem->year == "2014" ? 'selected' : ''}}>2014</option>
                            <option value="2015" {{$dutrainghiem->year == "2015" ? 'selected' : ''}}>2015</option>
                            </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-9 col-xs-12">
                        <label class="control-label">Họ và tên cha/mẹ học sinh:</label>
                        <input type="text" class="form-control" name="parent_name" required="true" placeholder="VD: Nguyễn Thị" value="{{$dutrainghiem->parent_name}}">
                    </div>
                    <div class="col-sm-3 form-group">
                        <label class="control-label">ĐT DD:</label>
                        <input type="text" class="form-control" name="parent_phone" required="true" placeholder="VD: 0987 xxx xxx" value="{{$dutrainghiem->parent_phone}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group" style="margin-bottom: 0px;">
                        <label class="control-label">Ngày dự trải nghiệm : 8h:00 - 16h ngày <input id="ngaydu_trainghiem" name="ngaydu_trainghiem" width="200" value="{{$dutrainghiem->ngaydu_trainghiem}}"/>
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
                            <label><input type="radio" name="diadiem_thamgia" value="1" {{$dutrainghiem->diadiem_thamgia == "1" ? 'checked' : ''}} required> Cơ sở 1 - Mỹ Đình 1, Nam Từ Liêm</label>
                        </div></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><label><input type="radio" name="diadiem_thamgia" value="0" {{$dutrainghiem->diadiem_thamgia == "0" ? 'checked' : ''}} required> Cơ sở 2 - Kiến Hưng, Hà Đông</label></td>
                    </tr>
                </table>
                <div class="form-group">
                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="btnRegister">UPDATE</button>
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
