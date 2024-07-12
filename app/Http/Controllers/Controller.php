<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $defaultUploadFileDir = 'uploads';

    public function __construct(){
        if(!is_dir($this->defaultUploadFileDir)) mkdir($this->defaultUploadFileDir);
    }
    public function getPageData(){
        $data = [];
        $data['page_name'] = 'Dashboard';
        $data['page_subname'] = 'Hi, How i can help you ?';
        $data['page_breadcum'] = [['name' => 'Dashboard','link' => route('dashboard'),'status' => '']];
        return $data; 
    }

    public function RolesAllowed($roles = []){
        if(count($roles) < 0 ){
            return;
        }
        if(!Auth::check()){
            return;
        }
        if(!in_array(auth()->user()->role,$roles)){
            abort(404,"Page Not Found");
        }
    }

}
