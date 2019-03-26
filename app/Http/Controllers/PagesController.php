<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public $navItems = ['About', 'Tours', 'Show Users'];

    public function home()
    {
        $title = 'Home page!';
        return view('home')->with('title', $title);
    }


    public function about()
    {
//        $users = DB::select("SELECT * FROM `users`");
        $title = array(
            'title' => 'About'
        );
        $config = array(
            'customStyles' => 'tours',
            'navItems' => array_diff($this->navItems, array($title['title'])),
            'fields' => ['Military transport', 'Medivac', 'Casual trips', 'LSD trips', 'Laravel travels', 'Heavy drinking', 'Die Waffen liegt an!']
        );
        $data = array_merge($title, $config);
        return view('about')->with($data);
    }

    public function tours()
    {
        $title = array(
            'title' => 'Tours'
        );
        $config = array(
            'customStyles' => 'tours',
            'navItems' => array_diff($this->navItems, array($title['title'])),
        );
        $data = array_merge($title, $config);
        return view('tours')->with($data);
    }

    public function showusers()
    {
        $title = array(
            'title' => 'Show Users'
        );
        $config = array(
            'customStyles' => 'tours',
            'navItems' => array_diff($this->navItems, array($title['title'])),
        );
        $data = array_merge($title, $config);
//        return view('showusers')->with($data);
        return redirect()->action('UsersController@index');
    }

}