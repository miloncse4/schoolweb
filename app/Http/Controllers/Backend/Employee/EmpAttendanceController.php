<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\EmployeeSalaryLog;
use App\Models\Designation;
use App\Models\LeavePurpose;
use App\Models\EmployeeLeave;
use App\Models\EmpAttendance;
use File;

class EmpAttendanceController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = EmpAttendance::select('date')->groupBy('date')->orderBy('id','desc')->get();
        return view('backend.employee.emp_attendance.atten_view',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['employees'] = User::where('usertype','employee')->get();
        return view('backend.employee.emp_attendance.atten_cre',$data);
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
            'date' => 'required',
        ]);

        EmpAttendance::where('date',date('Y-m-d',strtotime($request->date)))->delete();
        $countEmp = count($request->employee_id);
        for($i=0; $i <$countEmp; $i++){
            $attend_status = 'attend_status'.$i;
            $attend = new EmpAttendance();
            $attend->date = date('Y-m-d',strtotime($request->date));
            $attend->employee_id = $request->employee_id[$i];
            $attend->attend_status = $request->$attend_status;
            $attend->save();
        }

        return redirect()->route('emplyoee.attendance.view')->with('Done','Attendance Done..!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($date)
    {
        $data['editData'] = EmpAttendance::where('date',$date)->get();
        $data['employees'] = User::where('usertype','employee')->get();

        return view('backend.employee.emp_attendance.atten_edit',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details($date)
    {
        $data['details'] = EmpAttendance::where('date',$date)->get();
        $data['employees'] = User::where('usertype','employee')->get();

        return view('backend.employee.emp_attendance.atten_details',$data);
    }
}
