<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin page</title>
    <link rel="icon" type="image/x-icon" href="source/assets/dest/images/logo-admin.jpg">
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   
</head>
<style>
    table tr td:last-child {
        width: 120px;
    }

    table tr td a {
        padding: 5px;
    }
    table {
        border-radius: 50% ;
    }
    a {
        text-decoration: none;
    }

</style>
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="admin/">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/user">Người dùng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/bill">Hóa đơn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/type">Loại sản phẩm</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-xxl bd-gutter mt-3 my-md-4 bd-layout "> 
            <div class="main">
                @yield('content')
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
</body>

</html>
