<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobSeekersController extends Controller
{
    //
    public function index(){
        $data = $this->getPageData();
        $data['page_name'] = 'JobSeekers';
        $data['page_subname'] = 'JobSeekers data will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'JobSeekers','link' => route('jobseekers'),'status' => 'active']]);
        return view('pages.admin.jobseekers.index',compact(['data']));
    }
}
