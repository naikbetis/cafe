
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Cafe - Store | Haagen Dazs Indonesia">
    <meta name="author" content="Septryan Dwi Putro">
    <meta name="generator" content="Haagen Dazs Indonesia">
    <title>@yield('title')</title>
    <!-- Manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Favicons -->
    <link rel="icon" type="image/png" href="https://res.cloudinary.com/dfuux8evw/image/upload/v1626200297/haagendazs/favicon.png" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Material icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Custom styles for this template -->
    <link href="{{asset('/')}}/assets/css/style.css" rel="stylesheet" id="style">
    <!-- Toaster Notify.CSS Alert -->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <style type="text/css">
        a:link { text-decoration: none; }
        a:visited { text-decoration: none; }
        a:hover { text-decoration: none; }
        a:active { text-decoration: none; }
    </style>
    @laravelPWA
    @stack('styles')
</head>