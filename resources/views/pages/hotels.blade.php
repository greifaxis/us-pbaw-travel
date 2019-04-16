@extends('layouts.app')

@section('title','Hotels')
@push('customStyles')
    <link rel="stylesheet" href="{{asset('css/tours.css')}}">
@endpush

@section('content')
    <!-- Navigation -->

    <!-- Page Content -->

        <div class="row">

            <div class="col-lg-3">
                <h1 class="my-4">Our Hotels</h1>
                <div class="list-group">
                    {{--<a href="#" class="list-group-item active">{{$hotelsFirst->name}}</a>--}}
                    @forelse($hotels as $hotel)
                        @if ($loop->first)
                            <a href="#" class="list-group-item active">{{$hotel->name}}</a>
                        @else
                            <a href="#" class="list-group-item">{{$hotel->name}}</a>
                        @endif
                    @empty
                        <a href="/" class="list-group-item">Home</a>
                    @endforelse
                    <span class="mt-4 align-self-center">{{$hotels->links()}}</span>
                    {{--<a href="#" class="list-group-item">Hotel 3</a>--}}
                </div>
            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">
                @forelse($hotels as $hotel)
                    <div class="card mt-4">
                        <img class="card-img-top img-fluid" src="{{$hotel->image}}" alt="">
                        <div class="card-body">
                            <h3 class="card-title">{{$hotel->name}}
                                <span class="text-warning">
                                @for ($i = 0; $i < $hotel->stars; $i++)
                                        &#9733;
                                    @endfor
                            </span></h3>
                            <p class="card-text text-justify">{{$hotel->body}}</p>
                            <h4>Location: {{$hotel->city}}, {{$hotel->country}}</h4>
                        </div>
                    </div>
                @empty
                    <div class="card mt-4">
                        <div class="card-body">
                            <h3 class="card-title">No hotels to show...</h3>
                        </div>
                    </div>
            @endforelse
                <!-- /.card -->

                <div class="card card-outline-secondary my-4">
                    <div class="card-header">
                        Product Reviews
                    </div>
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore,
                            similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat
                            laborum.
                            Sequi mollitia, necessitatibus quae sint natus.</p>
                        <small class="text-muted">Posted by Anonymous on {{$hotels[0]->created_at}}</small>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore,
                            similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat
                            laborum.
                            Sequi mollitia, necessitatibus quae sint natus.</p>
                        <small class="text-muted">Posted by Anonymous on {{$hotels[0]->created_at}}</small>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore,
                            similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat
                            laborum.
                            Sequi mollitia, necessitatibus quae sint natus.</p>
                        <small class="text-muted">Posted by Anonymous on {{$hotels[0]->created_at}}</small>
                        <hr>
                        <a href="#" class="btn btn-success">Leave a Review</a>
                    </div>
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col-lg-9 -->

        </div>

    <!-- /.container -->

    <!-- Footer -->

    <!-- Bootstrap core JavaScript -->
    {{--<script src="vendor/jquery/jquery.min.js"></script>--}}
    {{--<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>--}}

@endsection
