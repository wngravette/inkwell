@extends('journal.master')
@section('additional_head')
@endsection
@section('content')
<div class="columns intro">
    <div class="single-column column">
        <h2>Your Preferences</h2>
    </div>
</div>
<div class="columns prefereces">
    <div class="column one-fifth">
        <nav class="app-menu">
          <a class="menu-item details selected" href="/journal/preferences">Account Details</a>
          <a class="menu-item privacy" href="/journal/preferences/privacy">Privacy</a>
          <a class="menu-item notif" href="#">Emails &amp; Notifications</a>
          <a class="menu-item" href="#">Notifications</a>
        </nav>
    </div>
    <div class="column four-fifths prefs-body">
        @yield('settings_content')
    </div>
</div>
<script>
$("form :input").change(function() {
    //alert('you did something');
});
</script>
@endsection
