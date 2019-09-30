<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>USTravel_Report_{{date('Y-m-d_H-i-s')}}</title>
</head>
<body>
<h1>USTravel Orders Report {{date('Y-m-d H:i:s')}}</h1>

<table class="small" id="" width="100%" cellspacing="0" border="1">
    <thead>
    <tr>
        <th>Id</th>
        <th>User</th>
        <th>Offers</th>
        <th>Places</th>
        <th>Value</th>
        <th>Placed</th>
        <th>Finished</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @forelse($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->user()->value('firstName').' '.$order->user()->value('lastName')}}</td>
            <td class="text-right">{{$order->offers()->count()}}</td>
            <td class="text-right">{{$order->offers->sum('pivot.quantity')}}</td>
            <td class="text-right">{{$order->offers->sum('pivot.value')}}</td>
            <td class="text-right">{{!empty($order->placed_at) ? $order->placed_at->format('d.m.Y') : null}}</td>
            <td class="text-right">{{!empty($order->finished_at)  ? $order->finished_at->format('d.m.Y') : null}}</td>
            <td class="text-left">
                @if($order->status()->value('id') == 2)
                    {{$order->status()->value('status')}}
                @elseif($order->status()->value('id') == 3)
                    {{$order->status()->value('status')}}
                @elseif($order->status()->value('id') == 4)
                    {{$order->status()->value('status')}}
                @elseif($order->status()->value('id') == 5)
                    {{$order->status()->value('status')}}
                @else
                    {{$order->status()->value('status')}}
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7" class="text-center text-secondary">No orders to show...</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>