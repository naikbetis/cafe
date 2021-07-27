@if (auth())
<!DOCTYPE HTML>
<html lang="en" class="h-100">
@include('templates.head')
<body class="body-scroll d-flex flex-column h-100 menu-overlay" data-page="homepage">
    @include('templates.loader')
    @include('templates.menu')
    <div class="backdrop"></div>
    <!-- Begin Page Content -->
    <main class="flex-shrink-0 main has-footer">
        @include('templates.header')
        @include('templates.bannerInfo')
        <div class="main-container">
            <!-- Page Content Start -->
            @yield('content')
            <!-- Page Content End -->
        </div>
    </main>
    @include('templates.footerMenu')
    @include('templates.js') 
</body>
</html>
@endif