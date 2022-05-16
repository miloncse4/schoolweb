<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Year;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentMarks;
use App\Models\MarksGrade;

class AllStudentResult extends Controller
{
    public function resultView()
    {
        $info['years'] = Year::orderBy('id','DESC')->get();
        $info['classes'] = StudentClass::all();
        $info['exam_types'] = ExamType::all();
        return view('backend.report.result_view',$info);
    }

    public function resultGet(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;

        $singleResult = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->
        first();
        if($singleResult == true){
           $data['allData'] =  StudentMarks::select('class_id','year_id','exam_type_id','student_id')->where('year_id',$year_id)->
           where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->groupBy('year_id')->groupBy('class_id')->groupBy('exam_type_id')->
           groupBy('student_id')->get();
           return view('backend.report.result_pdf',$data);
        }
        else{
            return redirect()->route('result.view')->with('danger','Sorry ! This Result not found.!');
        }
    }
    
}
