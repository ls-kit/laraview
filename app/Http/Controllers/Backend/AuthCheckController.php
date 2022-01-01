<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthCheckController extends Controller
{
    public function checkIsLogin()
    {
        if(Auth::check()){
            return response()->json([
                'login' => true,
            ]);
        }else{
            return response()->json([
                'login' => true,
            ]);
        }
    }
}
