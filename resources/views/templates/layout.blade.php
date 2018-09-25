<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('templates/defaulthead')

    <title>Laravel @yield('title')</title>

<!-- move this to new scss!-->
    <style>
        html {
            height: 100%;
        }

        body {

            height: 100%;
            overflow: hidden;
            background: #2e3441;
            background-image: -webkit-radial-gradient(top, circle cover, #4e7a89, #2e3441 80%);
            background-image: -moz-radial-gradient(top, circle cover, #4e7a89, #2e3441 80%);
            background-image: -o-radial-gradient(top, circle cover, #4e7a89, #2e3441 80%);
            background-image: radial-gradient(top, circle cover, #4e7a89, #2e3441 80%);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>


    @yield('fonts')
    @yield('jsHead')
    @yield('stylesheets')
    @yield('styles')

</head>
<body>
<div class="flex-center position-ref full-height">


    @yield('container')
    @yield('jsFooter')

</div>
<footer>
    @include('templates/footerJsScripts')
</footer>

@include('templates/defaultFooter')
</body>
</html>
