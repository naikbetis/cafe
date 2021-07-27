@extends('secondary')
@section('title','Store')
@section('pageTitle', 'Store')
@section('content')


<div class="main-container">
    <div class="container mb-2">
    <!-- Slider main container -->
        <div class="swiper-container offerslidetab1">
          <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                @foreach($store as $x)
                <!-- Slides -->
                <div class="swiper-slide">
                    <img class="img-fluid" src="{{$x->urlImage}}" alt="">
                </div>
                @endforeach
               
            </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
    </div>
</div>



<div class="main-container">

    <div class="d-block h-150 pl-3">
        <iframe width="100%" height="150" id="gmap_canvas" src="https://maps.google.com/maps?q=Cilandak%20Town%20Square&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>
    <div class="card-body">
        <h6>{{$store[0]->storeName}}</h6>
        <address>
            {{$store[0]->storeType}}<br>
            {{$store[0]->storeAddress}}<br>
            {{$store[0]->storeArea}}
        </address>
        <p>Ph.: {{$store[0]->storePhone}}</p>
        <div class="custom-control custom-switch">
            <input type="checkbox" name="address" class="custom-control-input" id="address2" checked="true">
            <label class="custom-control-label" for="address2">Active</label>
        </div>
    </div>
       
</div>           


@endsection