<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    public function regist() {

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $name = request()->name;
        $email = request()->email;
        $pass = Hash::make(request()->password);
        
        $user = User::create(['name'=>$name,'email'=>$email,'password'=>$pass,]);
        
        auth()->login($user);
        
        return redirect()->route('home_master');

    }

    public function login(Request $request)
    {
        $login = $request->validate(
        [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($login)) 
        {
            $request->session()->regenerate();

            return redirect()->intended();
        }

        return back()->withErrors(
        [
            'email' => 'The provided credentials do not match our records.',
        ])  ->onlyInput('email');
    }

    public function hh()
    {
        // dd('agay');
        Auth::logout();
        return redirect()->route('home_master');
    }
}
