@extends('master')
@section('content')
    <main id="main" style="margin-top: 110px">
        <section id="signup" class="menu section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Register</h2>
                    <p>
                        Create a new account
                    </p>
                </div>

                <div class="container mt-5 mt-lg-0" style="padding-left: 350px; padding-right:350px">
                    <form method="post" action="page/signup" class="email-form form_payment">
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
                            <label for="email" class="col-lg-4">Email <i style="color: red">*</i></label> 
                            <input type="email" name="email" class="col-lg-8 form_input" id="email"
                                placeholder="Ví dụ: 123@gmail.com" required>
                        </div>
                        <div class="row mt-3">
                            <label for="full_name" class="col-lg-4">Họ và Tên<i style="color: red">*</i></label> 
                            <input type="text" name="fullname" class="col-lg-8 form_input" id="full_name"
                                 required>
                        </div>
                        <div class="row mt-3">
                            <label for="address" class="col-lg-4">Địa chỉ<i style="color: red">*</i></label> 
                            <input type="text" name="address" class="col-lg-8 form_input" id="address"
                                required>
                        </div>
                        <div class="row mt-3">
                            <label for="phone" class="col-lg-4">Số điện thoại <i style="color: red">*</i></label> 
                            <input type="text" name="phone" class="col-lg-8 form_input" id="phone"
                                placeholder="Nhập vào số điện thoại 10 số" required>
                        </div>
                        <div class="row mt-3">
                            <label for="pwd" class="col-lg-4">Mật khẩu <i style="color: red">*</i></label> 
                            <input type="password" name="password" class="col-lg-8 form_input" id="pwd"
                                 required>
                        </div>
                        <div class="row mt-3">
                            <label for="re_pwd" class="col-lg-4">Nhập lại mật khẩu <i style="color: red">*</i></label> 
                            <input type="password" name="re_password" class="col-lg-8 form_input" id="re_pwd"
                                required>
                        </div>
                        <hr>
                        <div class="text-center"><button type="submit" name="send" class="button_2">Đăng ký</button></div>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
