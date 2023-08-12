@extends('fe.layouts.index')

@section('content')

<div class="row sections-detail">
    <div class="col-12">
        <h2 class="section-title" id="register">THỦ TỤC NHẬP HỌC LỚP 1</h2>
        <p class="section-title-desc">Hạn đăng ký: 10/03/2023</p>
        <p class="section-title-desc"><b>Vui lòng làm đầy đủ theo các bước bên dưới</b></p>
    </div>
</div>
@if ($student->done == 1)

<div class="row">
    <div class="col-lg-12">
        <div class="appointment">
            <h2 class="appointment-title">Email đã được đăng ký thành công!</h2>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-lg-12">
        <div class="appointment">
            <h2 class="appointment-title">Thông tin đăng ký</h2>
            @if(session('check'))
            <div class="alert alert-success row">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('check') }}
            </div>
            @endif

            @if(session('wrong'))
            <div class="alert alert-danger row">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('wrong') }}
            </div>
            @endif
            <form method="post" action="{{route('step_2')}}" class="text-left" accept-charset="utf-8" id="registerform">
                {{ csrf_field() }}
                <div class="row">
                    <P>
                        Phụ huynh vui lòng kiểm tra tất cả các hòm thư (quảng cáo, nội dung cập nhật, thư rác - spam...) hoặc tìm kiếm email từ admin@mariecurieschools.edu.vn trong hòm thư.
                    </P>
                    </div>
                <div class="row">
                    <h4 class="appointment-title" style="font-size: 1.5rem">Bước 2:</h4>
                    <div class="form-group col-sm-12 col-xs-12">
                        <label class="control-label">Email</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="email" class="form-control" disabled required="true"
                                    placeholder="VD: admin@mariecurieschools.edu.vn" @if(session('email'))
                                    value="{{ session('email') }}" @else value="{{$student->email}}" @endif>
                                <input type="email" class="form-control" hidden name="email" required="true"
                                    placeholder="VD: admin@mariecurieschools.edu.vn" @if(session('email'))
                                    value="{{ session('email') }}" @else value="{{$student->email}}" @endif>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6 col-xs-12">
                        <label class="control-label">Mã xác nhận</label>
                        <input type="text" class="form-control" name="verify_code"  required="true"
                            placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="btnRegister" style="border-color: #d23544; background-color: #d23544;">Tiếp tục</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endif
@endsection