<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function __construct(){

    }
    public function index(){
        return view('pages.auth.register');
    }
    public function register(Request $request){
        $validator = \Validator::make($request->all(),[
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required','email','unique:users'],
            'password' => ['required','confirmed'],
            'password_confirmation' => ['required']
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if(User::insertData($request,['password_confirmation'])){
            return redirect()->route('login')->with('sukses','Register Successfully, Please Login here !');
        }
    }
}
