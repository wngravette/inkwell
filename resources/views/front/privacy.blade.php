@extends('front.master')
@section('additional-head')
<script>
$(document).ready(function() {
    $('.header').backstretch("https://s3-ap-southeast-2.amazonaws.com/willng-me/journal/img/5.jpg");
});
</script>
@endsection
@section('content')
@include('front.partials.header')
<div class="pure-g catch">
    <div class="pure-u-1">
        <div class="l-box hero">
            <p>
                We have no access to your writing, or your account credentials.
            </p>
        </div>
    </div>
</div>
<div class="pure-g reasons">
    <div class="pure-u-1 pure-u-md-14-24">
        <div class="l-box generic">
            <p class="lead">
                Your writing is encrypted, and no method exists for us to decrypt it.
            </p>
            <p class="body">
                {{config('app.app_name')}} never stores your writing unencrypted. If it's saved to our databases, it's encrypted. Encryption of the writing happens server-side, and SSL protects your writing on it's way to us.
            </p>
            <p class="body">
                {{config('app.app_name')}} also encrypts all session and cookie data, and locks all of your information down tight to stop prying fingers making their way to your writing. Your password and wiritng statistics are borth either encrypted just like your writing, or dervied from your writing directly, meaning either way, nobodies getting at that either!
            </p>
        </div>
    </div>
    <div class="pure-u-1-24">

    </div>
    <div class="pure-u-1 pure-u-md-9-24">
        <div class="l-box generic">
            <p class="lead">
                Here's an {{config('app.app_name')}} entry to us:
            </p>
            <p class="body code">
                BYm1VazAwRzFwVDc3YT3ajJZVzFjVm9OQ1ZRaDNKVXVpVjdtT3pzTEg2Z215Q1NMaWJ2aG4UDk4aGVodBQNno4YzNiem1JSjM5Vkl1QU5QXpYdHdIeVI4VlBIenFjcHA5dFBPZFVxK09KcTVQ0JiWHplMjBOMG9OTZNeFJITnQ0ZytuZFBuelaN2w0aVF3Z3RCUmNSZUlzWlVzNWxlVXVDa
            </p>
            <p class="note">
                Actual encrypted {{config('app.app_name')}} entry
            </p>
        </div>
    </div>
</div>
@endsection
