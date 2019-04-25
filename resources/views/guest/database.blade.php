@extends('layouts.app')

@section('title','Database')
@push('customStyles')
    {{--<link rel="stylesheet" href="{{asset('css/tours.css')}}">--}}
@endpush

@section('content')
    <h1>Omg {{!empty($admins) ? $admins : 'PUSTE'}}</h1>
    <p>Offers max places sum: {{$offers}}</p>
    <p>Offers free places sum:: {{$offersWithPlaces}}</p>
    <p>Offers taken places sum:: {{$offers-$offersWithPlaces}}</p>
    <p>OfferOrders sum: {{$ordersSum}}</p>
{{--<div class="my-2">@forelse($admins as $admin)
   <span class="font-weight-light small">{{$admin}}</span>  <br>
    @empty
    @endforelse</div>--}}
@auth
   {{Auth::user()->role()->value('role')=='admin'}}
   @endauth

  {{--  <div class="row">
        <div class="col-sm-2">
            Guest:
        </div>
        <div class="col-sm-2">
            @guest
                OK
            @endguest
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            Auth:
        </div>
        <div class="col-sm-2">
            @auth
                OK
            @endauth
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            User only:
        </div>
        <div class="col-sm-2">
            @can('create', App\User::class)
            @endcan
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            Admin only:
        </div>
        <div class="col-sm-2">
            @can('create', App\User::class)
                OK
            @endcan
        </div>
    </div>--}}
@endsection