<?php

namespace App\Http\Controllers;

use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Order;
use App\OrderStatus;
use App\OfferOrder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*    public function __construct()
        {
            $this->middleware('auth');
        }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        return view('home');
    }

    public function tours()
    {
        return view('pages.tours');
    }

    public function createOrdersReport()
    {
        $data = [

            'orders' => $orders = Order::where('status_id', '>', '1')->with('offers')->get()->sortByDesc('placed_at'),

            'pivots' => $pivots = OfferOrder::get(),
            'statuses' => $statuses = OrderStatus::all()->pluck('status')->toArray()
        ];
        $pdf = PDF::loadView('admin.ordersreport', $data);
        return $pdf->stream('medium.pdf');
    }

    public function randomusers()
    {
        $user = User::whereHas('role', function ($query) {
            $query->where('role', 'user');
        })->get()->random();
        return response()->json([
            'firstName' => $user->firstName,
            'lastName' => $user->lastName,
            'ordersCount' => $user->orders()->count()
        ]);
    }
}
