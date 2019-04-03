<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('templates.head')
</head>

<body>
@include('templates.navbar')
@yield('content')
@include('templates.footer')
@include('templates.scripts')
</body>

</html>