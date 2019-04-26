<?php

namespace App\Http\Controllers;

use App\OfferOrder;
use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\OrderStatus;

class OrdersController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereHas('role', function ($query) {$query->where('role', 'user');})->get();
        $admins = User::whereHas('role', function ($query) {$query->where('role', 'admin');})->get();
        $orders = Order::where('status_id','>','1')->with('offers')->get();
        $pivots = OfferOrder::get();
        $statuses = OrderStatus::all()->pluck('status')->toArray();


        return view('admin.showorders',compact('users','admins','orders','pivots','statuses'));
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
        $user = Hotel::find($id);
        $user->delete();

        return redirect('/hotels')->with('success', 'Stock has been deleted Successfully');
    }
}
