<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
    </head>
    <body>
        <form method="POST" action="/auth/login">
            {!! csrf_field() !!}

            <div>
                Email
                <input type="email" name="email" value="{{ old('email') }}">
            </div>

            <div>
                Password
                <input type="password" name="password">
            </div>

            <div>
                <button type="submit">Login</button>
            </div>
        </form>
    </body>
</html>
