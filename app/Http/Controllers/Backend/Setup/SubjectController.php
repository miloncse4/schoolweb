<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
              /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subj = Subject::all();
        return view('backend.setup.subj.subj_index',compact('subj'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.setup.subj.subj_create');
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
            'subject' => 'required|string|unique:subjects,subject',
        ]);

        $sub = new Subject;
        $sub->subject = $request->subject;
        $sub->save();

        return redirect()->route('setup.subject.view')->with('message','Admin By Subject Add.!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub = Subject::find($id);
        return view('backend.setup.subj.subj_edit',compact('sub'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sub = Subject::find($id);

        $request->validate([
            'subject' => 'required|string|unique:subjects,subject',
        ]);

        $sub->subject = $request->subject;
        $sub->update();

        return redirect()->route('setup.subject.view')->with('message','Subject update by admin.!');
    }
}
