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
                Journal never stores your writing unencrypted. If it's saved to our databases, it's encrypted. Encryption of the writing happens server-side, and SSL protects your writing on it's way to us.
            </p>
            <p class="body">
                Journal also encrypts all session and cookie data, and it does a good job to protect what you can send to the servers which means someone trying to stop is going to have a hard time trying to pretend to be you. And of course, your password is encrypted just as thoroughly as your writing.
            </p>
        </div>
    </div>
    <div class="pure-u-1-24">

    </div>
    <div class="pure-u-1 pure-u-md-9-24">
        <div class="l-box generic">
            <p class="lead">
                Here's a Journal entry to us:
            </p>
            <p class="body code">
                BYm1VazAwRzFwVDc3YT3ajJZVzFjVm9OQ1ZRaDNKVXVpVjdtT3pzTEg2Z215Q1NMaWJ2aG4UDk4aGVodBQNno4YzNiem1JSjM5Vkl1QU5QXpYdHdIeVI4VlBIenFjcHA5dFBPZFVxK09KcTVQ0JiWHplMjBOMG9OTZNeFJITnQ0ZytuZFBuelaN2w0aVF3Z3RCUmNSZUlzWlVzNWxlVXVDa
            </p>
            <p class="note">
                Actual encrypted Journal entry
            </p>
        </div>
    </div>
</div>
@endsection
