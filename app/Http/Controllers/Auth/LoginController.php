<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function __construct(){

    }
    public function index(){
        return view('pages.auth.login');
    }
    public function auth(){

    }
    public function logout(){

    }
}
