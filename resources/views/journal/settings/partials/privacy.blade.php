@extends('journal.settings.master')
@section('additional_head')
<script>
    $(document).ready( function() {
        $('.app-menu').children().removeClass('selected');
        $('.menu-item.privacy').addClass('selected');
        $('.profile-details').hide();
        $(".profile").change(function() {
            if(this.checked) {
                $('.profile-details').show();
            } else {
                $('.profile-details').hide();
            }
        });
    });
</script>
@endsection
@section('settings_content')
<div class="flash flash-warn">
    Careful! Some of these preferences control who can read your writing.
</div>
<form>
    <div class="form-checkbox">
        <label>
        <input type="checkbox" checked="checked">
        Keep my entries private
        </label>
        <p class="note">
        If this is checked, there's no way you can accidentally open up your writing.
        </p>
    </div>
    <div class="form-checkbox">
        <label>
        <input type="checkbox" class="tooltipped tooltipped-s profile" aria-label="Coming Soon!">
        Enable my public profile
        </label>
        <p class="note">
        Your public profile has some basic stats about your writing (only quantiative data).
        </p>
        <p class="note">
        You can choose to share your writing if your profile is enabled.
        </p>
    </div>
    <dl class="form profile-details">
        <dt><label>Profile URL</label></dt>
        <label>{{env('APP_URL')}}/</label>
        <input class="one-half" type="text" placeholder="First name" value="{{Auth::user()->first_name}}">
    </dl>
</form>
@endsection
