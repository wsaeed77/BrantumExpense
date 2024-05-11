<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function Show_Login(){

        return view('frontend.login');


    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            if ($user->is_approved) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            } else {
                Auth::logout();
                return back()->withErrors(['username' => 'Your account is not approved.']);
            }
        }
        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function userApproval(){

        $unapprovedUsers = User::all()->where('is_approved', 0);
          return view('frontend.userapproval',compact('unapprovedUsers'));

    }

    public function approve(Request $request, $id){



       $user = User::findOrFail($id) ;
       $user->update(['is_approved'=> 1]) ;

         $user->save();

       return redirect()->route('user.approval');

    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('user.approval');
        }
        return response()->json(['error' => 'User not found'], 404);
    }


}

