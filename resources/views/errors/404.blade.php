<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://use.typekit.net/ryr3eiv.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
        <link rel="stylesheet" href="{{asset('css/animate.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/primer.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/app.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/font-awesome/css/font-awesome.min.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="{{asset('js/elastic.js')}}"></script>
        <script src="{{asset('js/timeago.js')}}"></script>
        <title>Journal / 404</title>
        @yield('additional_head')
        <script>
        $(document).ready(function() {
            $(".timeago").timeago();
            $('.menu').hide();

            $('span.menu_btn').on('click', function() {
                $('.header_menu').slideToggle(300);
                $('i.menu_caret').toggleClass('caret_rotate');
            });
        });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="columns header">
                <div class="one-forth column">
                    <h1 class="logo">Journal<span class="sep">/</span><span class="menu_btn">404. There's nothing here.</span></h1>
                </div>
            </div>
        </div>
    </body>
</html>
