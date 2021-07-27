@extends('secondary')
@section('title','Error')
@section('pageTitle', 'Sorry')
@section('content')

 <!-- page content start -->
       <div class="main-container h-100">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 col-md-6 col-lg-4 align-self-center text-center my-3 mx-auto">
                        <div class="icon icon-120 bg-danger-light text-danger rounded-circle mb-3">
                            <img class="img-fluid" src="https://res.cloudinary.com/dfuux8evw/image/upload/v1626200298/haagendazs/logo-sm2.png">
                        </div>
                        <h2 class="display-2">404</h2>
                        <h5 class="text-secondary mb-4 text-uppercase">Page not found </h5>
                        <p class="text-secondary">Page you are looking for is not avaialble kndly recheck URL or try after sometime.</p>
                        <br>
                        <a href="{{route('home')}}" class="btn btn-default rounded">Go back to Home</a>
                    </div>
                </div>
            </div>
        </div>

@endsection