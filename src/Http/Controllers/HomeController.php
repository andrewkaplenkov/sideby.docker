<?php

namespace App\Http\Controllers;

use Lilo\Core\Controller\BaseController;

class HomeController extends BaseController
{

    public function index()
    {
        return view('home/index', [
            'id' => 89,
            'name' => 'admin'
        ]);
    }

}