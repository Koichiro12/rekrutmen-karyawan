<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Trainings;
use Illuminate\Http\Request;
use Validator;

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
        $trainings = Trainings::where('user_id','=',$id)->latest()->get();
        return view('pages.user.training.index',compact(['data','trainings']));
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
        $validate = Validator::make($request->all(),[
            'training' => ['required'],
            'certification' => ['required'],
            'organizer' => ['required'],
            'year_of_training' => ['required']
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        return Trainings::insertData($request,[],null,true) ? redirect()->route('trainings.index')->with('sukses',"Create Trainings Successfully") : redirect()->back()->with('eror',"Create Trainings Failed, Please Try Again") ;

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
        $validate = Validator::make($request->all(),[
            'training' => ['required'],
            'certification' => ['required'],
            'organizer' => ['required'],
            'year_of_training' => ['required']
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        return Trainings::updateData($id,$request) ? redirect()->route('trainings.index')->with('sukses',"Update Trainings Successfully") : redirect()->back()->with('eror',"Update Trainings Failed, Please Try Again") ;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return Trainings::deleteData($id) ? 
        redirect()->route('trainings.index')->with('sukses','Delete Trainings Successfully') :
        redirect()->back()->with('eror','Oops,Something Went Wrong, Please Try again');
    }
}
