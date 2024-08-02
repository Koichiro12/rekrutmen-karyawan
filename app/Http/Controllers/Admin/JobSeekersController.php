<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApplyJobs;
use App\Models\Job;
use App\Models\JobSeekers;
use App\Models\UserPsikotestAnswer;
use App\Models\UserTestAnswer;
use Illuminate\Http\Request;

class JobSeekersController extends Controller
{
    //
    public function index(){
        $data = $this->getPageData();
        $data['page_name'] = 'JobSeekers';
        $data['page_subname'] = 'JobSeekers data will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'JobSeekers','link' => route('jobseekers'),'status' => 'active']]);
        $jobseekers = ApplyJobs::join('jobs','apply_jobs.job_id','=','jobs.id')
                        ->join('job_seekers','apply_jobs.jobseeker_id','=','job_seekers.id')
                        ->join('departements','jobs.departement_id','=','departements.id')
                        ->join('positions','jobs.position_id','=','positions.id')
                        ->orderBy('apply_jobs.created_at','DESC')
                        ->get(['apply_jobs.*','jobs.*','departements.departement','positions.position','job_seekers.*','apply_jobs.id as id_apply']);
        return view('pages.admin.jobseekers.index',compact(['data','jobseekers']));
    }
    public function detail(string $id){
        $data = $this->getPageData();
        $data['page_name'] = 'JobSeeker Detail';
        $data['page_subname'] = 'JobSeekers Detail data will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'JobSeekers Detail','link' => route('jobseeker_detail',$id),'status' => 'active']]);
        $apply_data = ApplyJobs::findOrFail($id);
        $jobs_data = Job::where('id','=',$apply_data->job_id)->first();
        $jobseeker_data = JobSeekers::where('id','=',$apply_data->jobseeker_id)->first();
        $test_answer_data = UserTestAnswer::where('apply_job_id','=',$id)->first();
        $psikotest_answer_data = UserPsikotestAnswer::where('apply_job_id','=',$id)->first();
        return view('pages.admin.jobseekers.detail',compact(['data','apply_data','jobs_data','jobseeker_data','test_answer_data','psikotest_answer_data']));
        
    }
}
