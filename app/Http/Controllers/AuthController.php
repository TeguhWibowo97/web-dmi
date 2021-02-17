<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('/auths/login');
    }
    public function postlogin(Request $request)
    {
        // return view('/auths/login');
        return $request;
    }

}
