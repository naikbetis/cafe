<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Cafe Haagen Dazs Login</title>
    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('/')}}/assets/img/favicon180.png" sizes="180x180">
    <link rel="icon" href="{{asset('/')}}/assets/img/favicon32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="{{asset('/')}}/assets/img/favicon16.png" sizes="16x16" type="image/png">
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('/')}}/assets/css/style.css" rel="stylesheet" id="style">
    <!-- Toaster Notify.CSS Alert -->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
</head>

<body class="body-scroll d-flex flex-column h-100 menu-overlay">

    <!-- Begin page content -->
    <main class="flex-shrink-0 main has-footer">

    <form method="post" action="{{route('auth')}}">    
    @csrf    
        <div class="container h-100 text-white">
            <div class="row h-100">
                <div class="col-12 align-self-center mb-4">
                    <div class="row justify-content-center">
                        <div class="col-11 col-sm-7 col-md-6 col-lg-5 col-xl-4">
                            <h2 class="font-weight-normal mb-5">Login into<br>your account</h2>
                            <div class="form-group float-label">
                                <input type="text" class="form-control text-white" id="login" value="{{old('login')}}" name="login" placeholder="Username/Email" required>
                            </div>

                            <div class="form-group float-label position-relative">
                                <input type="password" class="form-control text-white" id="password" name="password" placeholder="Password" required>
                            </div>  
                            <p class="text-right">
                                <a href="#" class="text-white">Forgot Password?</a>
                            </p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </main>

    <!-- footer-->
    <div class="footer no-bg-shadow py-3">
        <div class="row justify-content-center">
            <div class="col">
                <button type="submit" class="btn btn-default rounded btn-block btn-lg">Login</button>
            </div>
        </div>
    </div>
    </form>

    <!-- Required jquery and libraries -->
    <script src="{{asset('/')}}/assets/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('/')}}/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Toaster Notify.js Alert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> 
    <script type="text/javascript">
      // Toaster Notify
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": true,
          "progressBar": true,
          "positionClass": "toast-top-full-width",
          "preventDuplicates": false,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
    </script>
</body>
</html>
@include('templates.notif')