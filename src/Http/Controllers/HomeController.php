<?php

namespace App\Http\Controllers;

class HomeController
{

    public function index()
    {
        return view('home/index', [
            'id' => 89,
            'name' => 'admin'
        ]);
    }

}