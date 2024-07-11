<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    
    public function getPageData(){
        $data = [];
        $data['page_name'] = 'Dashboard';
        $data['page_subname'] = 'Hi, How i can help you ?';
        $data['page_breadcum'] = [['name' => 'Dashboard','link' => route('dashboard'),'status' => '']];
        return $data; 
    }

}
