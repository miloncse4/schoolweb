<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;
use App\Models\Year;
use Illuminate\Support\Facades\DB;

class ExamTypeController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exam = ExamType::all();
        return view('backend.setup.exam.exm_index',compact('exam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.setup.exam.exm_create');
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
            'exam' => 'required|string|unique:exam_types,exam',
        ]);

        $exm = new ExamType;
        $exm->exam = $request->exam;
        $exm->save();

        return redirect()->route('setup.exam.type.view')->with('message','Exam inserted.!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exm_data = ExamType::find($id);
        return view('backend.setup.exam.exm_edit',compact('exm_data'));
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
        $exm = ExamType::find($id);

        $request->validate([
            'exam' => 'required|string|unique:exam_types,exam',
        ]);

        $exm->exam = $request->exam;
        $exm->update();

        return redirect()->route('setup.exam.type.view')->with('message','Exam updated.!');
    }
}
