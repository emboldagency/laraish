<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="red">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="black">

    <?php echo wp_site_icon() ?>
    <link rel="stylesheet" href="{{ public_url('css/app.css') }}">
    <link rel="stylesheet" href="{{ get_stylesheet_uri() }}">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    @yield('head')
    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>

@if(env('APP_ENV') === 'production')
    <script>
        // scripts only should be ran on production server.
    </script>
@endif

<div class="site">
    @include('partials.header')
    @include('partials.mobile-nav')

    <main class="site-main">
        @yield('content')
    </main>

    @include('partials.footer')
</div>

@yield('footer')
<?php wp_footer();?>
<script src="{{ public_url('js/app.js') }}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</body>
</html>