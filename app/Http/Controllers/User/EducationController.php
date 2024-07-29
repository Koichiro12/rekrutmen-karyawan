<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Educations;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = $this->getPageData();
        $id = auth()->user()->id;
        $data['page_name'] = 'Educations';
        $data['page_subname'] = 'Educations data will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Educations','link' => route('educations.index'),'status' => 'active']]);
        $educations = Educations::where('user_id','=',$id)->latest()->get();
        return view('pages.user.educations.index',compact(['data','educations']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = $this->getPageData();
        $data['page_name'] = 'Create Educations';
        $data['page_subname'] = 'Create Educations data here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Educations','link' => route('educations.index'),'status' => ''],['name' => 'Create Education','link' => route('educations.create'),'status' => 'active']]);
        return view('pages.user.educations.create',compact(['data']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = \Validator::make($request->all(),[
            'last_education' => ['required'],
            'school_name' => ['required'],
            'city' => ['required'],
            'major_education' => ['required'],
            'start_year' => ['required'],
            'end_year' => ['required'],
            'average_value' => ['required'],
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        return Educations::insertData($request,[],null,true) ? redirect()->route('educations.index')->with('sukses',"Create Educations Successfully") : redirect()->back()->with('eror',"Create Educations Failed, Please Try Again") ;

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
        $data['page_name'] = 'Edit Educations';
        $data['page_subname'] = 'Edit Educations data here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Educations','link' => route('educations.index'),'status' => ''],['name' => 'Edit Education','link' => route('educations.edit',$id),'status' => 'active']]);
        $education = Educations::findOrFail($id);
        return view('pages.user.educations.edit',compact(['data','education']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validate = \Validator::make($request->all(),[
            'last_education' => ['required'],
            'school_name' => ['required'],
            'city' => ['required'],
            'major_education' => ['required'],
            'start_year' => ['required'],
            'end_year' => ['required'],
            'average_value' => ['required'],
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        return Educations::updateData($id,$request) ? redirect()->route('educations.index')->with('sukses',"Update Educations Successfully") : redirect()->back()->with('eror',"Update Educations Failed, Please Try Again") ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return Educations::deleteData($id) ? 
        redirect()->route('educations.index')->with('sukses','Delete Educations Successfully') :
        redirect()->back()->with('eror','Oops,Something Went Wrong, Please Try again');
    }
}
