<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

    }
}
