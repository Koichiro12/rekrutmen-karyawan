<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Skills;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = $this->getPageData();
        $id = auth()->user()->id;
        $data['page_name'] = 'Skills';
        $data['page_subname'] = 'Skills data will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Skills','link' => route('skills.index'),'status' => 'active']]);
        $skills = Skills::where('user_id','=',$id)->latest()->get();
        return view('pages.user.skills.index',compact(['data','skills']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = $this->getPageData();
        $data['page_name'] = 'Create Skills';
        $data['page_subname'] = 'Create Skills data here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Skills','link' => route('skills.index'),'status' => ''],['name' => 'Create Skills','link' => route('skills.create'),'status' => 'active']]);
        return view('pages.user.skills.create',compact(['data']));
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
        $data['page_name'] = 'Edit Skills';
        $data['page_subname'] = 'Edit Skills data here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Skills','link' => route('skills.index'),'status' => ''],['name' => 'Edit Skills','link' => route('skills.edit',$id),'status' => 'active']]);
        $skills = Skills::findOrFail($id);
        return view('pages.user.skills.edit',compact(['data','skills']));
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
