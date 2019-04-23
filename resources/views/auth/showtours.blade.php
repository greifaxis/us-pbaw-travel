@extends('layouts.app')

@section('title','Examine')
@push('customStyles')
    {{--<link rel="stylesheet" href="{{asset('css/navbar-fixed-left.min.css')}}">--}}
@endpush

@section('content')
<div class="row mt-4">

    <div class="col-lg-3 mb-4">

        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-center h3">
                {{$offer->name}}
            </div>
            <div class="card-body d-flex flex-column">
                @if(empty($offer->sale))
                    <span class="h1 d-flex align-items-center justify-content-center my-4">{{$offer->price}} zł</span>
                @else
                    <div class="d-flex flex-row justify-content-center">
                    <span class="h3 ml-1 d-flex align-items-center my-1" style="text-decoration: line-through;">{{$offer->price}} zł</span>
                    <span class="small ml-2 px-1 my-1 d-flex align-items-center text-white bg-danger">-{{number_format(($offer->price-$offer->sale)*100/$offer->price,0)}}%</span>
                    </div>
                    <span class="h1 text-danger d-flex align-items-center justify-content-center my-2"> {{$offer->sale}} zł</span>
                @endif
                <p class="h5 ml-1 my-3 mt-lg-4"><i class="fas fa-plane-departure mr-1"></i>{{$offer->date_begin->format('j F Y')}}</p>
                <p class="h5 ml-1 my-3"><i class="fas fa-plane-arrival mr-1"></i>{{$offer->date_end->format('j F Y')}}</p>
                <p class="card-text text-justify mt-auto">{{$offer->highlight}}</p>
                <p class="card-text"><i class="fas fa-plane mr-1"></i>{{$offer->airport}}</p>
                <p class="card-text{{$offer->places_free<=3 ? ' text-danger' : ''}} d-flex align-self-baseline my-2"><i class="fas fa-users my-1 mr-1"></i>Places left:<span class="ml-2" id="valueOnInput">{{$offer->places_free}}</span>/{{$offer->places_max}}</p>
            </div>
            <div class="card-footer">
                <input type="number" id="changedInput" value="0" min="0" max="{{$offer->places_free}}" step="1" class="border-secondary"/>
                <div class="btn btn-success btn-block mt-3"><i class="fas fa-money-bill-wave mr-1"></i>BUY</div>
            </div>
        </div>

    </div>

    <div class="col-lg-9">
        <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide mb-4 mx-3" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    @forelse(json_decode($offer->images,true) as $image)
                        <div class="carousel-item {{$loop->first ? ' active' : ''}}">
                                <img class="d-block img-fluid rounded" src="{{$image}}" alt="First slide">
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

        <div class="row">
            <div class="col-6 mb-4">
                <div class="card h-100">
                    <div class="card-header h5">
                                <i class="fas fa-home mr-1"></i>
                                {{$offer->hotel()->value('name')}}
                                @for ($i = 0; $i < $offer->hotel()->value('stars'); $i++)
                                    &#9733;
                                @endfor
                    </div>
                    <div class="card-body">
                        <p class="card-text text-justify">{{$offer->hotel()->value('body')}}</p>
                        <p class="card-text h6"><i class="fas fa-map-marked-alt mr-2"></i>{{$offer->hotel()->value('city').', '.$offer->hotel()->value('country')}}</p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#" class="btn btn-outline-dark btn-block">WEBSITE</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('hotels.index')}}#hotel-card-{{$offer->hotel()->value('id')}}" class="btn btn-outline-dark btn-block">DETAILS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <p class="card-text text-justify">{{$offer->body}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./src/bootstrap-input-spinner.js"></script>
<script>
    $("input[type='number']").inputSpinner();
</script>
<script>
    var $changedInput = $("#changedInput")
    var $valueOnInput = $("#valueOnInput")
    $changedInput.on("input", function (event) {
        $valueOnInput.html({{$offer->places_free}}-$changedInput.val())
    })
</script>
@endsection
