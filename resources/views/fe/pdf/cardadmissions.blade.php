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
			margin: 0;
			/* width: 210mm;
			height: 148.5mm; */
		}
		@page {
        size: a4 landscape;
        margin: 0;
    }

		.info-box {
			/* border: 1px solid #333; */
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
			font-size: 20px;
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
			font-size: 20px;
		}

		.font-weight-bold {
			font-weight: bold;
			font-size: 14px;
		}
		.w1 {
			width: 10%;
		}

		.w2 {
			width: 20%;
		}
		.w25 {
			width: 25%;
		}

		.w3 {
			width: 30%;
		}
		.w35 {
			width: 35%;
		}

		.w5 {
			width: 50%;
		}
		.w6 {
			width: 390px;
		}
		.w65 {
			width: 65%;
		}
		.w7 {
			width: 70%;
		}
		.w75 {
			width: 75%;
		}

		.w8 {
			width: 80%;
		}
		.w9 {
			width: 90%;
		}
		table td{
			
			vertical-align: top;
		}
	</style>
</head>

<body>
	@if ($student->payment == '1') 
	<div class="main">
		<div class="full-width">
			<div class="text-center" style=" 
			margin: 0;
			width: 100%;
			height: 100%;
			background-image: url('fe/img/bg.png');
			  background-repeat: no-repeat;
			  background-attachment: fixed;
			background-size: cover;">
				<div class="row">
					<table class="table-search info-box" style="font-size:20px; width: 600px; margin-top: 21px; margin-left: 10%;">
						<tr class="table-row">
							<td class="table-cell" rowspan="2">
							<img width="72px" height="72px"
							src="https://chart.googleapis.com/chart?cht=qr&chl={{str_pad($student->code, 50, 'https://mc.ieg.vn/phieudutrainghiem/', STR_PAD_LEFT)}}&chs=160x160&chld=L|0">
							</td>
						</tr>
					</table>
					<table class="table-search info-box" style="font-size:20px; width: 600px; margin-top: -30px; margin-left: 3%;">
						<tr class="table-row">
							<td class="w65">
								<span class="font-weight-bold">Số: {{ $student->code}} </span>
							</td>
							
						</tr>
					</table>
					<table class="table-search info-box" style="line-height: 1.05; font-size: 40px; width: 660px; margin-top: 180px; margin-left: 26%; word-spacing: -1px;">
						<tr class="table-row">
							<td class="w6">
								<span class="caption"><b>Họ và tên HS: </b><span
									class="caption">{{ $student->fullname}}</span></span>
							</td>
							<td class="w35">
								<span class="caption"><b>Ngày sinh: </b>{{$student->day}}/{{$student->month}}/{{$student->year}}</span>
							</td>
						</tr>
						<tr class="table-row">
							<td class="w75" style="text-align: left;">
								<span class="caption"><b>Họ và tên PH: </b><span
									class="caption">{{ $student->name_cha}} \ {{ $student->name_me}}</span> </span>
							</td>
							<td class="w25">
								<span class="caption"><b>ĐTDD: </b>{{ $student->phone_cha}}</span>
							</td>
						</tr>
						<tr class="table-row">
							<td class="w3" colspan="2">
								<span class="caption"><b>Ngày dự trải nghiệm: 08h00 - 16h00 ngày dd/mm/yyyy </b></span>
							</td>
						</tr>
						<tr class="table-row">
							<td class="w3" colspan="2">
								<p class="caption" style="text-indent: 25px;"><b>Địa điểm : </b>
								<span class="caption">
									@if ($student->schools_id == 'Mỹ Đình') 
									<a>Địa chỉ mỹ đình</a>
								@if ($student->schools_id == 'Kiến Hưng') 
									<a>Địa chỉ Kiến hưng</a>
								@if ($student->schools_id == 'Việt Hưng') 
									<a>Địa chỉ Việt hưng</a> 
								@else
									<a>Lỗi thông tin sai cần liên hệ với phòng tuyển sinh của trường để được hỗ trợ</a>
								@endif
								@endif
								@endif	
								</span></p>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	@else
	<a style="text-align: center; color: red;"><b>ID</b> của bạn vi phạm quy tắc hệ thống !!!</a>
	@endif
</body>

</html>