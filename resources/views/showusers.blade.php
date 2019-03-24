@extends('templates.default')

@section('content')
    <div class="container">
        <h1>{{$title}}: {{count($fields)}}</h1>
        <ul class="list-group">
            @forelse($fields as $user)
                <li class="list-group-item">{{$user}}</li>
            @empty
                <p>Error loading fields!</p>
            @endforelse
        </ul>
    </div>
@endsection