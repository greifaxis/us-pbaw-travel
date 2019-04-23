@extends('layouts.app')

@section('title','My Profile')
@push('customStyles')
    {{--<link rel="stylesheet" href="{{asset('css/tours.css')}}">--}}
@endpush

@section('content')
    <h3>{{ Auth::user()->firstName }}</h3>
    <h3>{{ Auth::user()->role_id }}</h3>
    {{--@if(Auth::user()->role_id)--}}
        {{--<h5>I am admin! :)</h5>--}}
        {{--@else--}}
        {{--<h5>I am user... :(</h5>--}}
    {{--@endif--}}

    @forelse( json_decode(Auth::user()) as $key=>$value)
        {{$key}} {{$value}} <br>
    @empty
        <h1>Error!</h1>
    @endforelse

    {{--{{dd(Auth::user()->role()->value('description'))}}--}}
@endsection