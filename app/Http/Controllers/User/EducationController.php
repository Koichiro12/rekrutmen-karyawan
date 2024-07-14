<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Educations;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = $this->getPageData();
        $id = auth()->user()->id;
        $data['page_name'] = 'Educations';
        $data['page_subname'] = 'Educations data will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Educations','link' => route('educations.index'),'status' => 'active']]);
        $educations = Educations::where('user_id','=',$id)->latest()->get();
        return view('pages.user.educations.index',compact(['data','educations']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = $this->getPageData();
        $data['page_name'] = 'Create Educations';
        $data['page_subname'] = 'Create Educations data here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Educations','link' => route('educations.index'),'status' => ''],['name' => 'Create Education','link' => route('educations.create'),'status' => 'active']]);
        return view('pages.user.educations.create',compact(['data']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = $this->getPageData();
        $data['page_name'] = 'Edit Educations';
        $data['page_subname'] = 'Edit Educations data here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Educations','link' => route('educations.index'),'status' => ''],['name' => 'Edit Education','link' => route('educations.edit',$id),'status' => 'active']]);
        $education = Educations::findOrFail($id);
        return view('pages.user.educations.edit',compact(['data','education']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
