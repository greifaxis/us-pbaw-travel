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
                    Edit Hotel
                </div>
                <div class="card-body">
                    @if (session('error'))
                                <div class="alert alert-danger p-2 p-sm-1">
                                    {{session('error')}}
                                </div>
                    @endif
                    @if(session('success'))
                                <div class="alert alert-success p-2 p-sm-1">
                                    {{session('success')}}
                                </div>
                    @endif

                    {{--{!! Form::open(['url'=>'foo/bar']) !!}--}}
                    {{Form::open(['action'=> ['HotelsController@update',$hotel->id],'method' => 'POST'])}}
                        @method('PATCH')
                        @csrf
                    <div class="form-group row mx-1">
                        {{Form::label('name','Name',['class'=>'col-sm-3 col-form-label'])}}
                        {{Form::text('name',$hotel->name,['class'=>'form-control col-sm-9','maxlength' => 255])}}
                    </div>
                    <div class="form-group row mx-1">
                        {{Form::label('city','City',['class'=>'col-sm-3 col-form-label'])}}
                        {{Form::text('city',$hotel->city,['class'=>'form-control col-sm-9','maxlength' => 255])}}
                    </div>
                    <div class="form-group row mx-1">
                        {{Form::label('country','Country',['class'=>'col-sm-3 col-form-label'])}}
                        {{Form::text('country',$hotel->country,['class'=>'form-control col-sm-9','maxlength' => 255])}}
                    </div>
                    <div class="form-group row mx-1">
                        {{Form::label('stars','Stars',['class'=>'col-sm-3 col-form-label'])}}
                        {{Form::number('stars',$hotel->stars,['class'=>'form-control col-sm-2','max'=>9,'min'=>1])}}
                    </div>
                    <div class="form-group row mx-1">
                        {{Form::label('image','Image URL',['class'=>'col-sm-3 col-form-label'])}}
                        {{Form::text('image',$hotel->image,['class'=>'form-control col-sm-9','maxlength' => 255])}}
                    </div>

                    <div class="form-group mr-1 ml-3">
                        {{Form::label('body','Description')}}
                        {{Form::textarea('body',$hotel->body,['class'=>'form-control'])}}
                    </div>
                    {{Form::submit('Submit',['class'=>'ml-3 btn btn-secondary'])}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
