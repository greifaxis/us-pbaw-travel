@extends('layouts.app')

@section('title','My Profile')
@push('customStyles')
    {{--<link rel="stylesheet" href="{{asset('css/tours.css')}}">--}}
@endpush

@section('content')

    <div class="row my-4">
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
                            <td class="text-right">{{!empty($order->placed_at) ? $order->placed_at->format('d.m.Y H:m:s') : null}}</td>
                            <td class="text-right">{{!empty($order->finished_at)  ? $order->finished_at->format('d.m.Y H:m:s') : null}}</td>
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
            $(this).addClass("text-secondary").css("background-color", "#F5F5F5").css('cursor', 'pointer');;
        }, function(){
            $(this).removeClass("text-secondary").css("background-color", "#f8fafc").css('cursor', 'default');;
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
