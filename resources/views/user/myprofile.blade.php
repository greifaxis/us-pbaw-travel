@extends('layouts.app')

@section('title','My Profile')
@push('customStyles')
    {{--<link rel="stylesheet" href="{{asset('css/tours.css')}}">--}}
@endpush

@section('content')
    {{--<h3>{{ Auth::user() }}</h3>--}}
    @forelse( json_decode(Auth::user()) as $key=>$value)
        {{$key}} {{$value}} <br>
    @empty
        <h1>Error!</h1>
    @endforelse
@endsection