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
        $data = array(
            'title' => 'About',
            'customStyles' => 'offers',
            'navItems' => ['Offers'],
            'fields' => ['Military transport', 'Medivac', 'Casual trips', 'LSD trips', 'Laravel travels', 'Heavy drinking', 'Die Waffen liegt an!']
        );
        return view('about')->with($data);
    }

    public function offers()
    {
        $data = array(
            'title' => 'Offers',
            'customStyles' => 'offers',
            'navItems' => ['About']
        );
        return view('offers')->with($data);
    }

}
