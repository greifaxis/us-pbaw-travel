<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
//    public $navItemsUser = ['Home','Tours', 'Hotels', 'My Orders', 'My Account', 'Test'];
//    public $navItemsAdmin = ['Tours', 'Hotels', 'Users', 'Orders'];
//

    public function home()
    {
        /*        $data = array(
                    'navItems' => $this->navItemsUser
                );
                return view('pages.home')->with($data);*/
        return view('pages.home');
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
}