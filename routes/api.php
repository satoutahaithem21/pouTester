<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\myFirstContr;
use App\Http\Controllers\deviceController;
use App\Http\Controllers\register;
use App\Models\device;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("data",[myFirstContr::class,"getData"]);
Route::get("list/{id}",[deviceController::class,"list"]);
Route::get("register",[register::class,"create"]);