@extends('front.master')
@section('additional-head')
<script>
$(document).ready(function() {
    $('.header').backstretch("https://s3-ap-southeast-2.amazonaws.com/willng-me/journal/img/7.jpg");
});
</script>
<script src="{{asset('pkg/login-pack/js/index.js')}}"></script>
<link rel="stylesheet" href="{{asset('pkg/login-pack/css/style.css')}}">
<link rel="stylesheet" href="{{asset('pkg/login-pack/css/normalize.css')}}">
@endsection
@section('content')
@include('front.partials.header')
@include('auth.partials.auth-block')
@endsection
