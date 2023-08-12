<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Danh sách {{$school}}</title>
	<style>
		@page {
			margin: 210px 15px 150px;
		}
		@font-face {
    font-family: 'Roboto Slab';
    src: url({{ storage_path('fonts\RobotoSlab-Regular.ttf') }}) format("truetype");
    font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
    font-style: normal; // use the matching font-style here
}

		body {
			font-family: 'DejaVu Sans';
		}

		/** Define now the real margins of every page in the PDF **/
		body {
			margin-top: 0.5cm;
			margin-bottom: 2cm;
			margin-left: 0.5cm;
			margin-right: 0.5cm;

			counter-reset: page {
					{
					$room - 1
				}
			}

			;
			counter-increment: page;

		}

		/** Define the header rules **/
		#header {
			position: fixed;
			top: -210px;
			left: 0.5cm;
			right: 0.5cm;
			height: 150px;
			padding: 10px 10px;
			/* background-color: #ccc; */
			z-index: 1000;
		}

		#header .page-number:after {
			content: counter(page, decimal-leading-zero)
		}

		/** Define the footer rules **/
		footer {
			position: fixed;
			bottom: -70px;
			left: 0.5cm;
			right: 0.5cm;
			height: 150px;

			/** Extra personal styles **/
			/* background-color: #03a9f4; */
			/* color: white; */
			text-align: center;
			line-height: 50px;
		}

		.page-break {
			page-break-after: left;
		}

		.page-break-auto {
			page-break-after: auto;
		}

		.text-center {
			text-align: center;
		}

		.text-right {
			text-align: right;
			margin-right: 10px;
		}

		.text-left {
			text-align: left;
		}

		.title {
			font-size: 20px;
		}

		#customers th {
			font-size: 10px;
			color: #ddd;
			text-align: left;
			background-color: #777;
			text-align: center;
		}

		#customers {
			width: 100%;
			font-size: 10px;
			border-collapse: collapse;
		}

		#customers td,
		#customers th {
			border: 1px solid #ddd;
			/* padding: 8px; */
		}


		.pdl-250 {
			padding-left: 280px;
		}

		.c-5 {
			width: 50%;
		}

		.c-3 {
			width: 30%;
		}

		.c-2 {
			width: 20%
		}

		.c-8 {
			width: 80%
		}

		span {
			font-weight: 100;
		}

		body {
			font-family: 'dejavu serif';
		}
	</style>
</head>

<body>
	<div id="header">
		<div style="line-height: 20px;">
			<table  class="text-center" style="width: 100%">
				<tr  width="100%"  style="width: 100%" class="text-center">
					<td colspan="2">
						<h2 class="text-center title">KỲ THI TOÁN QUỐC TẾ KANGAROO IKMC 2021</h2>
					</td>
				</tr>
				<tr style="margin-top:-20px; width: 100%;">
					<td colspan="2">
						<h5 class="text-right">Điểm thi: {{$school}}</h5>
						<h5 class="text-right">Ngày thi : 11 tháng 04 năm 2021</h5>
						<h5 class="text-right">Phòng thi số: <span style="font-size: 60px" class="page-number"></span>
						</h5>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<footer>
		<div class="text-center" style="line-height: 15px">
			<table>
				<tr>
					<td width="50%">
						<p class="text-left">Tổng số bài thi: ................
							<br> Tổng số giấy thi: ..............</p>
						<h5 class="text-left" style="line-height: 15px;">CÁN BỘ COI THI 1 <br>
							(Ký và ghi rõ họ tên)</h5>
					</td>
					<td class="pdl-250">
						<p class="text-left">Bằng chữ: ...............
							<br> Bằng số: ................</p>
						<h5 class="text-left">CÁN BỘ COI THI 2 <br>
							(Ký và ghi rõ họ tên)</h5>
					</td>
				</tr>
			</table>
		</div>
	</footer>
	<main>
		<table id="customers">
			<thead>
				<tr>
					<th width="3%">STT</th>
					<th width="5%">SBD</th>
					<th width="22%">Họ và tên</th>
					<th width="12%">Ngày sinh</th>
					<th width="3%">Lớp</th>
					<th width="40%">Trường</th>
					<th width="5%">cấp độ</th>
					<th>Ký nộp</th>
				</tr>
			</thead>
			<tbody>

				@php
				$total = 0;
				$i= 0;
				$r = 1;
				$l = 0;
				$count_students = $students->count();
				@endphp
				@foreach($students as $student)
				<tr>
					@php
					$total++;
					$i++;
					$l++;
					$counts = count($students->where('level', $r));

					if ($counts == 0) {
					$r++;
					$counts = $students->where('level', $r)->count();
					} else {
					$counts = $students->where('level', $r)->count();
					}
					@endphp
					<td>{{str_pad($i, 2, '0', STR_PAD_LEFT) }}</td>
					<td>{{ str_pad($student->sbd, 6, '0', STR_PAD_LEFT) }}</td>
					<td>{{ $student->fullname }}</td>
					<td>{{str_pad($student->day, 2, '0', STR_PAD_LEFT) }}/{{str_pad($student->month, 2, '0', STR_PAD_LEFT) }}/{{$student->year}}
					</td>
					<td>{{ $student->class }}</td>
					<td>{{ $student->school_name }}</td>
					<td>
						@if ($student->level == 5)
							1
						@else
							{{$student->level}}
						@endif
					</td>
					{{-- <td>{{ substr($student->identification_id, 3,2) }}</td>
					<td>{{ substr($student->identification_id, 1,2) }}</td> --}}
					<td>
						{{-- {{$l}} {{$counts}} --}}
						@if($total == $count_students)

						<div class="page-break-auto" hidden style="padding-top:50px;" aria-disabled="true" dissabled>
						</div>
						@elseif ($i == 20)
						<div class="page-break" hidden style="padding-top:50px;"></div>
						@php
						$i=0;
						@endphp
						@elseif($l == $counts)
						<div class="page-break" hidden style="padding-top:50px;"></div>
						@php
						$i=0;
						$l = 0;
						$r++;
						@endphp
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</main>
</body>

</html>