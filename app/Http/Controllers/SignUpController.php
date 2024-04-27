<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function showSignUpForm()
    {
        return view('frontend.signup');
    }

    public function signUp(Request $request)
    {
        $request->validate([

            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'username'=> $request->input('username'),
            'user_type'=>'owner',
        ]);

        $user->save();

        return redirect()->route('logpg')->with('success', 'Your account has been created successfully. You can now log in.');
    }
}
