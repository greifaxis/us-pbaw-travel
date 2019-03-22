{{--TODO Create complete default template--}}

        <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--<link rel="stylesheet" href="css/app.css">--}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>About</title>
</head>
<body>
{{--TODO Import navbar from offers and update--}}
@include('templates.navbar')
@yield('content')
</body>
</html>