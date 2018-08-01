<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    @yield('jsHead')
    @yield('css')
    @yield('styles')
</head>
<body>
<div class="flex-center position-ref full-height">


    @yield('container')
    @yield('jsFooter')

</div>
</body>
</html>
