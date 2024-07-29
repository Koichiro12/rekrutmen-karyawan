<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = $this->getPageData();
        $id = auth()->user()->id;
        $data['page_name'] = 'Experiences';
        $data['page_subname'] = 'Experiences data will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Experiences','link' => route('experiences.index'),'status' => 'active']]);
        $experience = Experience::where('user_id','=',$id)->latest()->get();
        return view('pages.user.experiences.index',compact(['data','experience']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = $this->getPageData();
        $data['page_name'] = 'Create Experiences';
        $data['page_subname'] = 'Create Experiences data here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Experiences','link' => route('experiences.index'),'status' => ''],['name' => 'Create Experiences','link' => route('experiences.create'),'status' => 'active']]);
        return view('pages.user.experiences.create',compact(['data']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = \Validator::make($request->all(),[
            'last_job_departement' => ['required'],
            'company_name' => ['required'],
            'last_job_position' => ['required'],
            'start_job' => ['required'],
            'end_job' => ['required'],
            'salary' => ['required'],
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        return Experience::insertData($request,[],null,true) 
        ? redirect()->route('experiences.index')->with('sukses',"Create Experience Successfully") 
        : redirect()->back()->with('eror',"Create Experience Failed, Please Try Again") ;
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
        $data['page_name'] = 'Edit Experiences';
        $data['page_subname'] = 'Edit Experiences data here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Experiences','link' => route('experiences.index'),'status' => ''],['name' => 'Edit Experiences','link' => route('experiences.edit',$id),'status' => 'active']]);
        $experiences = Experience::findOrFail($id);
        return view('pages.user.experiences.edit',compact(['data','experiences']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validate = \Validator::make($request->all(),[
            'last_job_departement' => ['required'],
            'company_name' => ['required'],
            'last_job_position' => ['required'],
            'start_job' => ['required'],
            'end_job' => ['required'],
            'salary' => ['required'],
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        return Experience::updateData($id,$request) 
        ? redirect()->route('experiences.index')->with('sukses',"Update Experience Successfully") 
        : redirect()->back()->with('eror',"Update Experience Failed, Please Try Again") ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return Experience::deleteData($id) ? 
        redirect()->route('experiences.index')->with('sukses','Delete Experiences Successfully') :
        redirect()->back()->with('eror','Oops,Something Went Wrong, Please Try again');
    }
}
