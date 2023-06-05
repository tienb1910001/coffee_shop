<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grinder</title>
    <link href="source/assets/dest/images/The Grinder.png" rel="icon">
    <link href="source/assets/dest/images/apple-touch-icon.png" rel="apple-touch-icon">

    <base href="{{ asset('') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="source/assets/dest/vendors/animate.css/animate.min.css" rel="stylesheet">
    <link href="source/assets/dest/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="source/assets/dest/vendors/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="source/assets/dest/vendors/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="source/assets/dest/vendors/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="source/assets/dest/vendors/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="source/assets/dest/css/style.css" rel="stylesheet">
</head>

<body>

    @include('header')
    <div>
        @yield('content')
    </div>
    @include('footer')

    <!-- Vendor JS Files -->
    <script src="source/assets/dest/vendors/aos/aos.js"></script>
    <script src="source/assets/dest/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="source/assets/dest/vendors/glightbox/js/glightbox.min.js"></script>
    <script src="source/assets/dest/vendors/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="source/assets/dest/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="source/assets/dest/vendors//php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="source/assets/dest/js/main.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</body>

</html>
