<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use App\Models\Job;
use App\Models\Position;
use App\Models\Psikotes;
use App\Models\Test;
use Illuminate\Http\Request;
use Validator;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = $this->getPageData();
        $data['page_name'] = 'Jobs';
        $data['page_subname'] = 'Jobs data will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Jobs','link' => route('jobs.index'),'status' => 'active']]);
        $jobs = Job::join('departements','jobs.departement_id','=','departements.id')->join('positions','jobs.position_id','=','positions.id')->get(['jobs.*','positions.position','departements.departement']);
        return view('pages.admin.jobs.index',compact(['data','jobs']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = $this->getPageData();
        $data['page_name'] = 'Create Job';
        $data['page_subname'] = 'Create Job data here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Jobs','link' => route('jobs.index'),'status' => ''],['name' => 'Create Job','link' => route('jobs.create'),'status' => 'active']]);
        $departement = Departement::latest()->get();
        $position = Position::latest()->get();
        return view('pages.admin.jobs.create',compact(['data','departement','position']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = Validator::make($request->all(),[
            'job_name' => ['required'],
            'departement_id' => ['required'],
            'position_id' => ['required'],
            'max_age' => ['required'],
            'min_education' => ['required'],
            'major_education' => ['required'],
            'salary' => ['required'],
            'open_date' => ['required'],
            'close_date' => ['required'],
            'job_desc' => ['required'],
            'job_criteria' => ['required']
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $date_now = date('Y-m-d');
        $request['status'] = $request['open_date'] >= $date_now && $request['close_date'] >= $date_now ? '1' : '0';
        return Job::insertData($request) ? redirect()->route('jobs.index')->with('sukses','Create Job Successfully') : redirect()->back()->with('eror','Oops,Something Went Wrong, Please Try again');
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
        $data['page_name'] = 'Edit Job';
        $data['page_subname'] = 'Edit Job data here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Jobs','link' => route('jobs.index'),'status' => ''],['name' => 'Edit Job','link' => route('jobs.edit',$id),'status' => 'active']]);
        $job = Job::findOrFail($id);
        $departement = Departement::latest()->get();
        $position = Position::latest()->get();
        return view('pages.admin.jobs.edit',compact(['data','departement','position','job']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validate = Validator::make($request->all(),[
            'job_name' => ['required'],
            'departement_id' => ['required'],
            'position_id' => ['required'],
            'max_age' => ['required'],
            'min_education' => ['required'],
            'major_education' => ['required'],
            'salary' => ['required'],
            'open_date' => ['required'],
            'close_date' => ['required'],
            'job_desc' => ['required'],
            'job_criteria' => ['required']
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $date_now = date('Y-m-d');
        $request['status'] = $request['open_date'] >= $date_now && $request['close_date'] >= $date_now ? '1' : '0';
        return Job::updateData($id,$request) ? redirect()->route('jobs.index')->with('sukses','Create Job Successfully') : redirect()->back()->with('eror','Oops,Something Went Wrong, Please Try again');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return Job::deleteData($id) ? 
        redirect()->route('jobs.index')->with('sukses','Delete Job Successfully') :
        redirect()->back()->with('eror','Oops,Something Went Wrong, Please Try again');
    }


    //CRUD TEST

    public function view_test(string $id){
        $data = $this->getPageData();
        $data['page_name'] = 'Job Entrance Test';
        $data['page_subname'] = 'Job Entrance Test data here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Jobs','link' => route('jobs.index'),'status' => ''],['name' => 'Test Job','link' => route('view_test',$id),'status' => 'active']]);
        $job = Job::join('departements','jobs.departement_id','=','departements.id')->join('positions','jobs.position_id','=','positions.id')->where('jobs.id','=',$id)->get(['jobs.*','positions.position','departements.departement']);
        $test = Test::where('jobs_id','=',$id)->get();
        return view('pages.admin.jobs.test.index',compact(['data','job','test','id']));
    }
    public function store_test(Request $request){
      
        $validate = Validator::make($request->all(),[
            'question' => ['required'],
            'jobs_id' => ['required'],
            'option_a' => ['required'],
            'option_b' => ['required'],
            'option_c' => ['required'],
            'option_d' => ['required'],
            'answer' => ['required'],
        ]);
       
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        return Test::insertData($request) ? redirect()->back()->with('sukses','Create Test Successfully') : redirect()->back()->with('eror','Oops,Something Went Wrong, Please Try again');
   

    }
    public function update_test(Request $request,string $id){
        $validate = Validator::make($request->all(),[
            'question' => ['required'],
            'jobs_id' => ['required'],
            'option_a' => ['required'],
            'option_b' => ['required'],
            'option_c' => ['required'],
            'option_d' => ['required'],
            'answer' => ['required'],
        ]);
       
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        return Test::updateData($id,$request) ? redirect()->back()->with('sukses','Update Test Successfully') : redirect()->back()->with('eror','Oops,Something Went Wrong, Please Try again');
   

    }
    public function destroy_test($id){
        return Test::deleteData($id) ? 
        redirect()->back()->with('sukses','Delete Test Successfully') :
        redirect()->back()->with('eror','Oops,Something Went Wrong, Please Try again');
    }


    //CRUD PSIKOTEST
    public function view_psikotest(string $id){
        $data = $this->getPageData();
        $data['page_name'] = 'Job Psikotest';
        $data['page_subname'] = 'Job Psikotest data here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Jobs','link' => route('jobs.index'),'status' => ''],['name' => 'Test Job','link' => route('view_psikotest',$id),'status' => 'active']]);
        $job = Job::join('departements','jobs.departement_id','=','departements.id')->join('positions','jobs.position_id','=','positions.id')->where('jobs.id','=',$id)->get(['jobs.*','positions.position','departements.departement']);
        $psikotest = Psikotes::where('jobs_id','=',$id)->get();
        return view('pages.admin.jobs.psikotes.index',compact(['data','job','psikotest']));
    }
    public function store_psikotest(Request $request){

    }
    public function update_psikotest(Request $request,string $id){

    }
    public function destroy_psikotest($id){
        
    }
}
