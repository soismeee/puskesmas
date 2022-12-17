<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home/index');
    }

    public function pelayanan(){
        return view('home/pelayanan');
    }

    public function kontak(){
        return view('home/kontak');
    }
}
