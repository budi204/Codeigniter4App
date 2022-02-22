<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function about($name = '', $age = 0) {
        echo "Hello nama saya $name, umur $age tahun";
    }
}
