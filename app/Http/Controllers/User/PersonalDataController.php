<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonalDataController extends Controller
{
    //

    public function index(){
        $data = $this->getPageData();
        $data['page_name'] = 'Personal Data';
        $data['page_subname'] = 'Personal Data data will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Personal Data','link' => route('experiences.index'),'status' => 'active']]);
        return view('pages.user.personaldata.index',compact(['data']));
    }
}
