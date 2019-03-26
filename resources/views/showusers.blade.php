@extends('templates.default')

@section('content')
    <ul class="list-group">
        @forelse($users as $user)
            <li class="list-group-item">{{$user->username}}</li>
        @empty
            <p>Error loading fields!</p>
        @endforelse
    </ul>
@endsection