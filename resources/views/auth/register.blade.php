@extends('layouts.app')

@section('title','Register')
@push('customStyles')
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
@endpush

@section('content')
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ __('Register') }}</h5>
                        <form class="form-signin" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-label-group">
                                <input type="text" id="name"
                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       placeholder="Username" name="name" value="{{ old('name') }}" required autofocus>
                                <label for="name">Username</label>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>


                            {{--<div class="form-group row">--}}
                            {{--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                            {{--<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>--}}

                            {{--@if ($errors->has('name'))--}}
                            {{--<span class="invalid-feedback" role="alert">--}}
                            {{--<strong>{{ $errors->first('name') }}</strong>--}}
                            {{--</span>--}}
                            {{--@endif--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-label-group">
                                <input type="email" id="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       placeholder="Email address" name="email" value="{{ old('email') }}" required>
                                <label for="email">{{ __('E-Mail Address') }}</label>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                            {{--<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>--}}

                            {{--@if ($errors->has('email'))--}}
                            {{--<span class="invalid-feedback" role="alert">--}}
                            {{--<strong>{{ $errors->first('email') }}</strong>--}}
                            {{--</span>--}}
                            {{--@endif--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-label-group">
                                <input type="password" id="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" placeholder="Password" required>
                                <label for="inputPassword">{{ __('Password') }}</label>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>


                            {{--<div class="form-group row">--}}
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                            {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}


                            {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-label-group">
                                <input type="password" id="password-confirm" class="form-control" placeholder="Password"
                                       name="password_confirmation" required>
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            </div>

                            {{--<div class="form-group row">--}}
                            {{--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                            {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            <button class="btn btn-lg btn-primary btn-block text-uppercase"
                                    type="submit">{{ __('Register') }}</button>

                            {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                            {{--<button type="submit" class="btn btn-primary">--}}
                            {{--{{ __('Register') }}--}}
                            {{--</button>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
