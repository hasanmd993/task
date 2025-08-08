<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthController extends Controller
{
    public function showRegister(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'name'=>'required|string|min:2|max:50',
            'email'=>'required|email|unique:users',
            'password'=>'required|string|min:8|confirmed',
        ]);

        $u = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=> Hash::make($request->password),

        ]);

        Auth::login($u);
        return redirect('/dashboard');
    }

    public function showLogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
             $request->session()->flash('success', 'Login successful!');
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors(['message' => 'Invalid email or password!']);
    }

    public function logout(){
        Auth::logout();
        return redirect('/dashboard');
    }
}
