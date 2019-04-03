<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public $navItemsUser = ['Tours', 'Hotels', 'My Orders', 'My Account', 'Test'];
    public $navItemsAdmin = ['Tours', 'Hotels', 'Users', 'Orders'];


    public function home()
    {
        $data = array(
            'navItems' => $this->navItemsUser
        );
        return view('pages.home')->with($data);
    }

    public function tours()
    {
        $data = array(
            'navItems' => $this->navItemsUser,
        );
        return view('pages.tours')->with($data);
    }

    public function hotels()
    {
        $data = array(
            'navItems' => $this->navItemsUser
        );
        return view('pages.hotels')->with($data);
    }

//    TODO Test getting data from DB on test site
    public function test()
    {
//        $users = DB::select("SELECT * FROM `users`");
        $data = array(
            'navItems' => $this->navItemsUser,
            'fields' => ['Military transport', 'Medivac', 'Casual trips', 'LSD trips', 'Laravel travels', 'Heavy drinking', 'Die Waffen liegt an!']
        );
        return view('pages.test')->with($data);
    }


    /*    public function showusers()
        {
            $config = array(
                'title' => 'Show Users',
                'customStyles' => 'tours',
                'navItems' => $this->navItemsUser,
            );
    //        return view('showusers')->with($data);
            return redirect()->action('UsersController@index');
        }*/

}