@extends('layouts.app')

@section('title','Examine')
@push('customStyles')
    {{--<link rel="stylesheet" href="{{asset('css/navbar-fixed-left.min.css')}}">--}}
@endpush

@section('content')

    @if(session('success'))
        <div class="alert alert-success p-2 p-sm-1 my-0">
            {{session('success')}}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger p-2 p-sm-1 my-0">
            {{session('error')}}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger p-2 p-sm-1 my-0">
            @foreach ($errors->all() as $error)
                <div class="my-1">{{ $error }}</div>
            @endforeach
        </div>
    @endif

<div class="row mt-4">

    <div class="col-lg-3 mb-4">

        <div class="card h-100">
            <div id="offer-name" class="card-header d-flex align-items-center justify-content-center h3">
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
            @can('create', App\Offer::class)
                <div class="card-footer">
                    <div class="mb-1">
                        <a href="{{route('tours.edit', $offer->id)}}"class="btn btn-outline-dark btn-block">EDIT</a>
                    </div>
                    <div >
                        <a href="javascript:" data-toggle="modal" onclick="deleteData({{$offer->id}})" data-target="#DeleteModal" class="btn btn-outline-danger btn-block">DELETE</a>
                    </div>
                </div>
            @else
            <div class="card-footer">
{{--                {{Form::open(['action'=> ['OfferOrdersController@update',$offer->id],'method' => 'POST'])}}
                @method('PUT')
                @csrf--}}
                <div class="form-label-group">
                    <label for="quantity" class="d-none">Quantity</label>
                    <input type="number" id="quantity" value="0" min="0" max="{{$offer->places_free}}" step="1" class="border-secondary" required/>
                </div>
                {{Form::submit('ADD TO BASKET',['class'=>'btn btn-success btn-block mt-3'])}}
                {{--{{Form::close()}}--}}
            </div>
            @endcan

        </div>

    </div>

    <div class="col-lg-9">
    @if(isset($offer->images))
        <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide mb-4 mx-3" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner rounded" role="listbox">
                
                    
                    @forelse(json_decode($offer->images,true) as $imageURL)

                        <div class="carousel-item {{$loop->first ? ' active' : ''}}">
                                <img class="d-block img-fluid rounded" src="{{$imageURL}}" alt="First slide">
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
@endif
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

<div id="DeleteModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{route('tours.destroy', $offer->id)}}" id="deleteForm" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header align-content-center p-3">
                    <h5 class="modal-title">Confirm delete</h5>
                    <button type="button" class="btn close" data-dismiss="modal"><i class="far fa-window-close"></i></button>
                </div>
                <div class="modal-body">
                    Do you wish to delete <span id="offer-delete-name"></span>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                    <button type="submit" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">DELETE</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{--<script src="./src/bootstrap-input-spinner.js"></script>--}}
<script>
    // $("input[type='number']").inputSpinner();
</script>
<script>
    {{--var $changedInput = $("#inputQuantity")--}}
    {{--var $valueOnInput = $("#valueOnInput")--}}
    {{--$changedInput.on("input", function (event) {--}}
        {{--$valueOnInput.html({{$offer->places_free}}-$changedInput.val())--}}
    {{--})--}}

    function deleteData(id)
    {
        var id = id;
        var url = '{{ route("tours.destroy", ":id") }}';
        url = url.replace(':id', id);
        var node = document.getElementById("offer-name");
        document.getElementById("offer-delete-name").innerHTML = node.textContent;
        $("#deleteForm").attr('action', url);
    }

    function formSubmit()
    {
        $("#deleteForm").submit();
    }
</script>
@endsection
