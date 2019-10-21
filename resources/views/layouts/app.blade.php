<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100" style="height: 100%">
<head>
    @include('partials.head')
</head>
<body class="d-flex flex-column h-100" style="height: 100%;  display: flex; flex-direction: column;">
<div id="app" style="flex: 1 0 auto;">
    @include('partials.navbar')
    <main role="main" class="flex-shrink-0">
    <div class="container" >
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
