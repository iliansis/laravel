<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Cat;
use App\Models\Order;


class adminController extends Controller
{
    
    public function admin(){
        $cats=Cat::all();
        $orders=Order::select('orders.id as id','orders.desc as desc', 'cats.name as name','orders.adres as adres','orders.status as status','orders.photo_start as photo_start')
        ->join('cats','cats.id','orders.cats')->get();
        return view('admin',['cats'=>$cats,'orders'=>$orders]);
    }

    public function addCats(Request $r){
       $validator=Validator::make($r->all(),[
          'name'=>'required'
       ]);
       if($validator->fails()) return response()->json(['errors'=>$validator->errors()],400);

       Cat::create([
           'name'=>$r->name,
       ]);
        
        return redirect()->route('admin');
    }

    public function deleteCats($id){
        Cat::where('id',$id)->delete();
        return redirect()->route('admin');
    }

    public function change(Request $r){
        
    }

}

