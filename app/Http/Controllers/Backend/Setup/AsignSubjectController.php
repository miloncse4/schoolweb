<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\Subject;
use App\Models\AssignSubject;
use Illuminate\Support\Facades\DB;

class AsignSubjectController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assign_subj.view',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['subjects'] = Subject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subj.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'subject_id' => 'required',
            'full_mark' => 'required',
            'pass_mark' => 'required',
            'get_mark' => 'required',
        ]);

        $data = new AssignSubject;
        $data->class_id = $request->class_id;
        $data->subject_id = $request->subject_id;
        $data->full_mark = $request->full_mark;
        $data->pass_mark = $request->pass_mark;
        $data->get_mark = $request->get_mark;
        $data->save();

        return redirect()->route('setup.asign.subject.view')->with('message','Stuent subject inserted.!');
    }

    public function details($class_id){
        $data['edit_info'] = AssignSubject::where('class_id',$class_id)->get();
        return view('backend.setup.assign_subj.details',$data);
    }

    public function delete($class_id){
        $data['edit_info'] = AssignSubject::where('class_id',$class_id)->delete();
        return redirect()->route('setup.asign.subject.view');
    }
}
