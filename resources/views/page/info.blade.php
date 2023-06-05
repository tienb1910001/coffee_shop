@extends('master')
@section('content')
    <main id="main" style="margin-top: 110px">
        <section id="product" class="menu section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Information</h2>
                    <p>
                        Thông tin cá nhân
                    </p>
                </div>
            </div>

            <div class="container mt-5 mt-lg-0" style="padding-left: 400px; padding-right:400px">
                <form action="page/info/{{$user->id}}" method="post" class="beta-form-checkout">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}
                                <br>
                            @endforeach
                        </div>
                    @endif
                    @if(Session::has('thanhcong'))
                        <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                    @endif
                    <div class="row mt-3">
                        <label for="email" class="col-lg-4">Email</label> 
                        <input  class="col-lg-8 form_input" type="email" id="email" name="email" value="{{$user->email}}" disabled>
                    </div>
                    <div class="row mt-3">
                        <label for="full_name" class="col-lg-4">Họ và Tên<i style="color: red">*</i></label> 
                        <input class="col-lg-8 form_input" type="text" id="full_name" name="fullname" value="{{$user->full_name}}"
                             required>
                    </div>
                    <div class="row mt-3">
                        <label for="address" class="col-lg-4">Địa chỉ<i style="color: red">*</i></label> 
                        <input class="col-lg-8 form_input" type="text" id="address" name="address" value="{{$user->address}}"
                            required>
                    </div>
                    <div class="row mt-3">
                        <label for="phone" class="col-lg-4">Số điện thoại <i style="color: red">*</i></label> 
                        <input class="col-lg-8 form_input" type="text" id="phone" name="phone" value="{{$user->phone}}" required>
                    </div>
                    <div class="row mt-3">
                        <label for="pwd" class="col-lg-4">Mật khẩu <i style="color: red">*</i></label> 
                        <input type="password" name="password" class="col-lg-8 form_input" id="pwd">
                    </div>
                    <div class="row mt-3">
                        <label for="re_pwd" class="col-lg-4">Nhập lại mật khẩu <i style="color: red">*</i></label> 
                        <input type="password" name="re_password" class="col-lg-8 form_input" id="re_pwd">
                    </div>
                    <hr>
                    <div class="text-center"><button type="submit" name="send" class="button_2">Cập nhật</button></div>
                </form>
            </div>
        </section>
    </main>
@endsection
