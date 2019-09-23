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
                    <i class="fas fa-cash-register fa-5x d-flex flex-row"></i>
                    <span id="user-name" class="d-flex flex-row mt-2">My order</span>
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
                                        <th>Id</th>
                                        <th>Offer Name</th>
                                        <th>Value</th>
                                        <th>Places</th>
                                        <th>Cost</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr class="h6">
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th class="text-right">{{$order->offers->sum('pivot.quantity')}}</th>
                                        <th class="text-right">{{$order->offers->sum('pivot.value')}}</th>
                                        <th class="text-right"></th>
                                    </tr>
                                    <tbody>
                                    @forelse($offers as $offer)
                                        <tr>
                                            <td>{{$offer->id}}</td>
                                            <td><a href="{{route('tours.show',$offer->id)}}">{{$offer->name}}</a></td>
                                            <td class="text-right">{{empty($offer->sale) ? $offer->price : $offer->sale}}</td>
                                            <td class="text-right">{{$offer->pivot->quantity}}</td>
                                            <td class="text-right">{{empty($offer->sale) ? $offer->price*$offer->pivot->quantity : $offer->sale*$offer->pivot->quantity}}</td>
                                            {{--<td class="text-right">--}}
                                                {{--@if($offer->status()->value('id') == 2)--}}
                                                    {{--<span class="badge badge-secondary">{{$order->status()->value('status')}}</span>--}}
                                                {{--@elseif($order->status()->value('id') == 3)--}}
                                                    {{--<span class="badge badge-success">{{$order->status()->value('status')}}</span>--}}
                                                {{--@elseif($order->status()->value('id') == 4)--}}
                                                    {{--<span class="badge badge-warning">{{$order->status()->value('status')}}</span>--}}
                                                {{--@elseif($order->status()->value('id') == 5)--}}
                                                    {{--<span class="badge badge-danger">{{$order->status()->value('status')}}</span>--}}
                                                {{--@else--}}
                                                    {{--<span class="badge badge-dark">{{$order->status()->value('status')}}</span>--}}
                                                {{--@endif--}}
                                            {{--</td>--}}
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
