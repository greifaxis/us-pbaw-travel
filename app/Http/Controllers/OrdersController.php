<?php

namespace App\Http\Controllers;

use App\OfferOrder;
use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\OrderStatus;
use App\Offer;
use Illuminate\Support\Facades\Auth;


class OrdersController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role()->value('role') == 'admin') {
            $users = User::whereHas('role', function ($query) {
                $query->where('role', 'user');
            })->get();

            $admins = User::whereHas('role', function ($query) {
                $query->where('role', 'admin');
            })->get();

            $orders = Order::where('status_id', '>', '1')->with('offers')->get();

            $pivots = OfferOrder::get();
            $statuses = OrderStatus::all()->pluck('status')->toArray();

            return view('admin.showorders', compact('users', 'admins', 'orders', 'pivots', 'statuses'));
        } else {
            $orders = Order::where('user_id', Auth::id())->where('status_id', '>', '1')->with('offers')->get()->sortByDesc('created_at');


            $pivots = OfferOrder::whereIn('order_id', $orders->pluck('id')->toArray())->get();

            $statuses = OrderStatus::all()->pluck('status')->toArray();

            return view('user.orders', compact('orders', 'pivots', 'statuses'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = Order::find(Auth::id());
        return view('user.order', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $offers = $order->offers()->get();
        return view('user.order', compact('order', 'offers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $offers = $order->offers()->get();
        $statuses = OrderStatus::where('id', '>=', 2)->pluck('status')->toArray();
        return view('admin.editorder', compact('order', 'offers', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'statusIdDropdown' => 'required',
        ]);
        $order = Order::find($id);
        $order->status_id = $request->input('statusIdDropdown') + 2;
        if ($order->status_id >= 3) {
            $order->finished_at = date('Y-m-d H:i:s');
        }

        $order->save();

        $statuses = OrderStatus::where('id', '>=', 2)->pluck('status')->toArray();

        $offers = $order->offers()->get();
        return view('admin.editorder', compact('order', 'offers', 'statuses'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        $hotel->delete();

        return redirect('/hotels')->with('success', 'Stock has been deleted Successfully');
    }
}
