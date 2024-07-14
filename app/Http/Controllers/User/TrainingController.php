<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Trainings;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = $this->getPageData();
        $id = auth()->user()->id;
        $data['page_name'] = 'Trainings';
        $data['page_subname'] = 'Trainings data will appear here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Trainings','link' => route('trainings.index'),'status' => 'active']]);
        $training = Trainings::where('user_id','=',$id)->latest()->get();
        return view('pages.user.training.index',compact(['data','training']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = $this->getPageData();
        $data['page_name'] = 'Create Trainings';
        $data['page_subname'] = 'Create Trainings data here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Trainings','link' => route('trainings.index'),'status' => ''],['name' => 'Create Trainings','link' => route('trainings.create'),'status' => 'active']]);
        return view('pages.user.training.create',compact(['data']));
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
        $data['page_name'] = 'Edit Trainings';
        $data['page_subname'] = 'Edit Trainings data here';
        $data['page_breadcum'] = array_merge($data['page_breadcum'],[['name' => 'Trainings','link' => route('trainings.index'),'status' => ''],['name' => 'Edit Trainings','link' => route('trainings.edit',$id),'status' => 'active']]);
        $trainings = Trainings::findOrFail($id);
        return view('pages.user.training.edit',compact(['data','trainings']));
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
