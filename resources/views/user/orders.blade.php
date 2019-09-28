@extends('layouts.app')

@section('title','My Profile')
@push('customStyles')
    {{--<link rel="stylesheet" href="{{asset('css/tours.css')}}">--}}
@endpush

@section('content')

    <div class="row my-4">
{{--        <div class="col-lg-3">
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
        </div>--}}

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered small" id="dataUser" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Modifiers</th>
                        <th>№ offers</th>
                        <th>№ places</th>
                        <th>Placed</th>
                        <th>Finished</th>
                        <th>Value</th>
                        <th>Status</th>
                        {{--<th>Options</th>--}}
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Modifiers</th>
                        <th>Total № offers: {{$pivots->count('offer_id')}}</th>
                        <th>Total № places: {{$pivots->sum('quantity')}}</th>
                        <th>Total № placed: {{$orders->where('placed_at', '!=', null)->count()}}</th>
                        <th>Total № finished: {{$orders->where('finished_at', '!=', null)->count()}}</th>
                        <th>Total value: {{$pivots->sum('value')}}</th>
                        <th>Status</th>
                        {{--<th>Options</th>--}}
                    </tr>
                    </tfoot>
                    <tbody>
                    @forelse($orders as $order)
                        <tr id="orderRowId{{$order->id}}" class="orderTableRow" onclick="goToOrder({{$order->id}})">
                            <td>{{$order->id}}</td>
                            <td class="text-center">
                                <i class="fas fa-address-book {{ $order->billing_default ? 'text-success' : 'text-danger'}}"></i>
                                <i class="fas fa-money-check-alt {{ $order->is_paid ? 'text-success' : 'text-dark'}}"></i>
                                <i class="fas fa-question-circle {{!empty($order->user_message)  ? 'text-primary' : 'text-secondary'}}"></i>
                                <i class="fas fa-comments {{!empty($order->admin_answer)  ? 'text-primary' : 'text-secondary'}}"></i>
                            </td>
                            <td class="text-right">{{$order->offers()->count()}}</td>
                            <td class="text-right">{{$order->offers->sum('pivot.quantity')}}</td>
                            <td class="text-right">{{!empty($order->placed_at) ? $order->placed_at->format('d.m.Y') : null}}</td>
                            <td class="text-right">{{!empty($order->finished_at)  ? $order->finished_at->format('d.m.Y') : null}}</td>
                            <td class="text-right">{{$order->offers->sum('pivot.value')}}</td>
                            <td class="text-left">
                                @if($order->status()->value('id') == 2)
                                    <span class="badge badge-secondary">{{$order->status()->value('status')}}</span>
                                @elseif($order->status()->value('id') == 3)
                                    <span class="badge badge-success">{{$order->status()->value('status')}}</span>
                                @elseif($order->status()->value('id') == 4)
                                    <span class="badge badge-warning">{{$order->status()->value('status')}}</span>
                                @elseif($order->status()->value('id') == 5)
                                    <span class="badge badge-danger">{{$order->status()->value('status')}}</span>
                                @else
                                    <span class="badge badge-dark">{{$order->status()->value('status')}}</span>
                                @endif
                            </td>
{{--                            <td class="text-center">
                                <a href="{{route('order.edit', $order->id)}}" class="btn btn-outline-dark my-0 py-0 px-1">SHOW</a>
                            </td>--}}
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-secondary">No orders.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script>
        $(".orderTableRow").hover(function(){
            $(this).addClass("text-secondary").css("background-color", "#F5F5F5");
        }, function(){
            $(this).removeClass("text-secondary").css("background-color", "#f8fafc");
        });

        function goToOrder(id)
        {
            var id = id;
            var url = '{{ route("order.show", ":id") }}';
            url = url.replace(':id', id);
            window.location.href = url
        }

    </script>

@endsection
