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
        <script>
        $(document).ready(function() {
            $('.header').backstretch(["https://s3-ap-southeast-2.amazonaws.com/willng-me/journal/img/1.jpg",
                                        "https://s3-ap-southeast-2.amazonaws.com/willng-me/journal/img/2.jpg",
                                        "https://s3-ap-southeast-2.amazonaws.com/willng-me/journal/img/3.jpg",
                                        "https://s3-ap-southeast-2.amazonaws.com/willng-me/journal/img/4.jpg",
                                        "https://s3-ap-southeast-2.amazonaws.com/willng-me/journal/img/5.jpg",
                                        "https://s3-ap-southeast-2.amazonaws.com/willng-me/journal/img/6.jpg"
                                    ],{duration: 3500, fade: 750});
        });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="pure-g intro">
                <div class="pure-u-1">
                    <div class="l-box header">
                        <h1>Journal<span class="title"><span class="sep">/</span>Write every day.</span><span class="cta">Sign up</span></h1>
                    </div>
                </div>
            </div>
            <div class="pure-g catch">
                <div class="pure-u-1">
                    <div class="l-box hero">
                        <p>
                            Journal is your secure, private, searchable and explorable journal. Free.
                        </p>
                    </div>
                </div>
            </div>
            <div class="pure-g reasons">
                <div class="pure-u-1 pure-u-md-8-24">
                    <div class="l-box reason">
                        <p>
                            <i class="fa fa-eye-slash"></i>
                        </p>
                        <p class="lead">
                            Private
                        </p>
                        <p class="body">
                            Journal let's you be honest with your writing. With plenty of privacy features, you can set a screen-lock, custom password for entries, among other things.
                        </p>
                    </div>
                </div>
                <div class="pure-u-1 pure-u-md-8-24">
                    <div class="l-box reason">
                        <p>
                            <i class="fa fa-lock"></i>
                        </p>
                        <p class="lead">
                            Completely Secure
                        </p>
                        <p class="body">
                            Journal uses OpenSSL and the AES-256-CBC cipher method. This is all fancy-talk which means that the only person getting at your journal entries are you.
                        </p>
                    </div>
                </div>
                <div class="pure-u-1 pure-u-md-8-24">
                    <div class="l-box reason">
                        <p>
                            <i class="fa fa-smile-o"></i>
                        </p>
                        <p class="lead">
                            Helpful, or not
                        </p>
                        <p class="body">
                            Would you like some inspiration? A prompt? Question? Something to go on? We'd be happy to get you sorted. Or, not at all. If you'd like to just write, go ahead.
                        </p>
                    </div>
                </div>
            </div>
            <div class="pure-g img">
                <div class="pure-u-1">
                    <img class="pure-img" src="https://s3-ap-southeast-2.amazonaws.com/willng-me/journal/img/ui/1.jpg">
                </div>
            </div>
        </div>
    </body>
</html>
