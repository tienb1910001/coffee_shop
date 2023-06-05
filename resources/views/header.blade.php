<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-cente">
    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex justify-content-center justify-content-md-between">

            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-phone d-flex align-items-center"><span>+84 916 773 523</span></i>
                <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 8AM - 23PM</span></i>
            </div>
        </div>
    </div>
    <!-- ======= End Top Bar ======= -->

    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

        <h1 class="logo me-auto me-lg-0"><a href="page">The Grinder</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link" href="page">Trang chủ</a></li>
                <li><a class="nav-link" href="page/all-product">Menu</a></li>
                <li><a class="nav-link" href="page/contact">Liên hệ</a></li>
                @if (Auth::check())
                <li><a class="nav-link" href="page/info/{{Auth::user()->id}}"><i class="fa fa-user"></i>{{ Auth::user()->full_name }}</a>
                    </li>
                    <li>
                        <a class="nav-link" href="page/checkout">Giỏ hàng
                            (@if (Session::has('cart'))
                                {{ Session('cart')->totalQty }}
                            @else
                                0
                            @endif )
                        </a>
                    </li>
                    <li><a class="nav-link" href="page/logout">Đăng xuất</a></li>
                @else
                    <li><a class="nav-link" href="page/signup">Đăng ký</a></li>
                    <li><a class="nav-link" href="page/login">Đăng nhập</a></li>
                    <li>
                        <a class="nav-link" href="page/checkout">Giỏ hàng
                            (@if (Session::has('cart'))
                                {{ Session('cart')->totalQty }}
                            @else
                                0
                            @endif )
                        </a>
                    </li>
                @endif
            </div>
        </div>
        </li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->
