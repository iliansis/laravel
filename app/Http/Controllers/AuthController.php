<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cat;

class AuthController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function profile(){
        return view('profile');
    }

    public function zz(){
        $cats=Cat::all();
        return view('profile',['cats'=>$cats]);
    }

}
