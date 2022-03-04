<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class regController extends Controller
{
    public function reg(Request $r){
        $validator=Validator::make($r->all(),[
            'fio'=>'required|string',
            'login'=>'required|string|unique:App\Models\User,login',
            'email'=>'required|email:rfc',
            'pass1'=>'required|string',
            'pass2'=>'required|string'
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
        return response()->json(['success'=>'yes'],200);
    }
    }   

