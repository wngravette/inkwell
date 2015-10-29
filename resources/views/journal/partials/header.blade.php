<div class="columns header">
    <div class="one-forth column">
        <h1 class="logo">{{config('app.app_name')}}<span class="sep">/</span><span class="menu_btn">{{$page_name}} <i class="fa fa-chevron-down menu_caret"></i></span></h1>
    </div>
    <div class="one-forth column right">
        <p class="header">Welcome, {{Auth::user()->first_name}}<span><a href="/journal/preferences"><i class="fa fa-cog"></i></a><a href="/auth/logout"><i class="fa fa-sign-out"></i></a></span></p>
    </div>
</div>
