<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $title = 'Home page!';
        return view('home')->with('title', $title);
    }


    public function about()
    {
        $stuff = array(
            'title' => 'About',
            'fields' => ['Military transport', 'Medivac', 'Casual trips', 'LSD trips', 'Laravel travels', 'Heavy drinking', 'Die Waffen liegt an!']
        );
        return view('about')->with($stuff);
    }

    public function offers()
    {
//        $title = 'Home page!';
        return view('offers');
    }

}
