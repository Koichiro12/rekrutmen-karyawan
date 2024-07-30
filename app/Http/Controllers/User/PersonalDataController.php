<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JobSeekers;
use Illuminate\Http\Request;
use Validator;

class PersonalDataController extends Controller
{
    //

    public function index(){
        $data = $this->getPageData();
        $id = auth()->user()->id;
        $data['page_name'] = 'Personal Data';
        $data['page_subname'] = 'Personal Data data will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Personal Data','link' => route('experiences.index'),'status' => 'active']]);
        $job_seekers = JobSeekers::where('user_id',$id)->first();
        return view('pages.user.personaldata.index',compact(['data','job_seekers']));
    }
    public function update(Request $request){
        $validate = Validator::make($request->all(),[
            'jobseeker_image' => ['required'],
            'jobseeker_cv' => ['required'],
            'nik'=> ['required'],
            'name'=> ['required'],
            'date_birth'=> ['required'],
            'place_birth'=> ['required'],
            'gender'=> ['required'],
            'address'=> ['required'],
            'domisili'=> ['required'],
            'phone_number'=> ['required'],
            'email'=> ['required'],
            'status_residence'=> ['required'],
            'married_status'=> ['required'],
            'citizen'=> ['required'],
            'relegion'=> ['required'],
            'npwp',
            'sim',
            'sim_number',
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $check = JobSeekers::where('user_id',auth()->user()->id)->first();
        if(!$check){
            return JobSeekers::insertData($request,[],null,true) ? redirect()->route('personal_data')->with('sukses',"Update Personal Data Successfully") : redirect()->back()->with('eror',"Update Personal data Failed, Please Try Again") ;
        }
        return JobSeekers::updateData($check->id,$request) ? redirect()->route('personal_data')->with('sukses',"Update Personal Data Successfully") : redirect()->back()->with('eror',"Update Personal data Failed, Please Try Again") ;
        
    }
}
