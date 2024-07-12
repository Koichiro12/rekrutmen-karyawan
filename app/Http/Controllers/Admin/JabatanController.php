<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;
use Validator;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = $this->getPageData();
        $data['page_name'] = 'Positions';
        $data['page_subname'] = 'Positions data will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Positions','link' => route('position.index'),'status' => 'active']]);
        $position = Position::latest()->get();
        return view('pages.admin.position.index',compact(['data','position']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = $this->getPageData();
        $data['page_name'] = 'Create Position';
        $data['page_subname'] = 'Create Position here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Positions','link' => route('position.index'),'status' => ''],['name' => 'Create Position','link' => route('position.create'),'status' => 'active']]);
       
        return view('pages.admin.position.create',compact(['data']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = Validator::make($request->all(),[
            'position' => ['required']
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        return Position::insertData($request) ? redirect()->route('position.index')->with('sukses','Create Position Successfully') : redirect()->back()->with('eror','Oops,Something Went Wrong, Please Try again');
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
        $data['page_name'] = 'Edit Position';
        $data['page_subname'] = 'Edit Position here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Positions','link' => route('position.index'),'status' => ''],['name' => 'Edit Position','link' => route('position.edit',$id),'status' => 'active']]);
        $position = Position::findOrFail($id);
        return view('pages.admin.position.edit',compact(['data','position']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validate = Validator::make($request->all(),[
            'position' => ['required']
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        return Position::updateData($id,$request) ? redirect()->route('position.index')->with('sukses','Update Position Successfully') : redirect()->back()->with('eror','Oops,Something Went Wrong, Please Try again');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return Position::deleteData($id) ? 
        redirect()->route('position.index')->with('sukses','Delete Position Successfully') :
        redirect()->back()->with('eror','Oops,Something Went Wrong, Please Try again');
    }
}
