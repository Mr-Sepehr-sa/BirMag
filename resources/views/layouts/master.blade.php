<!DOCTYPE html>
<html lang="en">

<head>
    <title>Birmag @yield('title')</title>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="سایت خبری بیرمگ (Birmag) بزرگترین سایت خبری خاورمیانه در حوزه تکنولوژِی">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,600,700%7CSource+Sans+Pro:400,600,700' rel='stylesheet'>

    <!-- Css -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/font-icons.css" />
    <link rel="stylesheet" href="/css/style.css" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="/img/favicon.png">
    <link rel="apple-touch-icon" href="/img/apple-icon.png">

    <!-- Lazyload (must be placed in head in order to work) -->
    <script src="/js/lazysizes.min.js"></script>

    @yield('head')

</head>

<body class="bg-light style-default style-rounded">

<!-- Preloader -->
<div class="loader-mask">
    <div class="loader">
        <div></div>
    </div>
</div>

<!-- Bg Overlay -->
<div class="content-overlay"></div>

@include('layouts.sidenav')

<main class="main oh" id="main">

    @include('layouts.header')


    <!-- Trending Now -->
    @include('layouts.trendnews')



    @yield('content')


    <!-- Footer -->
    @include('layouts.footer')

    <div id="back-to-top">
        <a href="#top" aria-label="Go to top"><i class="ui-arrow-up"></i></a>
    </div>

</main> <!-- end main-wrapper -->


<!-- jQuery Scripts -->
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/easing.min.js"></script>
<script src="/js/owl-carousel.min.js"></script>
<script src="/js/flickity.pkgd.min.js"></script>
<script src="/js/twitterFetcher_min.js"></script>
<script src="/js/jquery.newsTicker.min.js"></script>
<script src="/js/modernizr.min.js"></script>
<script src="/js/scripts.js"></script>

@yield('script')

</body>

</html>