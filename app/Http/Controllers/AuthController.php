<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Cat;
use App\Models\Order;

class AuthController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function profile(){
        $cat=Cat::all();
        $orders=Order::all();
        return view('profile',['cat'=>$cat,'orders'=>$orders]);
    }

    public function addOrder(Request $r){
      
        $validator=Validator::make($r->all(),[
            'photo_start'=>'required|max:2097152'
        ]);

        if($validator->fails()) return response()->json(['errors'=>$validator->errors()],400);
        
        // $contents = $file->openFile()->fread($file->getSize()); 
      
        return ('успех');
    }

}
