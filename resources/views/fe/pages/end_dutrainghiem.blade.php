
@extends('fe.layouts.index')

@section('title')
    
@endsection
@section('content')

<div class="row sections-detail">
    <div class="col-12">
        <h2 class="section-title" id="register">ĐĂNG KÝ THÀNH CÔNG!</h2>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="appointment" style="background-color: #fff; 
        color: #000;">
            <h2 class="appointment-title">Mã xác nhận đăng ký</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrapper">
                        <div class="title-h2">
                            <h2>Quý phụ huynh.</h2>
                            <p style="color: #ff0000; font-style: oblique;">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align: left;">
                <p>
                    <span class="red-text">
                        MC 2023-2024 {{str_pad($dutrainghiem->code, 5, '0', STR_PAD_LEFT)}}-{{$dutrainghiem->fullname}}</span>
                </p>
                
            </div>

        </div>
    </div>
    
</div>
<div class="inside-container join-us-section">
    <div class="row">
        <div class="col-12">
            <a href="/" class="join-us-btn">Về trang chủ</a>
        </div>
    </div>
</div>
@endsection