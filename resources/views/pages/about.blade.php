@extends('templates.default')

@section('title','Contact Us')
@push('customStyles')
    <link rel="stylesheet" href="{{asset('css/tours.css')}}">
@endpush

@section('content')


    <h1>Contact Us:</h1>
    <div class="mx-auto my-3">
        {{--{!! Form::open(['url'=>'foo/bar']) !!}--}}
        {{Form::open(['action'=> 'ContactsController@store','method' => 'POST'])}}

        <div class="form-group row">
            {{Form::label('title','Title',['class'=>'col-sm-2 col-form-label'])}}
            {{Form::text('title','',['class'=>'form-control col-sm-3','placeholder'=>'Title','maxlength' => 255])}}
        </div>
        <div class="form-group row">
            {{Form::label('email','Email',['class'=>'col-sm-2 col-form-label'])}}
            {{Form::text('email','',['class'=>'form-control col-sm-3','placeholder'=>'name@example.com','maxlength' => 255])}}
        </div>
        <div class="form-group row">
            {{Form::label('phone','Phone (Optional)',['class'=>'col-sm-2 col-form-label'])}}
            <div class="input-group col-sm-3 p-0">
                <div class="input-group-prepend">
                    <div class="input-group-text">+</div>
                </div>
                {{Form::text('areacode','',['class'=>'form-control col-sm-2 text-center','placeholder'=>'48','maxlength' => 2])}}
                {{Form::text('phone','',['class'=>'form-control','placeholder'=>'123123123','maxlength' => 9])}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('body','Message')}}
            {{Form::textarea('body','',['class'=>'form-control col-sm-5','placeholder'=>'Your message'])}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-secondary'])}}
        {{Form::close()}}
    </div>
@endsection