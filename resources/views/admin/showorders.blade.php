@extends('layouts.app')

@section('title','Show Users')
@push('customStyles')
    <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css')}}">
@endpush
@section('content')
    <div class="card my-4">
        <div class="card-header">
            <div class="row">
                <div class="col m-0 p-0 pl-4 h5"><i class="fas fa-table"></i>Orders Table</div>
                <div class="col m-0 p-0 text-right">
                    <span class="badge badge-secondary mx-2">{{$statuses[1].': '.$orders->where('status_id',2)->count()}}</span>
                    <span class="badge badge-success mx-2">{{$statuses[2].': '.$orders->where('status_id',3)->count()}}</span>
                    <span class="badge badge-warning mx-2">{{$statuses[3].': '.$orders->where('status_id',4)->count()}}</span>
                    <span class="badge badge-danger mx-2">{{$statuses[4].': '.$orders->where('status_id',5)->count()}}</span>
                    <span class="badge badge-dark mx-2">{{$statuses[5].': '.$orders->where('status_id',6)->count()}}</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered small" id="dataUser" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>User</th>
                        <th>Modifiers</th>
                        <th>№ offers</th>
                        <th>№ places</th>
                        <th>Value</th>
                        <th>Placed</th>
                        <th>Finished</th>
                        <th>Status</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>User</th>
                        <th>Modifiers</th>
                        <th>№ offers: {{$pivots->count('offer_id')}}</th>
                        <th>№ places: {{$pivots->sum('quantity')}}</th>
                        <th>Total: {{$pivots->sum('value')}}</th>
                        <th>Placed: {{$orders->where('placed_at', '!=', null)->count()}}</th>
                        <th>Finished: {{$orders->where('finished_at', '!=', null)->count()}}</th>
                        <th>Status</th>
                        <th>Options</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->user()->value('firstName').' '.$order->user()->value('lastName')}}</td>
                            <td class="text-center">
                                <i class="fas fa-address-book {{ $order->billing_default ? 'text-success' : 'text-danger'}}"></i>
                                <i class="fas fa-money-check-alt {{ $order->is_paid ? 'text-success' : 'text-dark'}}"></i>
                                <i class="fas fa-question-circle {{!empty($order->user_message)  ? 'text-primary' : 'text-secondary'}}"></i>
                                <i class="fas fa-comments {{!empty($order->admin_answer)  ? 'text-primary' : 'text-secondary'}}"></i>
                            </td>
                            <td class="text-right">{{$order->offers()->count()}}</td>
                            <td class="text-right">{{$order->offers->sum('pivot.quantity')}}</td>
                            <td class="text-right">{{$order->offers->sum('pivot.value')}}</td>
                            <td class="text-right">{{!empty($order->placed_at) ? $order->placed_at->format('d.m.Y') : null}}</td>
                            <td class="text-right">{{!empty($order->finished_at)  ? $order->finished_at->format('d.m.Y') : null}}</td>
                            <td class="text-right">
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
                            <td class="text-center">
                                <a href="{{route('order.show', $order->id)}}" class="btn btn-outline-dark my-0 py-0 px-1">SHOW</a>
                            </td>
                        </tr>
                    @empty
                        <p>Error loading fields!</p>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted "></div>
    </div>

    <!-- Page level plugin JavaScript-->
    <script src="{{url('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Demo scripts for this page-->
    <script src="{{asset('js/datatables-demo.js')}}"></script>
@endsection