<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;

class LoginController extends Controller
{
    //

    
    public function __construct(){
        
    }
    public function index(){
        return Auth::check() ? redirect()->route('dashboard') :  view('pages.auth.login');
    }
    public function auth(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => ['required','email'],
            'password' => ['required'],
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);
        $rm = $request->input('remember-me');
        $remember_me = $rm != null ? true : false;
        if(Auth::attempt($credentials,$remember_me)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return redirect('login')->with('eror','Email atau password salah / tidak terdaftar')->onlyInput('email');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login')->with('sukses','Logout Berhasil');
    }
}
