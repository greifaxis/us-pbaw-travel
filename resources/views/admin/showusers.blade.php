@extends('layouts.app')

@section('title','Show Users')
@push('customStyles')
    <link rel="stylesheet" href="{{asset('css/tours.css')}}">
@endpush
@section('content')
    <ul class="list-group">
        @forelse($users as $user)
            <li class="list-group-item">{{$user->name}}</li>
        @empty
            <p>Error loading fields!</p>
        @endforelse
    </ul>
@endsection