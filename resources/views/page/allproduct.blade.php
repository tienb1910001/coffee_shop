@extends('master')
@section('content')
    <main id="main" style="margin-top: 110px">
        <!-- ======= Menu Section ======= -->
        <section id="shopping" class="menu section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Menu</h2>
                    <p>
                        Check Our Menu
                    </p>
                </div>

                <form action="" method="GET">
                    <div class="input-group mt-3 mb-3">
                        <input type="search" class="form-control" name="search_product" placeholder="Nhập tên sản phẩm"
                            style=" max-width: 500px; background-color:#000000; color:#fff; margin-left: 800px" />
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"
                            style="background-color:#000000; color:#cda45e;">Tìm</button>
                    </div>
                </form>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="menu-flters">
                            <li data-filter="*" class="filter-active">Tất cả</li>
                            <li data-filter=".filter-1">Cà phê</li>
                            <li data-filter=".filter-2">Trà</li>
                            <li data-filter=".filter-3">Special</li>
                            <li data-filter=".filter-4">Bánh</li>
                        </ul>
                    </div>
                </div>

                <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($product as $pro)
                        <div class="col-md-6 menu-item filter-{{ $pro->id_type }}">
                            <img src="{{ $pro->image }}" class="menu-img">
                            <div class="menu-content">
                                <a href="page/product/{{ $pro->id }}">{{ $pro->name }}</a>
                                <span>{{ number_format($pro->price_m, 0, '', '.') }} VND</span>
                            </div>
                            <div class="menu-ingredients">
                                {{ $pro->ingredients }}
                                <a href="page/product/{{ $pro->id }}">
                                    <div
                                        style="
                                            float:right;
                                            width:100px;
                                            background: #cda45e;
                                            border: 0;
                                            color: #fff;
                                            transition: 0.4s;
                                            border-radius: 20px;
                                            text-align: center;">
                                        Chi tiết</div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Menu Section -->

    </main><!-- End #main -->
@endsection
