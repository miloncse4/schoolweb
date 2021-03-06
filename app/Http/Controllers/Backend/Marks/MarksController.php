<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\StudentClass;
use App\Models\StudentMarks;
use App\Models\Group;
use App\Models\Shift;
use App\Models\Year;
use App\Models\ExamType;
use File;

class MarksController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(){
    	$data['years'] = Year::orderBy('id','DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();
    	return view('backend.marks.add_mark',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $studentcount = $request->student_id;
        if($studentcount){
            for ($i=0; $i < count($request->student_id); $i++) {
                $data = New StudentMarks();
                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->assign_subject_id = $request->assign_subject_id;
                $data->exam_type_id = $request->exam_type_id;
                $data->student_id = $request->student_id[$i];
                $data->id_no = $request->id_no[$i];
                $data->marks = $request->marks[$i];
                $data->save();
            }
        }
      return redirect()->back()->with('success','Marks insert successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data['years'] = Year::orderBy('id','DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();
    	return view('backend.marks.marks-edit',$data);
    }

    public function getMarks(Request $request){
    	$year_id = $request->year_id;
	    $class_id = $request->class_id;
	    $assign_subject_id = $request->assign_subject_id;
	    $exam_type_id = $request->exam_type_id;
	    $getStudent = StudentMarks::with(['student'])->where('year_id',$year_id)->where('class_id',$class_id)->where('assign_subject_id',$assign_subject_id)->where('exam_type_id',$exam_type_id)->get();
	    return response()->json($getStudent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        StudentMarks::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('assign_subject_id',$request->assign_subject_id)->where('exam_type_id',$request->exam_type_id)->delete();
	    $studentcount = $request->student_id;
	    if($studentcount){
	        for ($i=0; $i < count($request->student_id); $i++) {
	            $data = New StudentMarks();
	            $data->year_id = $request->year_id;
	            $data->class_id = $request->class_id;
	            $data->assign_subject_id = $request->assign_subject_id;
	            $data->exam_type_id = $request->exam_type_id;
	            $data->student_id = $request->student_id[$i];
	            $data->id_no = $request->id_no[$i];
	            $data->marks = $request->marks[$i];
	            $data->save();
	        }
	    }
	    return redirect()->back()->with('success','Marks updated successfully!');
    }


}
