<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $settings->descriptions->first()->title ?? 'Orka Group' }}</title>
    <meta name="description" content="{{ $settings->descriptions->first()->description ?? 'Orka Group' }}">
    <meta name="keywords" content="{{ $settings->descriptions->first()->keywords ?? 'orka group' }}">
    @if($settings->favicon)
<link rel="icon" href="{{asset('storage/'.$settings->favicon)}}" type="image/png" sizes="20x20">
    @else
<link rel="icon" href="{{asset('front/img/favicon.svg')}}" type="image/png" sizes="20x20">
    @endif

    @include('front.layout.partials.css')
    @yield('css')
</head>

<body>
    @include('front.layout.master')

    @yield('content')

    @include('front.layout.footer')

    @include('front.layout.partials.js')

    @yield('js')
</body>

</html>
