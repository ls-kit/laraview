<?php

namespace App\Http\Controllers\Backend\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(Request $request)
    {

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['nullable', 'confirmed'],
            'user_type' => ['required']
        ]);

        if(auth()->user()->is_admin == 1){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'user_type' => $request->user_type == 1 ? '1' : '0',
                'password' => $request->password
            ]);
        }else{
            return response()->json([
                'message' => 'You are not authorized to perform this action.'
            ], 403);
        }

        return response($user);

    }
}
