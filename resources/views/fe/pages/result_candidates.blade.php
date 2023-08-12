@extends('fe.layouts.index')

@section('title')

@endsection
@section('content')
<style type="text/css">
    body {
        background-color: rgba(167, 221, 230, 0.6);
        color: #000;
    }

    form.form-inline>input {
        margin-left: 10px;
    }

    .info-box {
        border: 1px solid #333;
        padding: 20px;
    }

    .table-search {
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
    }

    .table-search td {
        padding: 5px 30px;
        vertical-align: top;
        /* width: 33.33%; */
    }

    .p30 {
        padding: 30px;
    }

    footer {
        /* position: fixed; */
        left: 0;
        bottom: 0;
        width: 100%;

        color: white;
        text-align: center;
    }

    .title {
        font-family: 'Roboto Slab', serif;
        font-size: 25px;
        line-height: 30px;
        letter-spacing: 0.84px;
        font-weight: 700;
        color: #5d1e62;
        text-align: center;
    }

    .download_card {
        border-radius: 4px;
        color: #fff;
        background-color: #5cb85c;
        border-color: #4cae4c;
        padding: 5px 10px;
    }

    .w2 {
        width: 20%;
    }

    .w3 {
        width: 30%;
    }

    .w5 {
        width: 50%;
    }

    .w8 {
        width: 80%;
    }
</style>
@if (count($students) == 0)
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
                        <input type="submit" class=" button_click form-control"
                            formaction="{{route('result_candidates')}}" value="Tra cứu số báo danh">
                    </div>
                </div>
            </form>

            <h3 class="text-black text-center" style="color: red !important">Không tìm thấy kết quả phù hợp. <br> Vui
                lòng
                kiểm tra lại thông tin</h3>
        </div>
    </div>
</div>
@else
<div class="row">
    <h2 class="title text-center">Đã tìm thấy {{count($students)}} kết quả:</h2>
</div>
<div class="container  flex-row justify-content-center align-content-center">
    @foreach ($students as $student)
    <div class="row" style="padding-top:5px">
        <table class="table-search info-box">
            <tr class="table-row">
                <td rowspan="2" style="text-align:center; padding: 5px">
                    <img style="width:160px; border-radius: 15px" src="fe/img/IKMC_logo.png" alt="">
                </td>
                <td colspan="2">
                    <h2 class="title text-center">IKMC - INTERNATIONAL KANGAROO MATH CONTEST 2022</h2>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="w8">
                    <h3 class="title text-center">THẺ DỰ THI</h3>
                </td>
            </tr>
            <tr class="table-row">
                <td class="w3">
                    <span class="caption">Họ và tên: </span><br><span
                        class="font-weight-bold">{{ $student->fullname}}</span>
                </td>
                <td class="w2">
                    <span class="caption">Ngày sinh: </span><br><span
                        class="font-weight-bold">{{ str_pad($student->day, 2, '0', STR_PAD_LEFT) }}/{{ str_pad($student->month, 2, '0', STR_PAD_LEFT) }}/{{ $student->year}}</span>
                </td>
                <td class="w5">
                    <span class="caption">Trường: </span><br><span
                        class="font-weight-bold">{{ $student->school_name}}</span>
                </td>
            </tr>
            <tr>
                <td class="w3">
                    <span class="caption">Cấp độ: </span><span class="font-weight-bold">{{ $student->level}}</span>
                </td>
                <td class="w2">
                    <span class="caption">Khối lớp: </span><span class="font-weight-bold">{{ $student->grade}}</span>
                </td>
                <td class="w5">
            </tr>

            <tr>
                <td colspan="3">

                </td>
            </tr>
						</td>
						<td class="w2"  style="border-bottom: 1px solid #000;">
						</td>
												</td>
						<td class="w3"  style="border-bottom: 1px solid #000;">
						</td>
												</td>
						<td class="w5"  style="border-bottom: 1px solid #000;">
						</td>
            <tr class="table-row">
                <td class="w3">
                    <span class="caption">SBD: </span><br><span
                        class="font-weight-bold">{{ str_pad($student->sbd, 6, '0', STR_PAD_LEFT) }}</span>
                </td>
                <td class="w2">
                    <span class="caption">Phòng thi: </span><br><span
                        class="font-weight-bold">{{ str_pad($student->room, 2, '0', STR_PAD_LEFT) }}</span>
                </td>
                <td>
                    <span class="caption">Điểm thi: </span><br><span
                        class="font-weight-bold">{{ $student->location_name}}</span>
                </td>
            </tr>
            <tr class="table-row">
                <td class="w3">
                    <span class="caption">Giờ thi: </span><br>
                    <span class="font-weight-bold">{{ $student->time}} (Ca {{ $student->cathi}})</span>
                </td>
                <td class="w2">
                    <span class="caption">Ngày thi: </span><br><span class="font-weight-bold">17/04/2022</span>
                </td>
                <td class="w5">
                    <span class="caption">Địa chỉ: </span><br><span
                        class="font-weight-bold">{{ $student->location_address}}</span>
                </td>
            </tr>
        </table>
    </div>
    <div class="row justify-content-center">
        <a href="{{route('export_candidates', $student->id)}}" class="btn btn-success">In thẻ dự thi</a>
    </div>
    <hr>
    @endforeach
    <div class="row">
        <div style="padding: 20px;">
            <h1 style="text-align:center; font-size: 21px;"><b>NỘI QUY PHÒNG THI</b></h1>
            <ol>
                 <li>
Ngày thi: <span style="color:red; font-size: 18px;">17/04/2022</span><br>

	@if ($student->cathi == 1)
      --- Thời gian có mặt tại điểm thi: <span style="color:red; font-size: 18px;">07:30</span> . Thời gian bắt đầu làm bài: 08:00 đến 9:15.<br>
	@else
      --- Thời gian có mặt tại điểm thi : <span style="color:red; font-size: 18px;">09:45</span><span>Phụ huynh tuyệt đối không đưa con đến sớm để tránh ùn tắc giao thông.</span> . Thời gian bắt đầu làm bài : 10:30 đến 11:15.
@endif
                </li>
                <li>
                    Thí sinh bắt buộc phải đeo khẩu trang trong khu vực thi.
                </li>
                <li>
Thí sinh có mặt sau thời gian bắt đầu làm bài thi không được dự thi.
                </li>
                <li>
                    Thí sinh xuất trình Thẻ dự thi cho Cán bộ coi thi (CBCT). Mang dự phòng thẻ học sinh hoặc bản photo giấy khai sinh trong trường hợp cần đối chiếu thông tin.
                </li>
                <li>
                    Thí sinh phải tự chuẩn bị đồ dùng khi đi thi :bút chì 2B, gọt chì, tẩy chì. Không mang thêm đồ dùng khác vào phòng thi. Không sử dụng máy tính cầm tay trong khi thi.
                </li>
                <li>
                    Thí sinh nếu thấy có những sai sót hoặc nhầm lẫn thông tin thí sinh phải báo cáo CBCT để điều chỉnh ngay. Trước khi làm bài thi phải ghi đầy đủ số báo danh vào cả giấy thi và giấy nháp.
                </li>
                <li>
                    Bài thi phải trình bày rõ ràng, sạch sẽ, không nhàu nát, không đánh dấu hoặc làm ký hiệu riêng.
                </li>
                <li>Theo quy định của Kỳ thi IKMC, trả lời sai sẽ bị trừ ¼ số điểm tương ứng với số điểm của câu hỏi, không trả lời không bị trừ điểm. Vì vậy, nếu không trả lời được câu hỏi nào, các thí sinh không nên chọn bừa đáp án.
                </li>
                <li>
                    Thí sinh phải bảo vệ bài làm của mình và nghiêm cấm mọi hành vi gian lận, không được xem bài của thí sinh khác, không được trao đổi khi làm bài.
                </li>
                <li>
                    Thí sinh phải giữ gìn trật tự chung trong phòng thi.Trường hợp ốm đau bất thường phải báo cáo để CBCT xử lý.
                </li>
                <li>
                    Khi hết giờ thi, thí sinh phải ngừng làm bài và nộp bài thi, đề thi, giấy nháp cho CBCT. Trong trường hợp không làm được bài, thí sinh cũng phải nộp bài thi, đề thi, giấy nháp. Khi nộp bài, thí sinh phải tự ký tên xác nhận vào bản danh sách theo dõi thí sinh.
                </li>
                                <li>
                    Thí sinh chỉ được ra khỏi phòng thi và khu vực thi sau khi hết thời gian làm bài và sau khi đã nộp bài làm, đề thi, giấy nháp cho CBCT, trừ trường hợp ốm đau cần cấp cứu do người phụ trách điểm thi quyết định.
                </li>
            </ol>
            <br>
            <h4 style="text-align:right; font-size: 21px; text-transform:uppercase"><b>BTC IKMC VIệt Nam</b></h4>
        </div>
    </div>
</div>
@endif
@endsection