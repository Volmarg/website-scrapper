<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('templates/defaulthead')

    <title>Laravel @yield('title')</title>

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
