<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body>
<div id="app">
    @include('partials.navbar')
    <div class="container">
        {{--TODO Think aboout implementing this messages--}}
        {{--@include('partials.messages')--}}
        @yield('content')
    </div>
    @include('partials.footer')
    @include('partials.scripts')
</div>
</body>
</html>
