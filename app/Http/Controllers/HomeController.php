<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        /*        $data = array(
                    'navItems' => $this->navItemsUser
                );
                return view('pages.home')->with($data);*/
        return view('home');
    }

    public function tours()
    {
        return view('pages.tours');
    }

    public function hotels()
    {
        return view('pages.hotels');
    }

    public function test()
    {
        return view('pages.test');
    }

    public function admin()
    {
        return view('admin');
    }
}
