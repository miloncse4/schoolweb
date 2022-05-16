<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmpAttendance;
use App\Models\StudentClass;
use App\Models\Year;
use App\Models\AssignStudent;
use App\Models\ExamType;
use App\Models\StudentMarks;
use App\Models\MarksGrade;
use File;

class ProfitController extends Controller
{
    public function view(){
        $data['employees'] = User::where('usertype','employee')->get();
        return view('backend.report.att_re_view',$data);
    }

    public function attendanceGet(Request $request){
        $request->validate([
            'name' => 'required',
            'date' => 'required',
        ]);
        $employee_id = $request->employee_id;
        if($employee_id !=''){
            $where[] = ['employee_id',$employee_id];
        }
        $date = date('Y-m',strtotime($request->date));
        if($date !=''){
            $where[] = ['date','like',$date.'%'];
        }
        $singleAtten = EmpAttendance::with(['user'])->where($where)->first();
        if($singleAtten == true){
            $data['allData'] = EmpAttendance::with(['user'])->where($where)->get();
            $data['absents'] = EmpAttendance::with(['user'])->where($where)->where('attend_status','Absent')->get()->count();
            $data['leaves'] = EmpAttendance::with(['user'])->where($where)->where('attend_status','Leave')->get()->count();
            $data['presents'] = EmpAttendance::with(['user'])->where($where)->where('attend_status','Present')->get()->count();
            $data['month'] = date('M Y',strtotime($request->date));
            return view('backend.report.att_re_pdf',$data);
        }
        else{
            return redirect()->route('attendance.view')->with('danger','Sorry ! this criteria does not match.');
        }
    }

    public function card_view(){
        $info['years'] = Year::orderBy('id','DESC')->get();
        $info['classes'] = StudentClass::all();
        return view('backend.report.card_view',$info);
    }

    public function cardGet(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;

        $check_data = AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->first();
        if($check_data == true){
            $data['allData'] = AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->get();
            return view('backend.report.id_card_pdf',$data);
        }
    }

    public function markView()
    {
        $info['years'] = Year::orderBy('id','DESC')->get();
        $info['classes'] = StudentClass::all();
        $info['exam_types'] = ExamType::all();
        return view('backend.report.marksheet_view',$info);
    }

    public function markGet(Request $request)
    {
        $request->validate([
            'year_id'=>'required',
            'class_id'=>'required',
            'exam_type_id'=>'required',
            'id_no'=>'required',
        ]);

        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;
        $id_no = $request->id_no;

        $count_fail = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->
        where('id_no',$id_no)->where('marks','<','33')->get()->count();

        $singleStudent = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->
        where('id_no',$id_no)->first();
        if($singleStudent == true)
        {
            $allMarks = StudentMarks::with(['assign_subject','year_name'])->where('year_id',$year_id)->where('class_id',$class_id)->
            where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->get();
            $allGreads = MarksGrade::all();
            return view('backend.report.marksheet_pdf',compact('allMarks','allGreads','count_fail'));
        }
        else{
            return redirect()->route('marksheet.view')->with('er','Sorry ! Marksheet not found..??');
        }
    }

}
