@if (auth())
@extends('main')
@section('title','Home')
@section('pageTitle', 'Dashboard')
@section('content')
	{{-- @include('templates.swipperMenu') --}}
    {{-- @include('templates.swipperLayout') --}}
    @include('templates.onlineOrderMenu')
    @include('templates.mainMenu')
    @include('templates.voucherListHome')
    {{-- @include('templates.aboutUs') --}}
@endsection
@endif