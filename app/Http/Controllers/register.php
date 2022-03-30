<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class register extends Controller
{
    public function create(){
        return view("register.create");
    }
}
