@extends('layouts.app')

@section('title','Tours')
@push('customStyles')
    {{--<link rel="stylesheet" href="{{asset('css/tours.css')}}">--}}
@endpush

@section('content')
    <div class="row">

        <div class="col-lg-3 mt-4">
            <div class="row">
                <div class="col-12 h1 text-center">Our Tours</div>
            </div>

            @can('create', App\Offer::class)
                <div class="row">
                    <div class="col-sm-8 offset-2">
                        <a href="{{route('tours.create')}}" class="btn btn-outline-dark btn-block align-content-center p-2"><i class="fas fa-plus-square fa-lg"></i> ADD OFFER</a>
                    </div>
                </div>
{{--BOOKED--}}
                <div class="row mb-2 mt-3">
                    <div class="panel-group col-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" href="#tour-list-full" class="btn btn-dark btn-block" id="tour-list-full-toggle"><i id="tour-list-full-arrow" class="fas mr-1 fa-chevron-circle-down"></i>Fully booked</a>
                                </h5>
                            </div>
                            <div id="tour-list-full" class="panel-collapse collapse show">
                                <ul class="list-group">
                                    @forelse($offersFull as $offer)
                                        <a href="#offer-card-full-{{$offer->id}}" class="list-group-item list-group-item-action py-1 text-truncate scroll-action">{{$offer->name}}</a>
                                    @empty
                                        <a href="/" class="btn btn-outline-dark">Home</a>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
{{--AVAILABLE--}}
                <div class="row">
                    <div class="panel-group col-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" href="#tour-list" class="btn btn-dark btn-block" id="tour-list-toggle"><i id="tour-list-arrow" class="fas mr-1 fa-chevron-circle-down"></i>Available</a>
                                </h5>
                            </div>
                            <div id="tour-list" class="panel-collapse collapse show">
                                <ul class="list-group">
                                    @forelse($offers as $offer)
                                        <a href="#offer-card-{{$offer->id}}" class="list-group-item list-group-item-action py-1 text-truncate scroll-action">{{$offer->name}}</a>
                                    @empty
                                        <a href="/" class="btn btn-outline-dark">Home</a>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="panel-group col-12">
                        <div class="panel panel-default">
                            <div class="row my-2">
                                <div class="col-sm-8 offset-2">
                                    <a href="{{route('tours.create')}}" class="btn btn-outline-dark btn-block align-content-center p-2"><i class="fas fa-plus-square fa-lg"></i> ADD OFFER</a>
                                </div>
                            </div>
                            <div class="panel-heading">

                                <h5 class="panel-title">
                                    {{--<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#tourlist">Tours list</button>--}}
                                    <a data-toggle="collapse" href="#tour-list" class="btn btn-dark btn-block" id="tour-list-toggle"><i id="tour-list-arrow" class="fas mr-1 fa-chevron-circle-down"></i>Available tours</a>
                                </h5>
                            </div>
                            <div id="tour-list" class="panel-collapse collapse show">
                                <ul class="list-group">
                                    @forelse($offers as $offer)
                                        <a href="#offer-card-{{$offer->id}}" class="list-group-item list-group-item-action py-1 text-truncate scroll-action">{{$offer->name}}</a>
                                    @empty
                                        <a href="/" class="btn btn-outline-dark">Home</a>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        </div>

        <div class="col-lg-9 my-4">
        @cannot('create',App\Offer::class)
        <div class="row mx-1 mb-4 p-0">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    @forelse($best_offers as $best_offer)
                    <div class="carousel-item {{$loop->first ? ' active' : ''}}">
                        <a href="{{route('tours.show',$best_offer->id)}}">
                        <img class="d-block img-fluid rounded" src="{{json_decode($best_offer->images,true)[0]}}" alt="First slide">
                        <div class="carousel-caption mx-auto">
                            <h3><span class="bg-black-50 px-1">{{$best_offer->name}} {{!empty($best_offer->sale) ? $best_offer->sale : $best_offer->price}} zł</span></h3>
                            <p><span class="bg-black-50 px-1">Only {{$best_offer->places_free}} place{{$best_offer->places_free >= 2 ? 's ' : ' '}}left!</span></p>
                        </div>
                        </a>
                    </div>
                    @empty

                    @endforelse
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        @endcannot

        <div class="row">
            @can('create', App\Offer::class)

            @forelse($offersFull as $offer)
                <div class="col-lg-6 col-md-12 mb-4" id="offer-card-full-{{$offer->id}}">
                    <div class="card h-100">
                        @cannot('create',App\Offer::class)
                            <img class="card-img-top" src="{{json_decode($offer->images,true)[0]}}" alt="">
                        @endcannot
                        <div class="card-body">
                            <h4 class="card-title">
                                {{$offer->name}}
                            </h4>
                            <h5><i class="fas fa-calendar mr-1"></i>{{$offer->date_begin->format('j F Y')}} - {{$offer->date_end->format('j F Y')}}</h5>
                            <p class="card-text text-justify">{{$offer->highlight}}</p>
                            <div class="my-auto">
                                <p class="card-text text-truncate"><a href="{{route('hotels.index')}}#hotel-card-{{$offer->hotel()->value('id')}}" class="text-dark"><i class="fas fa-home mr-1"></i>{{$offer->hotel()->value('name').', '.$offer->hotel()->value('city')}}
                                        @for ($i = 0; $i < $offer->hotel()->value('stars'); $i++)
                                            &#9733;
                                        @endfor
                                    </a></p>
                                <p class="card-text{{$offer->places_free<=3 ? ' text-danger' : ''}}"><i class="fas fa-users mr-1"></i>Places left: {{$offer->places_free}}</p>
                                <p class="card-text"><i class="fas fa-plane mr-1"></i>{{$offer->airport}}</p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col d-flex align-items-center">
                                    @if(empty($offer->sale))
                                        <span class="h6 my-auto">{{$offer->price}} zł</span>
                                    @else
                                        <span class="h6 my-auto" style="text-decoration: line-through;">{{$offer->price}} zł</span><span class="h6 my-auto ml-1 text-danger"> {{$offer->sale}} zł</span><span class="small my-auto ml-1 px-1 text-white bg-danger">-{{number_format(($offer->price-$offer->sale)*100/$offer->price,0)}}%</span>
                                    @endif
                                </div>
                                <div class="col-5 text-right">
                                    <a href="{{route('tours.show',$offer->id)}}" class="btn btn-outline-dark"><i class="fas fa-info-circle mr-1"></i>DETAILS</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="card mt-4">
                    <div class="card-body">
                        <h3 class="card-title">No offers to show...</h3>
                    </div>
                </div>
            @endforelse
            @endcan
            @forelse($offers as $offer)
                <div class="col-lg-6 col-md-12 mb-4" id="offer-card-{{$offer->id}}">
                    <div class="card h-100">
                        @cannot('create',App\Offer::class)
                        <img class="card-img-top" src="{{json_decode($offer->images,true)[0]}}" alt="">
                        @endcannot
                        <div class="card-body">
                            <h4 class="card-title">
                                {{$offer->name}}
                            </h4>
                            <h5><i class="fas fa-calendar mr-1"></i>{{$offer->date_begin->format('j F Y')}} - {{$offer->date_end->format('j F Y')}}</h5>
                            <p class="card-text text-justify">{{$offer->highlight}}</p>
                            <div class="my-auto">
                            <p class="card-text text-truncate"><a href="{{route('hotels.index')}}#hotel-card-{{$offer->hotel()->value('id')}}" class="text-dark"><i class="fas fa-home mr-1"></i>{{$offer->hotel()->value('name').', '.$offer->hotel()->value('city')}}
                                @for ($i = 0; $i < $offer->hotel()->value('stars'); $i++)
                                    &#9733;
                                @endfor
                            </a></p>
                            <p class="card-text{{$offer->places_free<=3 ? ' text-danger' : ''}}"><i class="fas fa-users mr-1"></i>Places left: {{$offer->places_free}}</p>
                            <p class="card-text"><i class="fas fa-plane mr-1"></i>{{$offer->airport}}</p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col d-flex align-items-center">
                                    @if(empty($offer->sale))
                                        <span class="h6 my-auto">{{$offer->price}} zł</span>
                                    @else
                                        <span class="h6 my-auto" style="text-decoration: line-through;">{{$offer->price}} zł</span><span class="h6 my-auto ml-1 text-danger"> {{$offer->sale}} zł</span><span class="small my-auto ml-1 px-1 text-white bg-danger">-{{number_format(($offer->price-$offer->sale)*100/$offer->price,0)}}%</span>
                                    @endif
                                </div>
                                {{--<div class="col"></div>--}}
                                <div class="col-5 text-right">
                                    <a href="{{route('tours.show',$offer->id)}}" class="btn btn-outline-dark"><i class="fas fa-info-circle mr-1"></i>DETAILS</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="card mt-4">
                    <div class="card-body">
                        <h3 class="card-title">No offers to show...</h3>
                    </div>
                </div>
            @endforelse
        </div>

{{--        <div class="row">
            @forelse($offers as $offer)
                <div class="card mt-4" id="offer-card-{{$offer->id}}">
                    <img class="card-img-top img-fluid" src="{{$offer->images}}" alt="">
                    <div class="card-body">
                        <h3 class="card-title">
                            <span id="hotel-name-{{$offer->id}}">{{$offer->name}}</span>
                            <span class="text-warning">
                                @for ($i = 0; $i < $offer->stars; $i++)
                                    &#9733;
                                @endfor
                            </span></h3>
                        <p class="card-text text-justify text-truncate">{{$offer->body}}</p>
                        <h4>Location: {{$offer->city}}, {{$offer->country}}</h4>
                    </div>
--}}{{--                    @can('create', App\Hotel::class)
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{route('hotels.edit', $offer->id)}}" class="btn btn-outline-dark btn-block">EDIT</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="javascript:" data-toggle="modal" onclick="deleteData({{$offer->id}})" data-target="#DeleteModal" class="btn btn-outline-danger btn-block">DELETE</a>
                                </div>
                            </div>
                        </div>
                    @endcan--}}{{--
                </div>
            @empty
                <div class="card mt-4">
                    <div class="card-body">
                        <h3 class="card-title">No hotels to show...</h3>
                    </div>
                </div>
        @endforelse
        </div>--}}
        </div>
    </div>

    <div class="scroll-up m-3">
        <a href="#app" id="btn-scroll-up" class="scroll-action btn btn-outline-dark m-5 d-none d-xl-block text-center p-3"><i class="fas fa-chevron-circle-up fa-3x"></i></a>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            var windowWidth = $(window).width();
            if(windowWidth <= 768){
                $("#tour-list").addClass('in').removeClass('show'); //for iPad & smaller devices
                $("#tour-list-arrow").toggleClass("fa-flip-vertical");

                $("#tour-list-full").addClass('in').removeClass('show'); //for iPad & smaller devices
                $("#tour-list-full-arrow").toggleClass("fa-flip-vertical");
            }
            else{
                $("#tour-list").addClass('show').removeClass('in');
                $("#tour-list-full").addClass('show').removeClass('in');

            }

            $('#tour-list-toggle').click(function() {
                $("#tour-list-arrow").toggleClass("fa-flip-vertical");
            });

            $('#tour-list-full-toggle').click(function() {
                $("#tour-list-full-arrow").toggleClass("fa-flip-vertical");
            });
        });
    </script>

    <script>
    $('a.scroll-action').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if( target.length ) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top
            }, 1000);
        }
    });
    </script>
@endsection
