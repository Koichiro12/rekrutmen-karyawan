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
        ]);
        if($validate->fails()){
            dd($validate);
            //return redirect()->back()->withErrors($validate)->withInput();
        }
        $check = JobSeekers::where('user_id',auth()->user()->id)->first();
        $jobseekers_image = $request->file('foto');
        $jobseekers_cv = $request->file('cv');
        $request['jobseeker_image'] = '-';
        $request['jobseeker_cv'] = '-';
        if($check){
            $request['jobseeker_image'] = $check->jobseeker_image;
            $request['jobseeker_cv'] = $check->jobseeker_cv;
        }
        if($request->hasFile('foto')){
            $img = date('Ymdhis').$jobseekers_image->getClientOriginalName();
            $jobseekers_image->move($this->defaultUploadFileDir,$img);
            $request['jobseeker_image'] = $img;
            if($check){
                
            }
        }
        
        if($request->hasFile('cv')){
            $cv = date('Ymdhis').$jobseekers_cv->getClientOriginalName();
            $jobseekers_cv->move($this->defaultUploadFileDir,$cv);
            $request['jobseeker_cv'] = $cv;
        }
        if(!$check){
            return JobSeekers::insertData($request,['foto','cv'],null,true) ? redirect()->route('personal_data')->with('sukses',"Update Personal Data Successfully") : redirect()->back()->with('eror',"Update Personal data Failed, Please Try Again") ;
        }
        
        return JobSeekers::updateData($check->id,$request,['foto','cv']) ? redirect()->route('personal_data')->with('sukses',"Update Personal Data Successfully") : redirect()->back()->with('eror',"Update Personal data Failed, Please Try Again") ;
        
    }
}
