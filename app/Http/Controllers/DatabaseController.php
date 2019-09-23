<?php

namespace App\Http\Controllers;

use App\Offer;
use App\OfferOrder;
use App\OrderStatus;
use App\Order;
use App\User;
use Illuminate\Http\Request;


class DatabaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $admins = Role::with('users')->where('role','admin')->get();

/*        $admins = User::whereHas('role', function ($query) {
            $query->where('role', 'admin');
        })->pluck('email')->toArray();
        */
        $user = User::find(4)->toArray();
//        $order = Order::where('user_id',$user->id)->where('status_id','1')->first()->id;
//        $order = OrderStatus::where('status','like','Basket')->first()->id;

//            ;
        dd($user);
//        $quantities = [];
//        $quantities = $order->offers()->get();
//        for($i=0;$i<$order->offers()->count();$i++){
////            $quantities += $order->offers()->first()->pivot->quantity;
//             array_push($quantities, $order->offers()->find($i)->pivot->quantity);
//        }
//        $quantities = $order->offers()->first()->pivot->quantity;
//        return dd($order->offers()->first()->pivot->quantity);
//        return dd($order->offers->sum('pivot.quantity'));
//        $admins = $admins->max('id');

//        dd(json_decode($admins));
//        dd($order);

//        $offers1 = Offer::where('places_free','>=','1')->get();

        $offers = Offer::all()->sum('places_max');
        $offersWithPlaces = Offer::all()->sum('places_free');
        $ordersSum = OfferOrder::all()->sum('quantity');

        return view('guest.database', compact('order','offers','offersWithPlaces','ordersSum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
