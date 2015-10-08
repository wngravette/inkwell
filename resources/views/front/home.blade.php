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
                Journal is for your secure, private, searchable and explorable writing. Free.
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
                Journal let's you be honest with your writing. With plenty of privacy features, you can set a screen-lock, custom password for entries, among other things.
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
                Journal uses OpenSSL and the AES-256-CBC cipher method. This is all fancy-talk which means that the only person getting at your journal entries are you.
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
                Would you like some inspiration? A prompt? Question? Something to go on? We'd be happy to get you sorted. Or, not at all. If you'd like to just write, go ahead.
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
                A journal is good, but often you want to re-visit things. Journal let's you search by term, jump to date or simply explore through the past with each entry.
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
                If you want to save your entries, you can save them all to file quickly and easily. Save a single entry as a text file or PDF, or download your entire archive.
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
                If you'd like to share your entries, or even just one entry, you can do that by setting your profile to public, or allowing certain entries to be publically accessible.
            </p>
        </div>
    </div>
</div>
@endsection
