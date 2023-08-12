@extends('fe.layouts.index')

@section('title')
    
@endsection
@section('content')

<div class="row sections-detail">
    <div class="col-12">
        <h2 class="section-title" id="register">THỦ TỤC NHẬP HỌC LỚP 1</h2>
        <p class="section-title-desc">Dùng cho học sinh được chọn chính thức và dự khuyết chương trình Truyền thống 2023 - 2024</p>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="appointment">
            <form method="post">
                {{ csrf_field() }}
                <div class="row">
                    <h4 class="appointment-title" style="font-size: 1.5rem">Bước 1:</h4>
                    
                    <div class="form-group col-sm-12 col-xs-12">@if(session('msg'))
                        <div class="alert alert-danger row">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session('msg') }}
                        </div>
                        @endif
                        @if(session('check'))
                        <div class="alert alert-success row">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session('check') }}
                        </div>
                        @endif
                        <label class="control-label">Điền Email - Phương thức liên hệ chính giữa Nhà trường và Quý phụ huynh <br>*Lưu ý: sử dụng email đang hoạt động
</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="email" class="form-control" name="email" required="true"
                                    placeholder="VD: user@mariecurieschools.edu.vn" value="{{ session('email') }}">
                            </div>
                            <div class="col-sm-3">
                                <input type="submit" class="btn btn-primary form-control"
                                    formaction="{{route('verify_email')}}" value="Nhận phiếu nhập học" style="
                                    border-color: #d23544;
                                    background-color: #d23544;
                                ">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection