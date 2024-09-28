<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ApplyJobs;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index(){
        $data = $this->getPageData();
        if(auth()->user()->role == 'Admin'){
            $applyjobs = ApplyJobs::join('jobs','apply_jobs.job_id','=','jobs.id')
                        ->join('job_seekers','apply_jobs.jobseeker_id','=','job_seekers.id')
                        ->join('departements','jobs.departement_id','=','departements.id')
                        ->join('positions','jobs.position_id','=','positions.id')
                        ->orderBy('apply_jobs.created_at','DESC')
                        ->get(['apply_jobs.*','jobs.*','departements.departement','positions.position','job_seekers.*','apply_jobs.id as id_apply']);
            $apply = ApplyJobs::latest()->get();
            $apply_job = $apply->count();
            $wait = 0;
            $proses = 0;
            $pass = 0;
            $failed = 0;
            foreach($apply as $a){
                switch ($a->status_apply) {
                    case 0:
                        $wait++;
                        break;
                    case 1:
                        $proses++;
                        break;
                    case 2:
                        $failed++;
                        break;
                    case 3:
                        $pass++; 
                        break;
                    case 4:
                        $failed++; 
                        break;
                    case 5:
                        $failed++; 
                        break;
                    default:
                        # code...
                        break;
                }
            }
            return view('pages.admin.dashboard',compact(['applyjobs','data','apply','wait','proses','pass','failed','apply_job']));
        }
        if(auth()->user()->role == 'User'){
            $apply = ApplyJobs::where('user_id','=',auth()->user()->id)->latest()->get();
            $apply_job = $apply->count();
            $wait = 0;
            $pass = 0;
            $failed = 0;
            foreach($apply as $a){
                switch ($a->status_apply) {
                    case 0:
                        $wait++;
                        break;
                    case 1:
                        $pass++;
                        break;
                    case 2:
                        $failed++;
                        break;
                    
                    default:
                        # code...
                        break;
                }
            }
            return view('pages.user.dashboard',compact(['data','wait','pass','failed','apply_job']));
        }

        
    }
    public function profile(){
        $data = $this->getPageData();
        $data['page_name'] = 'Profile';
        $data['page_subname'] = 'Your Profile Here';
       
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Profile','link' => route('profile'),'status' => 'active']]);
        $user = User::findOrFail(auth()->user()->id);
        return view('pages.admin.profile',compact(['data','user']));
    }
    public function updateProfile(Request $request){
        
        $id = auth()->user()->id;
        $oldData = User::findOrFail($id);
        $validate = \Validator::make($request->all(),[
            'name' => ['required'],
            'user_phone' => ['required'],
            'username' => ['required'],
            'email' => ['required','email'],
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $request['password'] = Hash::make($request['password']);
        $user_image = $request->file('foto'); 
        if( $request->hasFile('foto')){
            $result = date('Ymdhis').$user_image->getClientOriginalName();
            $user_image->move($this->defaultUploadFileDir,$result);
            $request['user_image'] = $result;
        }
        if(!isset($request['foto']) || $request['foto'] == null){
            $request['user_image'] = $oldData->user_image;   
        }
        if($request['password'] != '' || $request['password'] == null){
            $request['password'] = $oldData->password;   
        }
        return User::updateData($id,$request,['foto']) ? redirect()->back()->with('sukses',"Update Profile Successfully") : redirect()->back()->with('eror',"Update Profile Failed, Please Try Again") ;
    }
}
