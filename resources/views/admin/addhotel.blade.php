@extends('layouts.app')

@section('title','Add Hotel')
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
            Add Hotel
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

        {{--{!! Form::open(['url'=>'foo/bar']) !!}--}}
        {{Form::open(['action'=> 'HotelsController@store','method' => 'POST'])}}
        {{Form::token()}}
        <div class="form-group row mx-1">
            {{Form::label('name','Name',['class'=>'col-sm-3 col-form-label'])}}
            {{Form::text('name','',['class'=>'form-control col-sm-9','placeholder'=>'Name','maxlength' => 255])}}
        </div>
        <div class="form-group row mx-1">
            {{Form::label('city','City',['class'=>'col-sm-3 col-form-label'])}}
            {{Form::text('city','',['class'=>'form-control col-sm-9','placeholder'=>'City','maxlength' => 255])}}
        </div>
        <div class="form-group row mx-1">
            {{Form::label('country','Country',['class'=>'col-sm-3 col-form-label'])}}
            {{Form::text('country','',['class'=>'form-control col-sm-9','placeholder'=>'Country','maxlength' => 255])}}
        </div>
        <div class="form-group row mx-1">
            {{Form::label('stars','Stars',['class'=>'col-sm-3 col-form-label'])}}
            {{Form::number('stars','',['class'=>'form-control col-sm-2','placeholder'=>'3','max'=>9,'min'=>1])}}
        </div>
        <div class="form-group row mx-1">
            {{Form::label('image','Image URL',['class'=>'col-sm-3 col-form-label'])}}
            {{Form::text('image','',['class'=>'form-control col-sm-9','placeholder'=>'https://source.unsplash.com/900x400/?sig=466802&hotel','maxlength' => 255])}}
        </div>

        <div class="form-group mr-1 ml-3">
            {{Form::label('body','Description')}}
            {{Form::textarea('body','',['class'=>'form-control','placeholder'=>'Hotel\'s description'])}}
        </div>
        {{Form::submit('Submit',['class'=>'ml-3 btn btn-secondary'])}}
        {{Form::close()}}

        </div>
    </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
