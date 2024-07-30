<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Job;
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
    
        return view('pages.user.searchjobs.index',compact(['data','jobs']));
    }
    public function detail(string $id){
        $data = $this->getPageData();
        $data['page_name'] = 'Detail Job';
        $data['page_subname'] = 'Detail Data Job will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Detail Job','link' => route('detail_job',$id),'status' => 'active']]);
        $job = Job::join('departements','jobs.departement_id','=','departements.id')->join('positions','jobs.position_id','=','positions.id')->where('jobs.id','=',$id)->first();
       
        return view('pages.user.searchjobs.detail',compact(['data','job']));
    }

    public function apply(Request $request,string $id){
        
    }
    
    public function apply_job(){
        $data = $this->getPageData();
        $id = auth()->user()->id;
        $data['page_name'] = 'My Apply Jobs';
        $data['page_subname'] = 'Apply Jobs data will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'My Apply Jobs','link' => route('apply_job'),'status' => 'active']]);
        return view('pages.user.applyjobs.index',compact(['data']));
    }
}
