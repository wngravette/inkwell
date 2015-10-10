<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Journal. Write every day.</title>
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
        @yield('additional-head')
    </head>
    <body>
        <div class="container">
            @yield('content')
            @include('front.partials.footer')
        </div>
    </body>
</html>
