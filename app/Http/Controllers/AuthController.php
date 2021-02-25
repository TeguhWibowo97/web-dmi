<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('/auths/login');
    }
    public function postlogin(Request $request)
    {
        // return view('/auths/login');

        if(Auth::attempt($request->only('name','password'))){
            return redirect('/dashboard');
        }else{
            return redirect('login')->with('status','Username atau Password salah !');
        }
        // return $request;
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

}
