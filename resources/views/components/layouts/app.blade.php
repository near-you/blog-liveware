<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- STYLES -->
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
          rel="stylesheet">

    <title>{{ $title ?? 'Page Title' }}</title>

    <link rel="stylesheet" type="text/css" href="{{asset('css/plugins.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/dark.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>

{{--    <script src="https://kit.fontawesome.com/62c2b4b04a.js" crossorigin="anonymous"></script>--}}

{{--    @vite('resources/css/app.css')--}}
    <!-- /STYLES -->
</head>
<body>

<!-- PRELOADER -->
{{--<div id="preloader">--}}
{{--    <div class="loader_line"></div>--}}
{{--</div>--}}
<!-- /PRELOADER -->

<!-- WRAPPER ALL -->
<div class="tokyo_tm_all_wrap" data-magic-cursor="show" data-enter="fadeInLeft" data-exit="">

    @include('livewire.mobile_navigation')
    @include('livewire.navigation')

    {{ $slot }}


    <!-- CURSOR -->
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>
    <!-- /CURSOR -->

</div>
<!-- / WRAPPER ALL -->

<!-- SCRIPTS -->
<script src="{{asset('js/template/jquery.js')}}"></script>
<!--[if lt IE 10]><script type="text/javascript" src="{{asset('template/js/ie8.js')}}"></script><![endif]-->
<script src="{{asset('js/template/plugins.js')}}"></script>
<script src="{{asset('js/template/init.js')}}"></script>
<!-- /SCRIPTS -->
</body>
</html>
