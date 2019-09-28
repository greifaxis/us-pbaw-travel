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
                    <i class="fas fa-cash-register fa-5x d-flex flex-row"></i>
                    <span id="user-name" class="d-flex flex-row mt-2">My order: {{$order->id}}</span>
                </div>
                <div class="card-body">
                    <p class="m-1 p-0">Payment Status:
                        @if($order->is_paid)
                            <i class="ml-2 fas fa-check-square"></i>
                        @else
                            <i class="ml-2 fas fa-hourglass-half"></i>
                    @endif
                    <p class="m-1 p-0">Placed:<br>{{!empty($order->placed_at) ? $order->placed_at->format('H:m:s d.m.Y') : null}}</p>
                    <p class="m-1 p-0">Finished: <br>{{!empty($order->finished_at)  ? $order->finished_at->format('H:m:s d.m.Y') :  ""}}</p>
                    <p class="m-1 p-0">Created: <br>{{!empty($order->created_at) ? $order->created_at->format('H:m:s d.m.Y') : null}}</p>
                    <p class="m-1 p-0">Updated: <br>{{!empty($order->updated_at) ? $order->updated_at->format('H:m:s d.m.Y') : null}}</p>


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
                                <div class="col-3 m-0 p-0 pl-4 h3"><i class="fas fa-comments mx-2"></i>Messages</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Your message</label>
                                <div class="col-sm-7">
                                    <textarea readonly rows="10" class="form-control-plaintext" id="staticEmail" >{{$order->user_message}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Admin response</label>
                                <div class="col-sm-7">
                                    <textarea readonly rows="10" class="form-control-plaintext" id="staticEmail" >{{$order->admin_answer}}</textarea>
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
