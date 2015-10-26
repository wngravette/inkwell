@extends('front.master')
@section('additional-head')
<script>
$(document).ready(function() {
    $('.header').backstretch("https://s3-ap-southeast-2.amazonaws.com/willng-me/journal/img/6.jpg");
});
</script>
@endsection
@section('content')
@include('front.partials.header')
<div class="pure-g catch">
    <div class="pure-u-1">
        <div class="l-box hero">
            <p>
                {{config('app.app_name')}} is a palce to write every day. It's secure, it's private, and it's free.
            </p>
        </div>
    </div>
</div>
<div class="pure-g reasons">
    <div class="pure-u-1 pure-u-md-14-24">
        <div class="l-box generic">
            <p class="lead">
                Writing is good for us.
            </p>
            <p class="body">
                How long have journals been a thing? Forever, and there's a reason. This particular kind of writing, known as 'free-writing' is the process of writing openly with no particular objective or desired outcome. Generally speaking, perhaps you might want to write about your day, your situation, or perhaps you'll have no idea how to begn an entry at all. But, as you write more and more, you'll find yourself get better and better at begining your journal, and simply not stopping.
            </p>
        </div>
    </div>
    <div class="pure-u-1-24">

    </div>
    <div class="pure-u-1 pure-u-md-9-24">
        <div class="l-box generic">
            <p class="lead">
                {{config('app.app_name')}} is free.
            </p>
            <p class="body">
                But it can't operate with support. If you'd like to support us, please, click here.
            </p>
        </div>
    </div>
</div>
@endsection
