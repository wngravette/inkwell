@extends('front.master')
@section('additional-head')
<script>
$(document).ready(function() {
    $('.header').backstretch(["https://s3-ap-southeast-2.amazonaws.com/willng-me/journal/img/1.jpg",
                                "https://s3-ap-southeast-2.amazonaws.com/willng-me/journal/img/2.jpg",
                                "https://s3-ap-southeast-2.amazonaws.com/willng-me/journal/img/3.jpg",
                                "https://s3-ap-southeast-2.amazonaws.com/willng-me/journal/img/4.jpg",
                                "https://s3-ap-southeast-2.amazonaws.com/willng-me/journal/img/5.jpg",
                                "https://s3-ap-southeast-2.amazonaws.com/willng-me/journal/img/6.jpg",
                                "https://s3-ap-southeast-2.amazonaws.com/willng-me/journal/img/7.jpg",
                                "https://s3-ap-southeast-2.amazonaws.com/willng-me/journal/img/8.jpg"
                            ],{duration: 3500, fade: 750});
});
</script>
@endsection
@section('content')
@include('front.partials.header')
<div class="pure-g catch">
    <div class="pure-u-1">
        <div class="l-box hero">
            <p>
                {{config('app.app_name')}} is for your secure, private, searchable and explorable writing. Free.
            </p>
        </div>
    </div>
</div>
<div class="pure-g reasons">
    <div class="pure-u-1 pure-u-md-8-24">
        <div class="l-box reason">
            <p>
                <i class="fa fa-eye-slash"></i>
            </p>
            <p class="lead">
                Private
            </p>
            <p class="body">
                {{config('app.app_name')}} let's you be honest with your writing. Plenty of privacy features including a screen-lock mean that your writing is just for you.
            </p>
        </div>
    </div>
    <div class="pure-u-1 pure-u-md-8-24">
        <div class="l-box reason">
            <p>
                <i class="fa fa-lock"></i>
            </p>
            <p class="lead">
                Completely Secure
            </p>
            <p class="body">
                {{config('app.app_name')}} uses OpenSSL and the AES-256-CBC cipher method. That all basically means that you are the only person getting at your writing.
            </p>
        </div>
    </div>
    <div class="pure-u-1 pure-u-md-8-24">
        <div class="l-box reason">
            <p>
                <i class="fa fa-smile-o"></i>
            </p>
            <p class="lead">
                Helpful, or not
            </p>
            <p class="body">
                Need a prompt? Something to go on? We'd be happy to get you sorted. Or, not at all. If you'd like to just write, we won't get in the way.
            </p>
        </div>
    </div>
</div>
<div class="pure-g img">
    <div class="pure-u-1">
        <img class="pure-img" src="https://s3-ap-southeast-2.amazonaws.com/willng-me/journal/img/ui/1.jpg">
    </div>
</div>
<div class="pure-g reasons">
    <div class="pure-u-1 pure-u-md-8-24">
        <div class="l-box reason">
            <p>
                <i class="fa fa-search"></i>
            </p>
            <p class="lead">
                Searchable
            </p>
            <p class="body">
                A journal is good, but often you want to re-visit things. {{config('app.app_name')}} let's you search every entry, or jusp straight to a date.
            </p>
        </div>
    </div>
    <div class="pure-u-1 pure-u-md-8-24">
        <div class="l-box reason">
            <p>
                <i class="fa fa-hdd-o"></i>
            </p>
            <p class="lead">
                Exportable
            </p>
            <p class="body">
                If you want to save your entries, you can save them all to file quickly and easily, or, download your entire archive.
            </p>
        </div>
    </div>
    <div class="pure-u-1 pure-u-md-8-24">
        <div class="l-box reason">
            <p>
                <i class="fa fa-share-square-o"></i>
            </p>
            <p class="lead">
                Shareable
            </p>
            <p class="body">
                By default, everything in your {{config('app.app_name')}} is private, but you can allow people to see specific entries, on your entire profile.
            </p>
        </div>
    </div>
</div>
@endsection
