<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\regController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\adminController;
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

// Route::get('/', function () {
//     return view('welcome')->name('home');
// });

Route::get('/',[regController::class,'index'])->name('home');

Route::middleware(['guest'])->group(function(){
    Route::post('/reg',[regController::class,'reg'])->name('reg');
    Route::post('/auth',[regController::class,'auth'])->name('auth');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/profile',[AuthController::class,'profile'])->name('profile');
    Route::get('/profile/delet/{id}', [AuthController::class,'deleteOrder'])->name('deleteOrder');
    Route::post('/profile/filter' , [AuthController::class,'filter'])->name('filter');
    Route::post('/addOrder',[AuthController::class,'addOrder'])->name('addOrder');
       
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/superadmin',[adminController::class,'admin'])->name('admin');
    Route::post('/addCats',[adminController::class,'addCats'])->name('addCats');
    Route::get('/superadmin/delete/{id}',[adminController::class,'deleteCats'])->name('deleteCats');
});

