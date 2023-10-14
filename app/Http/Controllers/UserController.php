<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function login(){
        if(Auth::check()) {
            return redirect()->route('templates');            
        }
        return view('login');
    }


    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('templates');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }



    public function profile(){
        return view('profile');
    }


    public function profile_post($type, Request $request){
        $user = User::where('id', Auth::id())->first();
        $message = '';

        if($type == 'email'){
            $request->validate([
                'email' => 'required|unique:users|email',
            ]);

            $user->email = $request->email;
            $user->save();

            $message = 'Email updated successfully.';

        } else if($type == 'password') {
            $request->validate([
                'password'         => 'required',
                'password_confirm' => 'required|same:password'
            ]);

            $user->password = Hash::make($request->password);
            $user->save();

            $message = 'Password updated successfully.';

        }
        return redirect()->route('profile')->with('success', $message);

    }


}
