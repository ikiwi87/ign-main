<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>
    <base href="{{asset("")}}">
</head>

<body>
    <div class="row">

        <table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0px;"
            align="center" border="0">
            <tbody>
                <tr>
                    <td style="width:100%;"><img alt="" title="" height="auto"
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
                Kính gửi Quý Phụ Huynh {{$student->fullname}}
            </strong>
        </p>
        <p>
            MC Schools xác nhận quý phụ huynh đã hoàn thành đăng ký nhập học vào lóp 1 cho học sinh mã phiếu đăng ký: <b>{{$student->code}}</b>
        </p>
        <a class="btn btn-primary" href="{{str_pad($student->code, 50, 'https://mc.ieg.vn/phieudutrainghiem/', STR_PAD_LEFT)}}" role="button">TẢI PHIẾU DỰ TRẢI NGHIỆM</a>
        <em>Lưu ý: Quý Phụ Huynh vui lòng tải và in PHIẾU DỰ TRẢI NGHIỆM, khi tới địa điểm tham dự vui long cầm theo PHIẾU DỰ TRẢ NGHIỂM đã in ở trên. </em>
    </div>
    <div style="text-align: left;">
        <p>
            Các thông tin tiếp theo về năm học sẽ được thông báo qua email, rất mong quý phụ huynh theo dõi. <br>
            Chân thành cảm ơn quý Phụ Huynh và Học Sinh.
        </p>
        <h4>
            <b>Trân trọng</b>
        </h4>
        <h3><strong>MC Schools<br>Hotline: xxx xxx xxxxx</strong></h3>
    </div>
</body>

</html>