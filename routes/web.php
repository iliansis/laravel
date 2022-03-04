<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\regController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/reg',[regController::class,'reg'])->name('reg');
Route::post('/auth',[regController::class,'auth'])->name('auth');
