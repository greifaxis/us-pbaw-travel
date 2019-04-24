@extends('layouts.app')

@section('title','My Orders')
@push('customStyles')
    {{--<link rel="stylesheet" href="{{asset('css/tours.css')}}">--}}
@endpush

@section('content')
    {{--<br>--}}
    <h1>ZAMOWIENIA</h1>
    {{--<h2>Trim: {{preg_replace('/\s+/', '', $navItems[1])}}</h2>--}}
    {{--<ul class="list-group">--}}
    {{--@forelse($hotels as $hotel)--}}
    {{--<li class="list-group-item">{{$hotel}}</li>--}}
    {{--<div class="well"><h2>{{$hotel->name}}</h2></div>--}}
    {{--@empty--}}
    {{--<p>Error loading hotels!</p>--}}
    {{--@endforelse--}}
    {{--</ul>--}}
    {{--<br>--}}
@endsection