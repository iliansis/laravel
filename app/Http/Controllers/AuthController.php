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
        $orders=Order::where('user',Auth::user()->id)->join('cats','cats.id','orders.cats')->get();
        return view('profile',['cat'=>$cat,'orders'=>$orders]);
    }

    public function addOrder(Request $r){
      
        $validator=Validator::make($r->all(),[
            'adres'=>'required|string',
            'desc'=>'required|string',
            'photo_start'=>'required|file'                   
        ]);

        if($validator->fails()) return response()->json(['errors'=>$validator->errors()],400);
        
        // $contents = $file->openFile()->fread($file->getSize()); 

        Order::create([
            'adres'=>$r->adres,
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
                $orders=Order::select('orders.id as id','orders.desc as desc', 'cats.name as name','orders.adres as adres','orders.status as status','orders.photo_start as photo_start')->join('cats','cats.id','orders.cats')->where('user',Auth::user()->id)->get();
                break;

                default:
                $orders=Order::select('orders.id as id','orders.desc as desc', 'cats.name as name','orders.adres as adres','orders.status as status','orders.photo_start as photo_start')->join('cats','cats.id','orders.cats')->where('user',Auth::user()->id)
                ->where('orders.status', $r->status)->get();
                break;
                
                
                // return 'qwe';
        }
        return view('incl.order',['orders'=>$orders]);

    }

}
