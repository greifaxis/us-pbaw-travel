<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('templates.head')
</head>

<body>
@include('templates.navbarUser')
<div class="container">
    @include('templates.messages')
    @yield('content')
</div>
@include('templates.footer')
@include('templates.scripts')
</body>

</html>