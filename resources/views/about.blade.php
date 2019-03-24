@extends('templates.default')

@section('content')
    <div class="container">
        <br>
        <h1>{{$title}}: {{count($fields)}}</h1>
        {{--<h2>Trim: {{preg_replace('/\s+/', '', $navItems[1])}}</h2>--}}
        <ul class="list-group">
            @forelse($fields as $field)
                <li class="list-group-item">{{$field}}</li>
            @empty
                <p>Error loading fields!</p>
            @endforelse
        </ul>
        <br>
    </div>
@endsection