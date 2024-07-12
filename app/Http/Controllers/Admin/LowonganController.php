<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use App\Models\Job;
use App\Models\Position;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = $this->getPageData();
        $data['page_name'] = 'Jobs';
        $data['page_subname'] = 'Jobs data will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Jobs','link' => route('jobs.index'),'status' => 'active']]);
        $jobs = Job::join('departements','jobs.departement_id','=','departements.id')->join('positions','jobs.position_id','=','positions.id')->get(['jobs.*','positions.position','departements.departement']);
        return view('pages.admin.jobs.index',compact(['data','jobs']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = $this->getPageData();
        $data['page_name'] = 'Create Job';
        $data['page_subname'] = 'Create Job data here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Jobs','link' => route('jobs.index'),'status' => ''],['name' => 'Create Job','link' => route('jobs.create'),'status' => 'active']]);
        $departement = Departement::latest()->get();
        $position = Position::latest()->get();
        return view('pages.admin.jobs.create',compact(['data','departement','position']));
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
        $data['page_name'] = 'Edit Job';
        $data['page_subname'] = 'Edit Job data here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Jobs','link' => route('jobs.index'),'status' => ''],['name' => 'Edit Job','link' => route('jobs.edit',$id),'status' => 'active']]);
        $job = Job::findOrFail($id);
        $departement = Departement::latest()->get();
        $position = Position::latest()->get();
        return view('pages.admin.jobs.edit',compact(['data','departement','position','job']));
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
