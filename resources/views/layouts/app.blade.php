<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body class="d-flex flex-column h-200">
<div id="app">
    @include('partials.navbar')
    <main role="main" class="flex-shrink-0">
    <div class="container">
        {{--TODO MAYBE: IMPLEMENT GLOBAL MESSAGES--}}
        {{--@include('partials.messages')--}}
        @yield('content')
    </div>
    </main>
    @include('partials.footer')
    @include('partials.scripts')
</div>
</body>
</html>
