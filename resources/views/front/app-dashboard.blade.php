<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('front.layout.partials.userdashboard.css')
    @yield('css')
    <title>Orka Group</title>
    <link rel="icon" href="{{asset('front/img/favicon.svg')}}" type="image/gif" sizes="20x20">
</head>
<body class="tt-magic-cursor style-2">
    @yield('content')
    @include('front.layout.partials.userdashboard.js')
    @yield('js')
</body>
</html>