<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = $this->getPageData();
        $data['page_name'] = 'Users';
        $data['page_subname'] = 'Users data will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Users','link' => route('users.index'),'status' => 'active']]);
        $users = User::latest()->get();
        return view('pages.admin.users.index',compact(['data','users']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = $this->getPageData();
        $data['page_name'] = 'Create User';
        $data['page_subname'] = 'Create User here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Users','link' => route('users.index'),'status' => ''],['name' => 'Create User','link' => route('users.create'),'status' => 'active']]);
        return view('pages.admin.users.create',compact(['data']));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
          $validator = \Validator::make($request->all(),[
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required','email','unique:users'],
            'password' => ['required'],
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $request['password'] = Hash::make($request['password']);
        $user_image = $request->file('foto');
        if( $request->hasFile('foto')){
            $result = date('Ymdhis').$user_image->getClientOriginalName();
            $user_image->move($this->defaultUploadFileDir,$result);
            $request['user_image'] = $result;
        }
        if(!isset($request['foto']) || $request['foto'] == null){
            $request['user_image'] = '-';   
        }
        if(!isset($request['user_phone']) || $request['user_phone'] == null){
            $request['user_phone'] = '-';   
        }
        if(User::insertData($request,['foto'])){
            return redirect()->route('users.index')->with('sukses','Create Users Successfully');
        }
        return redirect()->back()->with('eror','Oops Something Went Wrong');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = $this->getPageData();
        $data['page_name'] = 'Edit User';
        $data['page_subname'] = 'Edit User here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Users','link' => route('users.index'),'status' => ''],['name' => 'Create User','link' => route('users.create'),'status' => 'active']]);
        $user = User::findOrFail($id);
        return view('pages.admin.users.edit',compact(['data','user']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
        return User::updateData($id,$request,['foto']) ? redirect()->route('users.index')->with('sukses',"Update Users Successfully") : redirect()->back()->with('eror',"Update User Failed, Please Try Again") ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $oldData = User::findOrFail($id);
        if($oldData->user_image != '-' || $oldData->user_image != null){
            unlink($this->defaultUploadFileDir.'/'.$oldData->user_image);
        }
        return User::deleteData($id) ? 
        redirect()->route('users.index')->with('sukses','Delete Users Successfully') :
        redirect()->back()->with('eror','Oops,Something Went Wrong, Please Try again');
    }
}
