@extends('layouts.app')

@section('title','Contact Us')
@push('customStyles')
    {{--<link rel="stylesheet" href="{{asset('css/tours.css')}}">--}}
@endpush

@section('content')

    <div class="row m-4">
        <div class="col-lg-3">
            <div class="card h-100">
                <div class="card-header d-flex flex-column align-items-center justify-content-center h3">
                    <i class="fas fa-compass fa-5x d-flex flex-row"></i>
                </div>

                <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address</div>
                <div class="card-body flex-column">
                    <p class="mb-0"><b>USTravel</b></p>
                    <p class="mb-0">Ostrogorska 35/521</p>
                    <p class="mb-0">41-200 Sosnowiec</p>
                    <p class="mb-0">Poland</p>
                    <p class="mb-0">Email : admin@example.com</p>
                    <p class="mb-0">Tel. +48 123 123 123</p>
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
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="row">
                <div class="col">
                    <div class="card mx-auto">
                        <div class="card-header h3">Contact Us:</div>
                        <div class="card-body">
                            {{--{!! Form::open(['url'=>'foo/bar']) !!}--}}
                            {{Form::open(['action'=> 'ContactsController@store','method' => 'POST'])}}

                            @csrf
                            <div class="form-group row mx-1">
                                {{Form::label('title','Title',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::text('title','',['class'=>'form-control col-sm-7','placeholder'=>'Title','maxlength' => 255])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('email','Email',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::text('email','',['class'=>'form-control col-sm-7','placeholder'=>'name@example.com','maxlength' => 255])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('phone','Phone (Optional)',['class'=>'col-sm-3 col-form-label'])}}
                                <div class="input-group col-sm-4 p-0">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">+</div>
                                    </div>
                                    {{Form::text('areacode','',['class'=>'form-control col-sm-3 text-center','placeholder'=>'48','maxlength' => 2])}}
                                    {{Form::text('phone','',['class'=>'form-control','placeholder'=>'123123123','maxlength' => 9])}}
                                </div>
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('body','Message',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::textarea('body','',['class'=>'form-control col-sm-7','placeholder'=>'Your message'])}}
                            </div>
                        </div>
                        <div class="card-footer">

                                    {{Form::submit('SUBMIT',['class'=>'btn btn-outline-success btn-block'])}}
                                    {{Form::close()}}</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
