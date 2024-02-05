<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{$description}}">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{!! $icon2 !!}">

    <!-- Bootstrap core CSS -->
    <link href="/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/frontend/css/modern-business.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/backend/bower_components/font-awesome/css/font-awesome.min.css">

</head>

<body>

<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
            <img class="img-fluid rounded" src="/images/settings/{{$logo}}" alt="" width="50">
        <a class="navbar-brand" href="{{route('home.Index')}}">Mezun Bilgi sistemi</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.Index')}}">Anasayfa</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/page/{{$slug}}">Duyurular</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('blog.Index')}}">İş Bulma</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('search.Index')}}">Öğrenci Arama</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact.Detail')}}">Bize Ulaşın</a>
                </li>

                <a href="{{route('admin.Logout')}}"><button type="button"  class="btn btn-danger btn-sm">Çıkış Yap</button>
                </a>
            </ul>
        </div>
    </div>
</nav>


@yield('content')
<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">{{$footer}}</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="/frontend/vendor/jquery/jquery.min.js"></script>
<script src="/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/js/custom.js"></script>

</body>

</html>
