@extends('layouts.app')

@section('title','My Profile')
@push('customStyles')
    {{--<link rel="stylesheet" href="{{asset('css/tours.css')}}">--}}
@endpush

@section('content')
    <div class="row m-4">
        <div class="col-lg-3">
            <div class="card h-100">
                <div class="card-header d-flex flex-column align-items-center justify-content-center h3">
                    <i class="fas fa-user-astronaut fa-5x d-flex flex-row"></i>
                    <span class="d-flex flex-row mt-2">{{Auth::user()->firstName.' '.Auth::user()->lastName}}</span>
                </div>
                <div class="card-body d-flex flex-column">
                    @if(session('success'))
                        <div class="alert alert-success p-2 p-sm-1 my-0">
                            {{session('success')}}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger p-2 p-sm-1 my-0">
                            {{session('error')}}
                        </div>
                    @endif
                    @if($errors->any())
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
                        <div class="card-header h3">Edit profile</div>
                        <div class="card-body">
                            {{Form::open(['action'=> ['PasswordsController@update',Auth::id()],'method' => 'POST'])}}
                            @method('PATCH')
                            @csrf
                            <div class="form-group row mx-1">
                                {{Form::label('password_current','Current Password',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::password('password_current',['class'=>'form-control col-sm-9','maxlength' => 255])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('password','New Password',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::password('password',['class'=>'form-control col-sm-9','maxlength' => 255])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('password_confirmed','Confirm Password',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::password('password_confirmed',['class'=>'form-control col-sm-9','maxlength' => 255])}}
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{route('user.show',Auth::id())}}" class="btn btn-outline-danger btn-block">CANCEL</a>
                                </div>
                                <div class="col-6">
                                    {{Form::submit('SUBMIT',['class'=>'btn btn-outline-success btn-block'])}}
                                    {{Form::close()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection