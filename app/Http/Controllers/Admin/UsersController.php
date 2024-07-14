<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
        $data['page_name'] = 'Create User';
        $data['page_subname'] = 'Create User here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Users','link' => route('users.index'),'status' => ''],['name' => 'Create User','link' => route('users.create'),'status' => 'active']]);
        $users = User::findOrFail($id);
        return view('pages.admin.users.edit',compact(['data','users']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
