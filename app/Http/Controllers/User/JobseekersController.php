<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ApplyJobs;
use App\Models\Job;
use App\Models\JobSeekers;
use Illuminate\Http\Request;

class JobseekersController extends Controller
{
    //
    public function search_job(){
        $data = $this->getPageData();
        $id = auth()->user()->id;
        $data['page_name'] = 'Search Jobs';
        $data['page_subname'] = 'Jobs data will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Search Jobs','link' => route('search_job'),'status' => 'active']]);
        $jobs = Job::join('departements','jobs.departement_id','=','departements.id')->join('positions','jobs.position_id','=','positions.id')->orderBy('jobs.created_at','DESC')->get(['positions.position','departements.departement','jobs.*']);
        $apply_job = ApplyJobs::where('user_id','=',auth()->user()->id)->latest()->get();
        return view('pages.user.searchjobs.index',compact(['data','jobs','apply_job']));
    }
    public function detail(string $id){
        $data = $this->getPageData();
        $data['page_name'] = 'Detail Job';
        $data['page_subname'] = 'Detail Data Job will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Detail Job','link' => route('detail_job',$id),'status' => 'active']]);
        $job = Job::join('departements','jobs.departement_id','=','departements.id')->join('positions','jobs.position_id','=','positions.id')->where('jobs.id','=',$id)->first();
        $apply_job = ApplyJobs::where([['job_id','=',$id],['user_id','=',auth()->user()->id]])->first();
        return view('pages.user.searchjobs.detail',compact(['data','job','apply_job']));
    }

    public function apply(Request $request,string $id){
        $id_user = auth()->user()->id;
        $check_personal_Data = JobSeekers::where('user_id','=',$id_user)->first();
        $check_job = Job::findOrFail($id);
        $date_apply = date('Y-m-d h:i:s');
        if(!$check_personal_Data){
            return redirect()->back()->with('eror','Email atau password salah / tidak terdaftar');
        }
       
            $request['user_id'] = $id_user;
            $request['jobseeker_id'] = $check_personal_Data->id;
            $request['job_id'] = $check_job->id;
            $request['test_result'] = '-';
            $request['psikotes_result'] = '-';
            $request['status_apply'] = 0;
            $request['date_apply'] = $date_apply;
        
        return ApplyJobs::insertData($request,[]) 
        ? redirect()->route('apply_job')->with('sukses',"Apply Job Successfully") 
        : redirect()->back()->with('eror',"Apply Job Failed, Please Try Again") ;
    }
    
    public function apply_job(){
        $data = $this->getPageData();
        $id = auth()->user()->id;
        $data['page_name'] = 'My Apply Jobs';
        $data['page_subname'] = 'Apply Jobs data will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'My Apply Jobs','link' => route('apply_job'),'status' => 'active']]);
        $apply_job = ApplyJobs::join('jobs','apply_jobs.job_id','=','jobs.id')->where('apply_jobs.user_id','=',$id)->orderBy('apply_jobs.created_at','DESC')->get();
        return view('pages.user.applyjobs.index',compact(['data','apply_job']));
    }
}
