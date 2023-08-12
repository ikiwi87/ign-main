<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>
</head>
<body>
    <p>
        <strong>
            Kính gửi quý phụ huynh,
        </strong>
    </p>
    <p>
        Số phiếu của bạn là: {{$student->verify_code}}
    </p>
    <p>
        Vui lòng nhập chính xác mã xác nhận và làm theo hướng dẫn.
    </p>
    <p>
        hoặc tiếp tục <a href="{{route('get_step_2', $student->id)}}">tại đây</a>
    </p>
    <p>
        Trân trọng.
    </p>
    <p>
        <b>MARIE CURIE SCHOOLS</b>
    </p>
        <p>
        <b>Hotline: XXX XXX XXXX</b>
    </p>

</body>
</html>