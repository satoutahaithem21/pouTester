<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class myFirstContr extends Controller
{
    function getData(){
        return ["name"=>"Haithem","email"=>"s.haithem@esi-sba.dz","adress"=>"ben azouz"];
    }
}
