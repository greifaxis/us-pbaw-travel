@extends('layouts.app')

@section('title','Orders')
@push('customStyles')
    {{--<link rel="stylesheet" href="{{asset('css/tours.css')}}">--}}
@endpush

@section('content')

    <div class="row my-4">
        <div class="col-lg-3">
            <div class="card h-100">
                <div class="card-header d-flex flex-column align-items-center justify-content-center h3">
                    <i class="far fa-credit-card fa-5x d-flex flex-row"></i>
                    <span id="user-name" class="d-flex flex-row mt-2">Checkout</span>
                </div>
                <div class="card-body">
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
                                        <th>Id</th>
                                        <th>Offer Name</th>
                                        <th>Value</th>
                                        <th>Places</th>
                                        <th>Cost</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr class="h6">
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th class="text-right">{{$order->offers->sum('pivot.quantity')}}</th>
                                        <th class="text-right">{{$order->offers->sum('pivot.value')}}</th>
                                    </tr>
                                    <tbody>
                                    @forelse($offers as $offer)
                                        <tr>
                                            <td>{{$offer->id}}</td>
                                            <td><a href="{{route('tours.show',$offer->id)}}">{{$offer->name}}</a></td>
                                            <td class="text-right">{{empty($offer->sale) ? $offer->price : $offer->sale}}</td>
                                            <td class="text-right">{{$offer->pivot->quantity}}</td>
                                            <td class="text-right">{{empty($offer->sale) ? $offer->price*$offer->pivot->quantity : $offer->sale*$offer->pivot->quantity}}</td>
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

            <div class="row">
                <div class="col mt-4">
                    <div class="card h-100">
                        <div class="card-header">
                            <div class="row">
                                <div class="col m-0 p-0 pl-4 h3"><i class="fas fa-comments mx-2"></i>Details for payment</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row mb-0">
                                <label class="col-sm-10 col-form-label">Send us payment for this order using details below</label>
                            </div>
                            <div class="form-group row">
                                <label for="company" class="col-sm-3 col-form-label">Our Company</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="company" value="USTravel">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="address" value="Ostrogorska 35/521, 41-200 Sosnowiec, Poland">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-7">
                                    <input type="email" readonly class="form-control-plaintext" id="email" value="admin@example.com">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="iban" class="col-sm-3 col-form-label">Our IBAN</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="iban" value="PL05 2490 1031 0319 5045 9984 5557">
                                    <small id="iban" class="form-text text-muted">Double check copied IBAN during payment.</small>
                                </div>
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
