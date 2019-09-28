@extends('layouts.app')

@section('title','My Profile')
@push('customStyles')
    {{--<link rel="stylesheet" href="{{asset('css/tours.css')}}">--}}
@endpush

@section('content')

    <div class="row my-4">
        <div class="col-lg-3">
            <div class="card h-100">
                <div class="card-header d-flex flex-column align-items-center justify-content-center h3">
                    <i class="fas fa-shopping-basket fa-5x d-flex flex-row"></i>
                    <span id="user-name" class="d-flex flex-row mt-2">My basket</span>
                </div>
                <div class="card-body">
                </div>

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
                @if($errors->any())
                    <div class="alert alert-danger p-2 p-sm-1 my-0">
                        @foreach ($errors->all() as $error)
                            <div class="my-1">{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div class="col-lg-9">
            <div class="row">
                <div class="col">
                    <div class="card mx-auto">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-3 m-0 p-0 pl-4 h3"><i class="far fa-list-alt mx-2"></i>Contents</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered small" id="dataUser" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Offer Name</th>
                                        <th>Value</th>
                                        <th>Places</th>
                                        <th>Cost</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr class="h6">
                                        <th></th>
                                        <th></th>
                                        <th class="text-right">{{$baskets->sum('quantity')}}</th>
                                        <th class="text-right">{{sprintf('%0.2f',$baskets->sum('value'))}}</th>
                                        <th></th>
                                    </tr>
                                    <tbody>
                                    @forelse($baskets as $basket)
                                        <tr>
                                            <td><a href="{{route('tours.show',$basket->offer_id)}}">{{$basket->offer->name}}</a></td>
                                            <td class="text-right">{{empty($basket->offer->sale) ? $basket->offer->price : $offer->offer->sale}}</td>
                                            <td class="text-right">{{$basket->quantity}}</td>
                                            <td class="text-right">{{sprintf('%0.2f',$basket->value)}}</td>
                                            <td class="text-center p-0 align-middle">
                                                <i class="fas fa-minus-square fa-2x m-0 text-danger"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @empty
                                        <p>Error loading fields!</p>
                                    @endforelse
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
