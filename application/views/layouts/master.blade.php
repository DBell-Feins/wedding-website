<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Liz and Dave's Wedding!</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link href="//fonts.googleapis.com/css?family=Droid+Serif:400,700" rel="stylesheet" type="text/css">
        <link href="//fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet" type="text/css">
        <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet" type="text/css">

        @section('css')
            {{ Asset::container('header')->styles() }}
            <!--[if IE 7]>
                {{ Asset::container('header.ie7')->styles() }}
            <![endif]-->
        @yield_section

        @section('header-js')
            {{ Asset::container('header')->scripts() }}
        @yield_section

    </head>
    <body>
        @include('partials.menu')
        <section class="container">
            @include('partials.notifications')
            @yield('content')
        </section>
        <!-- JS -->
        <img id="hzDownscaled" style="position: absolute; top: -10000px;">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script>window.jQuery || document.write("{{ URL::base() . '/js/vendor/jquery-1.9.0.min.js'; }}");</script>

        @section('footer')
            {{ Asset::container('footer')->scripts() }}
        @yield_section


        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>