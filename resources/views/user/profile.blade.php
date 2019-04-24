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
                    {{--                @if ($errors->any())
                                                <ul class="list-group">
                                                    @foreach ($errors->all() as $error)
                                                        <li class="list-group-item list-group-item-danger p-2 p-sm-1">{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                    @endif--}}
                </div>
                {{--            <div class="card-footer">
                                <div class="btn btn-success btn-block mt-3"><i class="fas fa-money-bill-wave mr-1"></i>BUY</div>
                            </div>--}}
            </div>
        </div>


        <div class="col-lg-9">
            <div class="row">
                <div class="col">
                    <div class="card mx-auto">
                        <div class="card-header h3">Edit profile</div>
                        <div class="card-body">
                            {{Form::open(['action'=> ['UsersController@update',Auth::id()],'method' => 'POST'])}}
                            @method('PATCH')
                            @csrf
                            <div class="form-group row mx-1">
                                {{Form::label('email','Email',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::text('email',Auth::user()->email,['class'=>'form-control col-sm-9','maxlength' => 255])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('firstName','First Name',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::text('firstName',Auth::user()->firstName,['class'=>'form-control col-sm-9','maxlength' => 255])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('lastName','Last Name',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::text('lastName',Auth::user()->lastName,['class'=>'form-control col-sm-9','maxlength' => 255])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('phone','Phone',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::text('phone',Auth::user()->phone,['class'=>'form-control col-sm-9','maxlength' => 255])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('address','Address',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::text('address',Auth::user()->address,['class'=>'form-control col-sm-9','maxlength' => 255])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('company','Company',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::text('company',Auth::user()->company,['class'=>'form-control col-sm-9','maxlength' => 255])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('nipnum','NIP',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::text('nipnum',Auth::user()->nipnum,['class'=>'form-control col-sm-9','maxlength' => 255])}}
                            </div>
                            {{--                        <div class="form-group mr-1 ml-3">
                                                        {{Form::label('body','Description')}}
                                                        {{Form::textarea('body','',['class'=>'form-control'])}}
                                                    </div>--}}
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6">
                                    {{Form::submit('SUBMIT',['class'=>'btn btn-outline-success btn-block'])}}
                                    {{Form::close()}}</div>
                                <div class="col-6">
                                    <a href="{{route('password.edit', Auth::id())}}" class="btn btn-outline-danger btn-block">CHANGE PASSWORD</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection