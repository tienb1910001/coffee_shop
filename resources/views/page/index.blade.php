@extends('master')
@section('content')
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-8">
                    <h1>Welcome to <span>The Grinder</span></h1>
                    <h2>Life is short - drink good coffee</h2>

                    <div class="btns">
                        <a href="page/all-product" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
                        <div class="about-img">
                            <img src="source/assets/dest/images/bussy-coffee-shop.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                        <h3>The Grinder sẽ là nơi mọi người xích lại gần nhau, đề cao giá trị kết nối con người và sẻ chia thân tình bên những tách cà phê, ly trà đượm hương, truyền cảm hứng về lối sống hiện đại.</h3>
                        <p class="fst-italic">
                            Chúng tôi sẽ cùng bạn thưởng thức một bữa cà phê đặc sản Signature hợp gu, kể câu chuyện về hành trình của hạt cà phê từ khi còn là hạt nhân xanh đến khi trở thành ly cà phê trên tay bạn, kết nối mọi người đến gần hơn tới thế giới cà phê dù khách hàng là người ‘mới’ hay là người đã sành sỏi. 
                        </p>
                        <p >Châm ngôn của chúng tôi</p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Kết nối mọi người xích lại gần nhau hơn.</li>
                            <li><i class="bi bi-check-circle"></i> Nuôi dưỡng tình yêu với cà phê và trà Việt.</li>
                            <li><i class="bi bi-check-circle"></i> Truyền cảm hứng về lối sống hiện đại.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->

        <!-- New Product Section -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Sản phẩm mới</h2>
                    <p>
                       Mang đến những hương vị mới lạ
                    </p>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    @foreach ($new_product as $new)
                        <div class="col-sm-3">
                            <div class="single-item">
                                <div class="single-item-header">
                                    <img src="{{ $new->image }}" class="single-item-image">
                                </div>
                                <div class="single-item-content">
                                    <a href="page/product/{{ $new->id }}">{{ $new->name }}</a>
                                </div>
                                <div class="single-item-content">
                                    <span>{{ number_format($new->price_m, 0, '', '.') }} VND</span>
                                </div>
                                <div>
                                    <a href="page/product/{{ $new->id }}">
                                        <div class="button_add_product">Chi tiết</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End New Product Section -->
    </main><!-- End #main -->
@endsection
