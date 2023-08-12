<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Payment</title>
    <base href="{{asset("")}}">
</head>

<body>
    <div class="row">
        
        <table role="presentation" cellpadding="0"
        cellspacing="0"
        style="border-collapse:collapse;border-spacing:0px;"
        align="center" border="0">
        <tbody>
            <tr>
                <td style="width:100%;"><img alt=""
                        title="" height="auto"
                        src="https://mariecuriehanoischool.com/images/logo.png"
                        style="border:none;border-radius:0px;display:block;font-size:13px;outline:none;text-decoration:none;width:100%;height:auto;"
                        width="108"></td>
            </tr>
        </tbody>
    </table>
    </div>
    <br>
    <div>
        
    <p>
        <strong>
            Kính gửi quý phụ huynh thí sinh {{$student->fullname}},
        </strong>
    </p>
    <p>
        Nhà trường xác nhận Quý phụ huynh đã đăng ký thành công thủ tục nhập học Lớp 1 2023-2024.
    </p>
    <p>
        Quý phụ huynh vui lòng kiểm tra lại thông tin đã đăng ký bên dưới đây, nếu phụ huynh cần thay đổi thông tin vui lòng liên hệ cho phòng tuyền sinh của nhà trường:
    </p>
    </div>
    <div style="text-align: left;">
        <h4 style="text-align: center;"><strong>THÔNG TIN ĐĂNG KÝ</strong></h4>
        <p>
            <h5>1. Học sinh</h5>
            <table class="table">
                <tr>
                  <th scope="col">Họ và tên</th>
                  <th scope="col">Ngày sinh</th>
                  <th scope="col">Dân tộc</th>
                  <th scope="col">Giới tính</th>
                  <th scope="col">Nơi sinh</th>
                </tr>
                <tr>
                  <td>{{$student->fullname}}</td>
                  <td>{{$student->day}}/{{$student->month}}/{{$student->year}}</td>
                  <td>{{$student->dan_toc}}</td>
                  <td>{{$student->gender}}</td>
                  <td>{{$student->noi_sinh}}</td>
                </tr>
              </table>
              <h5>2. Thông tin Phụ Huynh</h5>
              <table class="table">
                <tr>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Năm sinh</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Nghề nghiệp</th>
                </tr>
                <tr>
                    <td>{{$student->name_cha}}</td>
                    <td>{{$student->namsinh_cha}}</td>
                    <td>{{$student->phone_cha}}</td>
                    <td>{{$student->job_cha}}</td>
                </tr>
                <tr>
                    <td>{{$student->name_me}}</td>
                    <td>{{$student->namsinh_me}}</td>
                    <td>{{$student->phone_me}}</td>
                    <td>{{$student->job_me}}</td>
                  </tr>
              </table>
        </p>
    </div>
    <div style="text-align: right; margin-right: 50px;">
        <br>
        <h4>
            Trân trọng
        </h4>
        <h3><strong>MC SCHOOLS</strong></h3>
    </div>
</body>

</html>