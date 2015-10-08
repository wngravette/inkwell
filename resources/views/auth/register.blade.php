@extends('front.master')
@section('additional-head')
<script>
$(document).ready(function() {
    $('.header').backstretch("https://s3-ap-southeast-2.amazonaws.com/willng-me/journal/img/7.jpg");
});
</script>
<script src="{{asset('pkg/login-pack/js/index.js')}}">
    var login_modal = true;
</script>
<link rel="stylesheet" href="{{asset('pkg/login-pack/css/style.css')}}">
<link rel="stylesheet" href="{{asset('pkg/login-pack/css/normalize.css')}}">
@endsection
@section('content')
@include('front.partials.header')
<!--
<div class="pure-g">
    <div class="pure-u-1 pure-u-lg-10-24">
        <div class="l-box">
            <form method="POST" action="/auth/register" class="pure-form pure-form-stacked">
                {!! csrf_field() !!}
                <div class="pure-g">
                    <div class="pure-u-1">
                        <input id="first-name" class="pure-u-23-24" type="text" name="first_name" placeholder="First Name" required>
                    </div>
                    <div class="pure-u-1">
                        <input id="last-name" class="pure-u-23-24" type="text" name="last_name" placeholder="Last Name">
                    </div>
                    <div class="pure-u-1">
                        <input id="email" class="pure-u-23-24" type="email" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="pure-u-1">
                        <input id="password" class="pure-u-23-24" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="pure-u-1">
                        <input id="confirm" class="pure-u-23-24" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                </div>
                <div class="pure-u-1 pure-controls">
                    <button type="submit" class="pure-button pure-button-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
-->
@include('auth.partials.auth-block')
@endsection
