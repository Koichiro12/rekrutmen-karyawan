<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApplyJobs;
use Illuminate\Http\Request;

class JobSeekersController extends Controller
{
    //
    public function index(){
        $data = $this->getPageData();
        $data['page_name'] = 'JobSeekers';
        $data['page_subname'] = 'JobSeekers data will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'JobSeekers','link' => route('jobseekers'),'status' => 'active']]);
        $jobseekers = ApplyJobs::join('jobs','apply_jobs.job_id','=','jobs.id')->join('job_seekers','apply_jobs.jobseeker_id','=','job_seekers.id')->join('departements','jobs.departement_id','=','departements.id')->join('positions','jobs.position_id','=','positions.id')->orderBy('apply_jobs.created_at','DESC')->get();
        return view('pages.admin.jobseekers.index',compact(['data','jobseekers']));
    }
}
