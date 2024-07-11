<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function __construct(){
     
    }
    public function index(){
        $data = $this->getPageData();
        return view('pages.admin.dashboard',compact(['data']));
    }
    public function profile(){
        $data = $this->getPageData();
        $data['page_name'] = 'Profile';
        $data['page_subname'] = 'Your Profile Here';
       
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Profile','link' => route('profile'),'status' => 'active']]);
        $user = User::findOrFail(auth()->user()->id);
        return view('pages.admin.profile',compact(['data','user']));
    }
    public function updateProfile(){
        
    }
}
