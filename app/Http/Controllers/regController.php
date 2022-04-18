<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cat;
use App\Models\Order;

class regController extends Controller
{

    public function index(){
        $orders=Order::select('orders.id as id','orders.desc as desc', 'cats.name as name','orders.adres as adres','orders.status as status','orders.photo_start as photo_start','orders.photo_end as photo_end')
        ->join('cats','cats.id','orders.cats')
        ->where('orders.status', '=', 'Выполнено')->orderBy(	'orders.created_at','desc')->limit(4)->get();
        $countOrder=Order::selectRaw('COUNT(orders.id) as count')->where('orders.status','Выполнено')->first();
        return view('welcome',['orders'=>$orders,'countOrder'=>$countOrder]);
    }

    public function reg(Request $r){
        $validator=Validator::make($r->all(),[
            'fio'=>'required|string',
            'login'=>'required|string|unique:App\Models\User,login',
            'email'=>'required|email:rfc',
            'pass1'=>'required|string|same:pass2',
            'pass2'=>'required|string|same:pass1'
        ]);

        if($validator->fails()) return response()->json(['errors'=>$validator->errors()],400);

        User::create([
            'fio'=>$r->fio,
            'login'=>$r->login,
            'email'=>$r->email,
            'password'=>Hash::make($r->pass1),
            'is_admin'=>'0'
        ]);

        return response()->json(['success'=>'yes'],200);
    }

    public function auth(Request $r){
        $validator=Validator::make($r->all(),[
            'login'=>'required|string',
            'password'=>'required|string'
        ]);
        if($validator->fails()) return response()->json(['errors'=>$validator->errors()],400);

        if (Auth::attempt(['login'=>$r->login,'password'=>$r->password])){
            return redirect()->route('home');
        } else {
            return response()->json(['errors'=>['form'=>'Ошибка авторизации']],401);
        }
    }   
    
}

