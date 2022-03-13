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
        $orders=Order::where('user',Auth::user()->id)->join('cats','cats.id','orders.cat')->get();
        return view('profile',['cat'=>$cat,'orders'=>$orders]);
    }

    public function addOrder(Request $r){
      
        $validator=Validator::make($r->all(),[
            'name'=>'required|string',
            'desc'=>'required|string',
            'photo_start'=>'required|file'                   
        ]);

        if($validator->fails()) return response()->json(['errors'=>$validator->errors()],400);
        
        // $contents = $file->openFile()->fread($file->getSize()); 

        Order::create([
            'name'=>$r->name,
            'desc'=>$r->desc,
            'cats'=>$r->cats,
            'user'=>Auth::user()->id,
            'photo_start'=>$r->photo_start->store('img','public')
        ]);
      
        return redirect()->route('profile');
    }

    public function deleteOrder($id){
        Order::where('id',$id)->delete();
        return redirect()->route('profile');
    }

    public function filter(Request $r){
        switch($r->status){
            case 'Все':
                $orders=Order::where('user',Auth::user()->id)->join('cats','cats.id','orders.cat')->get();
                break;
        }
    }

}
