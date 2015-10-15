<div class="pure-g intro">
    <div class="pure-u-1">
        <div class="l-box header full">
            <h1><a href="/">{{config('app.app_name')}}</a><span class="title"><span class="sep">/</span>Write every day.</span>
                @if ($sign_up_btn)
                <span class="cta"><a class="login" href="/auth/login">Login</a><a class="register" href="/auth/register">Sign up</a></span>
                @endif
            </h1>
        </div>
    </div>
</div>
