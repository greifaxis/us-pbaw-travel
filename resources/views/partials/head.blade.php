<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="description" content="">
<meta name="author" content="">

{{--CSRF Token--}}
<meta name="csrf-token" content="{{ csrf_token() }}">
{{--Title--}}
<title>@yield('title')</title>
{{--Scripts--}}
<script src="{{ asset('js/app.js') }}" defer></script>
{{----Styles----}}
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
{{--Custom Style--}}
@stack('customStyles')
