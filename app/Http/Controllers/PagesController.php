<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function home()
    {
        $title = 'Home page!';
        return view('home')->with('title', $title);
    }


    public function about()
    {
//        $users = DB::select("SELECT * FROM `users`");
        $data = array(
            'title' => 'About',
            'customStyles' => 'tours',
            'navItems' => ['Tours', 'Show Users'],
            'fields' => ['Military transport', 'Medivac', 'Casual trips', 'LSD trips', 'Laravel travels', 'Heavy drinking', 'Die Waffen liegt an!']
        );

        return view('about')->with($data);
    }

    public function tours()
    {
        $data = array(
            'title' => 'Tours',
            'customStyles' => 'tours',
            'navItems' => ['About', 'Show Users']
        );
        return view('tours')->with($data);
    }

    public function showusers()
    {
        $data = array(
            'title' => 'Show Users',
            'customStyles' => 'tours',
            'navItems' => ['About', 'Tours']
        );
        return view('showusers')->with($data);
    }

}