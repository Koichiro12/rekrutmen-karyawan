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
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Search Jobs','link' => route('experiences.index'),'status' => 'active']]);
        $jobs = Job::join('departements','jobs.departement_id','=','departements.id')->join('positions','jobs.position_id','=','positions.id')->orderBy('jobs.created_at','DESC')->get();
        return view('pages.user.searchjobs.index',compact(['data','jobs']));
    }
}
