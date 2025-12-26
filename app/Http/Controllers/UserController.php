<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function login(Request $request){
        $incomingFields =$request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);

        if (auth()->attempt(['name' => $incomingFields['loginname'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
        } 
        return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }


    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => 'required|string|max:255',Rule::unique('user','name'),
            'email' => 'required|string|email|max:255',Rule::unique('user','email'),
            'password' => 'required|string|min:8|confirmed'
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);

        $user= User::create($incomingFields);
        auth()->login($user);
        return redirect('/')->with('success', 'Account created successfully!');
    }

    public function showRegisterForm() {
        return view('auth.register');
    }

    public function showLoginForm() {
        return view('auth.login');
    }
}
