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

    <pre>Yes - this was inherited from main.blade;</pre>

    @yield('container')
    @yield('jsFooter')

</div>
</body>
</html>
