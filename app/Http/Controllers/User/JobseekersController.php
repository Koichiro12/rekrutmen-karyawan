<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ApplyJobs;
use App\Models\Job;
use App\Models\JobSeekers;
use App\Models\Psikotes;
use App\Models\Test;
use App\Models\UserPsikotestAnswer;
use App\Models\UserTestAnswer;
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
        $jobseekers = JobSeekers::where('user_id','=',auth()->user()->id)->first();
        return view('pages.user.searchjobs.index',compact(['data','jobs','apply_job','jobseekers']));
    }
    public function detail(string $id){
        $data = $this->getPageData();
        $data['page_name'] = 'Detail Job';
        $data['page_subname'] = 'Detail Data Job will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Detail Job','link' => route('detail_job',$id),'status' => 'active']]);
        $job = Job::join('departements','jobs.departement_id','=','departements.id')->join('positions','jobs.position_id','=','positions.id')->where('jobs.id','=',$id)->first();
        $apply_job = ApplyJobs::where([['job_id','=',$id],['user_id','=',auth()->user()->id]])->first();
        $jobseekers = JobSeekers::where('user_id','=',auth()->user()->id)->first();
        return view('pages.user.searchjobs.detail',compact(['data','job','apply_job','jobseekers']));
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
        $apply_job = ApplyJobs::join('jobs','apply_jobs.job_id','=','jobs.id')
                        ->join('departements','jobs.departement_id','=','departements.id')
                        ->join('positions','jobs.position_id','=','positions.id')
                        ->where('apply_jobs.user_id','=',$id)
                        ->orderBy('apply_jobs.created_at','DESC')->get(['apply_jobs.*','departements.departement','positions.position','jobs.job_name','jobs.salary']);
        return view('pages.user.applyjobs.index',compact(['data','apply_job']));
    }
    public function cancel_apply(string $id){
        $data =  ApplyJobs::findOrFail($id);
        $data->update(['status_apply' => 5]);
        return redirect()->route('apply_job');
    }

    public function hapus_apply(string $id){
        $data =  ApplyJobs::findOrFail($id);
        $data->delete();
        return redirect()->route('apply_job');
    }

    public function apply_test(string $id){
        $data = $this->getPageData();
        $data_apply = ApplyJobs::findOrFail($id);
        if(!$data_apply){
            return redirect()->back()->with('eror',"Apply Job Error, Please Contact Support") ;
        }
        $data['page_name'] = 'Job Test';
        $data['page_subname'] = 'Job Test will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Job Test','link' => route('apply_test',$id),'status' => 'active']]);
        $test = Test::where('jobs_id','=',$data_apply->job_id)->get();
        return view('pages.user.applyjobs.test.index',compact(['data','test','id']));
    }

    public function submit_apply_test(Request $request,string $id){
        $exception = [];
        $truth = 0;
        $scores = 0;
        $data_apply = ApplyJobs::findOrFail($id);
        $test = Test::where('jobs_id','=',$data_apply->job_id)->get();
        //Push Exception for request insert data
        foreach($test as $s){
            array_push($exception,'oq_'.$s->id);
        }
        // Looping data and inserting data to database
        foreach($test as $t){
            $request['oq_'.$t->id] == $t->answer ? $truth++ : null;
            $request['apply_job_id'] = $id;
            $request['test_id'] = $t->id ;
            $request['answer_test'] = $t->answer;
            $request['user_answer'] = $request['oq_'.$t->id];
            UserTestAnswer::insertData($request,$exception);
        }
        $scores = ($truth / $test->count()) * 100;
        return ApplyJobs::where('id','=',$id)->update(['test_result' => $scores,'test_status' => '1']) 
        ? redirect()->route('apply_job')->with('sukses',"Test Submited Successfully") 
        : redirect()->back()->with('eror',"Oops Something Went Wrong, Please Try Again") ;
    }

    public function apply_psikotest(string $id){
        $data = $this->getPageData();
        $data_apply = ApplyJobs::findOrFail($id);
        if(!$data_apply){
            return redirect()->back()->with('eror',"Apply Job Error, Please Contact Support") ;
        }
        $data['page_name'] = 'Job Psikotest';
        $data['page_subname'] = 'Job Psikotest will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Job Psikotest','link' => route('apply_test',$id),'status' => 'active']]);
        $psikotest = Psikotes::where('jobs_id','=',$data_apply->job_id)->get();
        return view('pages.user.applyjobs.psikotest.index',compact(['data','psikotest','id']));
    }

    public function submit_apply_psikotest(Request $request,string $id){
        $exception = [];
        $truth = 0;
        $scores = 0;
        $data_apply = ApplyJobs::findOrFail($id);
        $test = Psikotes::where('jobs_id','=',$data_apply->job_id)->get();
        //Push Exception for request insert data
        foreach($test as $s){
            array_push($exception,'oq_'.$s->id);
        }
        // Looping data and inserting data to database
        foreach($test as $t){
            $request['oq_'.$t->id] == $t->answer ? $truth++ : null;
            $request['apply_job_id'] = $id;
            $request['test_id'] = $t->id ;
            $request['answer_test'] = $t->answer;
            $request['user_answer'] = $request['oq_'.$t->id];
            UserPsikotestAnswer::insertData($request,$exception);
        }
        $scores = ($truth / $test->count()) * 100;
        return ApplyJobs::where('id','=',$id)->update(['psikotes_result' => $scores,'psikotes_status' => '1']) 
        ? redirect()->route('apply_job')->with('sukses',"Psikotest Submited Successfully") 
        : redirect()->back()->with('eror',"Oops Something Went Wrong, Please Try Again") ;
    }
}
