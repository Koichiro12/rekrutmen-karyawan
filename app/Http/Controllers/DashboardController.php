<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
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
    public function updateProfile(Request $request){
        
        $id = auth()->user()->id;
        $oldData = User::findOrFail($id);
        $validate = \Validator::make($request->all(),[
            'name' => ['required'],
            'user_phone' => ['required'],
            'username' => ['required'],
            'email' => ['required','email'],
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $request['password'] = Hash::make($request['password']);
        $user_image = $request->file('foto'); 
        if( $request->hasFile('foto')){
            $result = date('Ymdhis').$user_image->getClientOriginalName();
            $user_image->move($this->defaultUploadFileDir,$result);
            $request['user_image'] = $result;
        }
        if(!isset($request['foto']) || $request['foto'] == null){
            $request['user_image'] = $oldData->user_image;   
        }
        if($request['password'] != '' || $request['password'] == null){
            $request['password'] = $oldData->password;   
        }
        return User::updateData($id,$request,['foto']) ? redirect()->back()->with('sukses',"Update Profile Successfully") : redirect()->back()->with('eror',"Update Profile Failed, Please Try Again") ;
    }
}
