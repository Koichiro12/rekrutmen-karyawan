<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = $this->getPageData();
        $id = auth()->user()->id;
        $data['page_name'] = 'Experiences';
        $data['page_subname'] = 'Experiences data will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Experiences','link' => route('experiences.index'),'status' => 'active']]);
        $experience = Experience::where('user_id','=',$id)->latest()->get();
        return view('pages.user.experiences.index',compact(['data','experience']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = $this->getPageData();
        $data['page_name'] = 'Create Experiences';
        $data['page_subname'] = 'Create Experiences data here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Experiences','link' => route('experiences.index'),'status' => ''],['name' => 'Create Experiences','link' => route('experiences.create'),'status' => 'active']]);
        return view('pages.user.experiences.create',compact(['data']));
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
        $data['page_name'] = 'Edit Experiences';
        $data['page_subname'] = 'Edit Experiences data here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Experiences','link' => route('experiences.index'),'status' => ''],['name' => 'Edit Experiences','link' => route('experiences.edit',$id),'status' => 'active']]);
        $education = Experience::findOrFail($id);
        return view('pages.user.experiences.edit',compact(['data','experiences']));
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
