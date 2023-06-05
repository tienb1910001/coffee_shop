@extends('master')
@section('content')
    <main id="main" style="margin-top: 110px">
        <section id="order" class="menu section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Check Out</h2>
                    <p>
                        Check out your bill
                    </p>
                </div>

                <div class="container mt-5 mt-lg-0">
                    <form method="post" action="page/checkout" class="email-form form_payment">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            @if (Session::has('thongbao'))
                                <div class="alert alert-success">{{ Session::get('thongbao') }}
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="form_payment_info">
                                    <table class="table table-hover" style="margin-top: 27px;">
                                        <thead>
                                            <tr>
                                                <th colspan="4">
                                                    <h1>Thông tin đơn hàng</h1> <br>
                                                    <p style="text-align: left;">Nhân viên: Thang</p>
                                                    <p style="text-align: left;">Ngày đặt hàng: <?php echo date('Y-m-d H:i:s'); ?></p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Sản phẩm</th>
                                                <th scope="col">Size</th>
                                                <th scope="col">Số lượng</th>
                                                <th scope="col">Thành tiền</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (Session::has('cart'))
                                                @foreach ($product_cart as $cart)
                                                    <tr>
                                                        <td style="max-width: 100px"><img width="100%"
                                                                src="{{ $cart['item']['image'] }}" alt=""></td>
                                                        <td>{{ $cart['item']['name'] }} </td>
                                                        <td>{{$cart['size']}}</td>
                                                        <td>{{ $cart['qty'] }}</td>
                                                        <td>{{ number_format($cart['price'], 0, '', '.') }}
                                                            VND
                                                        </td>
                                                        <td><a href="page/deleteCart/{{ $cart['item']['id'] }}">X</a></td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            <tr>
                                                <td colspan="4">
                                                    @if (Session::has('cart'))
                                                        <h3 style="text-align: left;">Tổng tiền:
                                                            {{ number_format($totalPrice, 0, '', '.') }} VND</h3>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <h2
                                    style="background-color: rgba(205, 164, 94, 0.7); padding: 10px 20px; text-align: center;">
                                    Thông tin khách hàng</h2>
                                <div class="row mt-3">
                                    <label for="email" class="col-sm-5">Họ tên khách hàng: <i
                                            style="color: red">*</i></label>
                                    @if (Auth::check())
                                        <div class="col-sm-5"> {{ Auth::user()->full_name }} </div>
                                    @else
                                        <div> </div>
                                    @endif
                                </div>
                                <div class="row mt-3">
                                    <label for="pwd" class="col-sm-5">Địa chỉ nhận hàng: <i
                                            style="color: red">*</i></label>
                                    @if (Auth::check())
                                        <div class="col-sm-5"> {{ Auth::user()->address }} </div>
                                    @else
                                        <div> </div>
                                    @endif
                                </div>
                                <hr>
                                <h2 style="padding: 10px 20px; text-align: center;">Phương thức thanh
                                    toán</h2>
                                <div class="mt-3 row">
                                    <div class="col-lg-7">
                                        <input id="payment_method_bacs" type="radio" class="input-radio"
                                            name="payment_method" value="shipCOD" checked="checked"
                                            data-order_button_text="">
                                        <label for="payment_method_bacs" class="option_size" style="max-width: 100%">Thanh
                                            toán khi nhận hàng</label>

                                    </div>
                                    <div class="col-lg-5">
                                        <input id="payment_method_cheque" type="radio" class="input-radio"
                                            name="payment_method" value="banking" data-order_button_text="">
                                        <label for="payment_method_cheque" class="option_size"
                                            style="max-width: 100%">Chuyển khoản</label>
                                    </div>
                                </div>

                                <div class="text-center mt-3">
                                    @if (Auth::check())
                                        <button type="submit" href="#" class="button_2">Thanh toán</button>
                                    @else
                                        <div class="alert alert-danger">Vui lòng đăng nhập để đặt hàng </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
