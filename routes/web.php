<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/{funcParam}', function ($parm) {
    $path=__DIR__ . "/../resources/posts/{$parm}.html";
    ddd($path);
    if (!file_exists($path)){
        return redirect('/');
    }

    $varWelcome=file_get_contents($path);
    cache()::remember("funcPram.{$parm}",5,function(){
        return file_get_contents($path);
    });
   return view("p",
   ['varP'=>$varWelcome]
);
})->where('funcParam',);
Route::get('/', function () {
   return view('welcome', ['varP'=>'<h1>Hello world</h1>']);
});


