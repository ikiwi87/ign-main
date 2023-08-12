<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


	<style type="text/css">
		@font-face {
    font-family: 'Roboto Slab';
    src: url({{ storage_path('fonts\RobotoSlab-Regular.ttf') }}) format("truetype");
    font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
    font-style: normal; // use the matching font-style here
}
		body {
			font-family: 'DejaVu Sans';
		}

		.info-box {
			border: 1px solid #333;
			padding: 10px;
		}

		.text-center {
			text-align: center;
		}

		.title {
			font-size: 16px;
		}

		.flex-item {
			display: table-cell;

		}

		.table {
			display: table;
			width: 100%;
			table-layout: fixed;
			font-size: 14px;
		}

		.table-row {
			display: table-row;

		}

		.table-cell {
			display: table-cell;
			width: 33.33%;
			overflow-wrap: normal;

		}

		.caption {
			font-size: 14px;
		}

		.font-weight-bold {
			font-weight: bold;
			font-size: 14px;
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
		table td{
			
			vertical-align: top;
		}
	</style>
</head>

<body>
	{{-- 	@php
$avatarUrl = asset('imgs/logo.png');

$type = pathinfo($avatarUrl, PATHINFO_EXTENSION);
$avatarData = file_get_contents($avatarUrl);
$avatarBase64Data = base64_encode($avatarData);
$imageData = 'data:image/' . $type . ';base64,' . $avatarBase64Data;
	@endphp
 --}}
	<div class="main">
		<div class="full-width">
			<div class="text-center">

				<table class="table-search info-box">
					<tr class="table-row">
						<td rowspan="2" style="text-align:center; padding: 10px 0px">
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
						<td class="w3" style="border-bottom: 1px solid #000; left:20%">
							<span class="caption">Cấp độ: </span><span
								class="font-weight-bold">{{ $student->level}}</span>
						</td>
						<td class="w2" style="border-bottom: 1px solid #000;">
							<span class="caption">Khối lớp: </span><span
								class="font-weight-bold">{{ $student->grade}}</span>
						</td>
						<td class="w5"  style="border-bottom: 1px solid #000;">

						</td>
					</tr>
					<tr class="table-row">
						<td class="w3">
							<span class="caption">SBD: </span><br><span
								class="font-weight-bold">{{ str_pad($student->sbd, 6, '0', STR_PAD_LEFT) }}</span>
						</td>
						<td class="w2">
							<span class="caption">Phòng thi: </span><br><span
								class="font-weight-bold">{{str_pad($student->room, 2, '0', STR_PAD_LEFT) }}</span>
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
			<h3 style="text-align:center; ">NỘI QUY PHÒNG THI</h3>
			<ol style="font-size:14px;line-height:16px; ">
				  <li>
				      
Ngày thi: <span style="color:red; font-size: 18px;">17/04/2022.</span>
 Thời gian có mặt tại điểm thi:
 @if ($student->cathi == 1)
<span style="color:red; font-size: 18px;">07:30</span>
@else <span style="color:red; font-size: 18px;">09:45</span><span> Phụ huynh tuyệt đối không đưa con đến sớm để tránh ùn tắc giao thông.</span>
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
                    Thí sinh nếu thấy có nhầm lẫn thông tin thí sinh phải báo cáo CBCT để điều chỉnh ngay. Trước khi làm bài thi phải ghi đầy đủ số báo danh vào cả giấy thi và giấy nháp.
                </li>
                <li>
                    Bài thi phải trình bày rõ ràng, sạch sẽ, không nhàu nát, không làm ký hiệu riêng.
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
			<h4 style="text-align:right; font-size: 13px; text-transform:uppercase">
				<b>BTC IKMC VIệt Nam</b>
			</h4>
		</div>
	</div>
</body>

</html>