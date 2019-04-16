@extends('layouts.app')

@section('title','Home')
@push('customStyles')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endpush

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    {{--<div class="card-header text-center">{{ __('Login') }}</div>--}}
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ __('Login') }}</h5>

                        <form class="form-signin" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-label-group">
                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                       value="{{ old('email') }}" placeholder="Email address" required autofocus>
                                <label for="email">{{ __('E-Mail Address') }}</label>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-label-group">
                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" placeholder="Password" required>
                                <label for="password">{{ __('Password') }}</label>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="custom-control custom-checkbox mb-3 pl-5">
                                <input type="checkbox" class="custom-control-input" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">
                                {{ __('Login') }}
                            </button>
                            <hr class="my-4">
                            @if (Route::has('password.request'))
                                <a class="btn btn-lg btn-outline-primary btn-block text-uppercase" role="button"
                                   aria-pressed="true" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
