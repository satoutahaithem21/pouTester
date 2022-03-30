<?php

namespace App\Http\Controllers;
use App\Models\device;

use Illuminate\Http\Request;

class deviceController extends Controller
{
function list($id){
    return device::find($id);
}
}
