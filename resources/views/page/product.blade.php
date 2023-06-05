@extends('master')
@section('content')
    <main id="main" style="margin-top: 110px">
        <section id="product" class="menu section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Product</h2>
                    <p>
                        Thông tin sản phẩm
                    </p>
                </div>

                <div class="container mt-5 mt-lg-0">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="{{ $sanpham->image }}" class="container">
                        </div>
                        <div class="col-lg-5">
                            <form action="page/addCart/{{ $sanpham->id }}">
                                <h2>{{ $sanpham->name }}</h2>
                                <h3 style="color:#cda45e">{{ number_format($sanpham->price_m, 0, '', '.') }} VND</h3>
                                <p>Chọn size</p>
                                @if ($sanpham->id_type != 4)
                                    <div class="row mb-3">
                                        <div class="col-lg-5">
                                            <input type="radio" name="size" id="sizeM" value="M" checked>
                                            <label for="sizeM" class="option_size">
                                                Nhỏ + 0 VND
                                            </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="radio" name="size" id="sizeL" value="L">
                                            <label for="sizeL" class="option_size">
                                                Lớn + {{ number_format($sanpham->price_l - $sanpham->price_m, 0, '', '.') }}
                                                VND
                                            </label>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="size" id="sizeM" value="M" checked>
                                        <label for="sizeM">
                                            Nhỏ + 0 VND
                                        </label>
                                    </div>
                                @endif
                                <button type="submit" class="button_3">Đặt hàng</button>
                            </form>
                        </div>
                        <div class="col-lg-3">
                            <div class="widget_title">
                                Sản phẩm mới
                            </div>
                            @foreach ($new_product as $new)
                                <div class="row mt-3">
                                    <div class="col-lg-5">
                                        <img src="{{ $new->image }}" class="widget_picture">
                                    </div>
                                    <div class="col-lg-7">
                                        <a href="page/product/{{ $new->id }}">{{ $new->name }}</a>
                                        <br>
                                        <span>{{ number_format($new->price_m, 0, '', '.') }} VND</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="mt-3 container">
                        <h1>Mô tả sản phẩm</h1>
                        <p>{{ $sanpham->description }}</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
