<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use   Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    //
    function index(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['id'] =  $user->id;
            $success['name'] =  $user->name;
            $success['email'] =  $user->email;

            return response()->json([

                'message' => 'success',
                'id'=>$success['id'],
                'name'=>$success['name'],
                'email'=>$success['email'],

            ]);
        } else {
            return request()->json('Unauthorised.', ['message' => 'Unauthorised']);
        }
    }
}
