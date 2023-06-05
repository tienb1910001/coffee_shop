@extends('master')
@section('content')
    <main id="main" style="margin-top: 110px">
        <section id="signup" class="menu section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Login</h2>
                    <p>
                        Login your account
                    </p>
                </div>

                <div class="container mt-5 mt-lg-0" style="padding-left: 350px; padding-right:350px">
                    <form method="post" action="page/login" class="email-form form_payment">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $err)
                                {{ $err }}
                                <br>
                            @endforeach
                        </div>
                        @endif
                        @if (Session::has('flag'))
                            <div class="alert alert-{{ Session::get('flag') }}">{{ Session::get('thongbao') }}</div>
                        @endif
                        <div class="row mt-3">
                            <label for="email" class="col-lg-4">Email <i style="color: red">*</i></label> 
                            <input type="email" name="email" class="col-lg-8 form_input" id="email"
                                placeholder="Ví dụ: 123@gmail.com" required>
                        </div>
                        <div class="row mt-3">
                            <label for="pwd" class="col-lg-4">Mật khẩu <i style="color: red">*</i></label> 
                            <input type="password" name="password" class="col-lg-8 form_input" id="pwd"
                                 required>
                        </div>
                        <hr>
                        <div class="text-center"><button type="submit" name="send" class="button_2">Đăng nhập</button></div>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
