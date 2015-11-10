<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{config('app.app_name')}}. Write every day.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-old-ie-min.css">
        <![endif]-->
        <!--[if gt IE 8]><!-->
            <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
        <!--<![endif]-->
        <link rel="stylesheet" href="{{asset('css/frontend.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="{{asset('js/backstretch.js')}}"></script>
        <script src="https://use.typekit.net/ryr3eiv.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
        <style>
        .centered {
          position: fixed;
          top: 50%;
          left: 50%;
          /* bring your own prefixes */
          transform: translate(-50%, -50%);
        }

        .pure-button {
            margin-top: 1em;
        }

        .error {
            color: #eb6b54
        }
        </style>
        @yield('additional-head')
    </head>
    <body>
        <div class="centered">
            @yield('content')
            @if (count($errors) > 0)
               @foreach ($errors->all() as $error)
                   <p class="error">
                       {{ $error }}
                   </p>
               @endforeach
           @endif
        </div>
    </body>
</html>
