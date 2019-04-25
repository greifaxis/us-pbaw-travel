@extends('layouts.app')

@section('title','Edit Offer')
@push('customStyles')
    {{--<link rel="stylesheet" href="{{asset('css/navbar-fixed-left.min.css')}}">--}}
@endpush

@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card my-4 mx-auto">
                {{--<div class="card">--}}
                <div class="card-header">
                    Edit Offer
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="row mb-4">
                            <div class="col-md-6 offset-md-3">
                                <ul class="list-group">
                                    @foreach ($errors->all() as $error)
                                        <li class="list-group-item list-group-item-danger py-sm-0">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    {{Form::open(['action'=> ['OffersController@update',$offer->id],'method' => 'POST'])}}
                        @method ('PATCH')
                        @csrf
                    <div class="form-group row mx-1">
                        {{Form::label('name','Name',['class'=>'col-sm-3 col-form-label'])}}
                        {{Form::text('name',$offer->name,['class'=>'form-control col-sm-9','placeholder'=>'Name','maxlength' => 255])}}
                    </div>
                    <div class="form-group row mx-1">
                        {{Form::label('price','Price',['class'=>'col-sm-3 col-form-label'])}}
                        {{Form::text('price',$offer->price,['class'=>'form-control col-sm-9','placeholder'=>'Price'])}}
                    </div>
                    <div class="form-group row mx-1">
                        {{Form::label('sale','Sale',['class'=>'col-sm-3 col-form-label'])}}
                        {{Form::text('sale',$offer->sale,['class'=>'form-control col-sm-9','placeholder'=>'Sale'])}}
                    </div>
                    <div class="form-group row mx-1">
                        {{Form::label('date_begin','Date Begin',['class'=>'col-sm-3 col-form-label'])}}
                        <input type="date" name="date_begin" value="{{$offer->date_begin->format('Y-m-d')}}"/>
                    </div>
                    <div class="form-group row mx-1">
                        {{Form::label('date_end','Date End',['class'=>'col-sm-3 col-form-label'])}}
                        <input type="date" name="date_end" value="{{$offer->date_end}}"/>
                    </div>
                    <div class="form-group row mx-1">
                        {{Form::label('highlight','Highlight',['class'=>'col-sm-3 col-form-label'])}}
                        {{Form::text('highlight',$offer->highlight,['class'=>'form-control col-sm-9','placeholder'=>'Highlight'])}}
                    </div>

                    <div class="form-group row mx-1">
                        {{Form::label('body','Body',['class'=>'col-sm-3 col-form-label'])}}
                        {{Form::textarea('body',$offer->body,['class'=>'form-control col-sm-9','placeholder'=>'Body'])}}
                    </div>
                    <div class="form-group row mx-1">
                        {{Form::label('places_max','Places Max',['class'=>'col-sm-3 col-form-label'])}}
                        {{Form::text('places_max',$offer->places_max,['class'=>'form-control col-sm-9','placeholder'=>'Places max'])}}
                    </div>
                    <div class="form-group row mx-1">
                        {{Form::label('places_free','Places free',['class'=>'col-sm-3 col-form-label'])}}
                        {{Form::text('places_free',$offer->places_free,['class'=>'form-control col-sm-9','placeholder'=>'Places free'])}}
                    </div>
                    <div class="form-group row mx-1">
                        {{Form::label('airport','Airport',['class'=>'col-sm-3 col-form-label'])}}
                        {{Form::text('airport',$offer->airport,['class'=>'form-control col-sm-9','placeholder'=>'Airport'])}}
                    </div>
                    <div class="form-group row mx-1">
                        {{Form::label('images','Images',['class'=>'col-sm-3 col-form-label'])}}
                        {{Form::text('image1',json_decode($offer->images,true)[0],['class'=>'form-control col-sm-9','placeholder'=>'Image 1'])}}
                        {{Form::label('','',['class'=>'col-sm-3 col-form-label'])}}
                        {{Form::text('image2',json_decode($offer->images,true)[1],['class'=>'form-control col-sm-9','placeholder'=>'Image 2'])}}
                        {{Form::label('','',['class'=>'col-sm-3 col-form-label'])}}
                        {{Form::text('image3',json_decode($offer->images,true)[2],['class'=>'form-control col-sm-9','placeholder'=>'Image 3'])}}
                        {{Form::label('','',['class'=>'col-sm-3 col-form-label'])}}
                        {{Form::text('image4',json_decode($offer->images,true)[3],['class'=>'form-control col-sm-9','placeholder'=>'Image 4'])}}
                        {{Form::label('','',['class'=>'col-sm-3 col-form-label'])}}
                        {{Form::text('image5',json_decode($offer->images,true)[4],['class'=>'form-control col-sm-9','placeholder'=>'Image 5'])}}

                    </div>
                    <div class="form-group row mx-1">
                        {{Form::label('hotel_id','Hotel ID',['class'=>'col-sm-3 col-form-label'])}}
                        {{Form::text('hotel_id',$offer->hotel_id,['class'=>'form-control col-sm-9','placeholder'=>'Hotel ID'])}}
                    </div>
                    {{Form::submit('Submit',['class'=>'ml-3 btn btn-secondary'])}}
                    {{Form::close()}}
                </div>


            </div>

        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
