<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use Illuminate\Http\Request;
use Validator;

class DepartemenController extends Controller
{

    public function __construct(){
       
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $this->RolesAllowed(['Admin']);
        $data = $this->getPageData();
        $data['page_name'] = 'Departement';
        $data['page_subname'] = 'Department data will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Departement','link' => route('departement.index'),'status' => 'active']]);
        $departement = Departement::latest()->get();
        return view('pages.admin.departement.index',compact(['data','departement']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->RolesAllowed(['Admin']);
        $data = $this->getPageData();
        $data['page_name'] = 'Create Departement';
        $data['page_subname'] = 'Create Department here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Departement','link' => route('departement.index'),'status' => ''],['name' => 'Create Departement','link' => route('departement.create'),'status' => 'active']]);
        return view('pages.admin.departement.create',compact(['data']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
     

        $validate = Validator::make($request->all(),[
            'departement' => ['required']
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        return Departement::insertData($request) ? redirect()->route('departement.index')->with('sukses','Create Departement Successfully') : redirect()->back()->with('eror','Oops,Something Went Wrong, Please Try again');
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
        $this->RolesAllowed(['Admin']);
        $data = $this->getPageData();
        $data['page_name'] = 'Edit Departement';
        $data['page_subname'] = 'Edit Department here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Departement','link' => route('departement.index'),'status' => ''],['name' => 'Edit Departement','link' => route('departement.edit',$id),'status' => 'active']]);
        $departement = Departement::findOrFail($id);
        return view('pages.admin.departement.edit',compact(['data','departement']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validate = Validator::make($request->all(),[
            'departement' => ['required']
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        return Departement::updateData($id,$request) ? redirect()->route('departement.index')->with('sukses','Update Departement Successfully') : redirect()->back()->with('eror','Oops,Something Went Wrong, Please Try again');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return Departement::deleteData($id) ? 
        redirect()->route('departement.index')->with('sukses','Delete Departement Successfully') :
        redirect()->back()->with('eror','Oops,Something Went Wrong, Please Try again');
    }
}
