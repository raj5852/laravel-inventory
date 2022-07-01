<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function postLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (request()->user()->hasAllPermissions(['product-input', 'stock'])) {

                return redirect()->intended('dashboard')
                    ->withSuccess('You have Successfully loggedin');

            } elseif (request()->user()->hasAllPermissions(['product-output'])) {
                return redirect()->intended('product-sale')
                    ->withSuccess('You have Successfully loggedin');
            } else {
                return redirect()->intended('productinput')
                    ->withSuccess('You have Successfully loggedin');
            }
        }

        return redirect("/")->withSuccess('Oppes! You have entered invalid credentials');
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }
}
