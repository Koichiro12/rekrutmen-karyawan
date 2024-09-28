<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApplyJobs;
use App\Models\Educations;
use App\Models\Experience;
use App\Models\Job;
use App\Models\JobSeekers;
use App\Models\Skills;
use App\Models\Trainings;
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
    public function jobseekersWithStatus(string $status){
       
        $data = $this->getPageData();
        $data['page_name'] = 'JobSeekers';
        $data['page_subname'] = 'JobSeekers data will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'JobSeekers','link' => route('jobseekers'),'status' => 'active']]);
        $jobseekers = ApplyJobs::join('jobs','apply_jobs.job_id','=','jobs.id')
        ->join('job_seekers','apply_jobs.jobseeker_id','=','job_seekers.id')
        ->join('departements','jobs.departement_id','=','departements.id')
        ->join('positions','jobs.position_id','=','positions.id')
        ->where('apply_jobs.status_apply','=','0')
        ->orderBy('apply_jobs.created_at','DESC')
        ->get(['apply_jobs.*','jobs.*','departements.departement','positions.position','job_seekers.*','apply_jobs.id as id_apply']);
        switch($status){
            case 1:
                $jobseekers = ApplyJobs::join('jobs','apply_jobs.job_id','=','jobs.id')
                ->join('job_seekers','apply_jobs.jobseeker_id','=','job_seekers.id')
                ->join('departements','jobs.departement_id','=','departements.id')
                ->join('positions','jobs.position_id','=','positions.id')
                ->where('apply_jobs.status_apply','=','0')
                ->orderBy('apply_jobs.created_at','DESC')
                ->get(['apply_jobs.*','jobs.*','departements.departement','positions.position','job_seekers.*','apply_jobs.id as id_apply']);
                break;
             case 2:
                $jobseekers = ApplyJobs::join('jobs','apply_jobs.job_id','=','jobs.id')
                ->join('job_seekers','apply_jobs.jobseeker_id','=','job_seekers.id')
                ->join('departements','jobs.departement_id','=','departements.id')
                ->join('positions','jobs.position_id','=','positions.id')
                ->where('apply_jobs.status_apply','=','1')
                ->orderBy('apply_jobs.created_at','DESC')
                ->get(['apply_jobs.*','jobs.*','departements.departement','positions.position','job_seekers.*','apply_jobs.id as id_apply']);
                break;
             case 3:
                $jobseekers = ApplyJobs::join('jobs','apply_jobs.job_id','=','jobs.id')
                ->join('job_seekers','apply_jobs.jobseeker_id','=','job_seekers.id')
                ->join('departements','jobs.departement_id','=','departements.id')
                ->join('positions','jobs.position_id','=','positions.id')
                ->where('apply_jobs.status_apply','=','3')
                ->orderBy('apply_jobs.created_at','DESC')
                ->get(['apply_jobs.*','jobs.*','departements.departement','positions.position','job_seekers.*','apply_jobs.id as id_apply']);
                break;
             case 4:
                $jobseekers = ApplyJobs::join('jobs','apply_jobs.job_id','=','jobs.id')
                ->join('job_seekers','apply_jobs.jobseeker_id','=','job_seekers.id')
                ->join('departements','jobs.departement_id','=','departements.id')
                ->join('positions','jobs.position_id','=','positions.id')
                ->whereNot([['apply_jobs.status_apply','=','0'],['apply_jobs.status_apply','=','1'],['apply_jobs.status_apply','=','3']])
                ->orderBy('apply_jobs.created_at','DESC')
                ->get(['apply_jobs.*','jobs.*','departements.departement','positions.position','job_seekers.*','apply_jobs.id as id_apply']);
                break;
        }
        
        return view('pages.admin.jobseekers.index',compact(['data','jobseekers']));
    }
    public function detail(string $id){
        $data = $this->getPageData();
        $data['page_name'] = 'JobSeeker Detail';
        $data['page_subname'] = 'JobSeekers Detail data will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'JobSeekers Detail','link' => route('jobseeker_detail',$id),'status' => 'active']]);
        $apply_data = ApplyJobs::findOrFail($id);
        $jobs_data = Job::join('departements','jobs.departement_id','=','departements.id')
                        ->join('positions','jobs.position_id','=','positions.id')
                        ->where('jobs.id','=',$apply_data->job_id)->first();
        $jobseeker_data = JobSeekers::where('id','=',$apply_data->jobseeker_id)->first();
        $education_data = Educations::where('user_id','=',$apply_data->user_id)->get();
        $experience_data = Experience::where('user_id','=',$apply_data->user_id)->get();
        $skill_data = Skills::where('user_id','=',$apply_data->user_id)->get();
        $training_data = Trainings::where('user_id','=',$apply_data->user_id)->get();
        $test_answer_data = UserTestAnswer::where('apply_job_id','=',$id)->first();
        $psikotest_answer_data = UserPsikotestAnswer::where('apply_job_id','=',$id)->first();
        return view('pages.admin.jobseekers.detail',compact(['data','apply_data','jobs_data','jobseeker_data','test_answer_data','psikotest_answer_data','education_data','experience_data','skill_data','training_data']));
        
    }
    public function updateTestStatus(string $id,string $column, string $value){
        return ApplyJobs::where('id',$id)->update([$column => $value]) ? redirect()->back()->with('sukses','Update Test Status SuccessFully') : redirect()->back()->with('danger','Oops, Something Went Wrong, Please Try Again !') ;
    }
    public function updateCanApplyJob(string $id,string $date){
        $data = ApplyJobs::findOrFail($id);
        return JobSeekers::where('id',$data->jobseeker_id)->update(['can_apply_job'=> $date]);
    }
    public function test_fail(string $id){
        return $this->updateTestStatus($id,'test_status',3);
    }
    public function test_pass(string $id){
        return $this->updateTestStatus($id,'test_status',2);
    }

    public function selection_pass(string $id){
        return $this->updateTestStatus($id,'status_apply',1);
    }
    public function selection_fail(string $id){
        $date  = date('Y-m-d',strtotime("+180 days"));
        $this->updateCanApplyJob($id,$date);
        return $this->updateTestStatus($id,'status_apply',2);
    }

    public function hired(string $id){
        return $this->updateTestStatus($id,'status_apply',3);
    }
    public function not_recruit(string $id){
        $date  = date('Y-m-d',strtotime("+180 days"));
        $this->updateCanApplyJob($id,$date);
        return $this->updateTestStatus($id,'status_apply',4);
    }

    public function psikotest_fail(string $id){
        return $this->updateTestStatus($id,'psikotes_status',3);
    }
    public function psikotest_pass(string $id){
        return $this->updateTestStatus($id,'psikotes_status',2);
    }
}
