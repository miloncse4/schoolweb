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
use File;

class EmployeeLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = EmployeeLeave::orderBy('id','desc')->get();
        return view('backend.employee.employee_leave.view_leave',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['employees'] = User::where('usertype','employee')->get();
        $data['leave'] = LeavePurpose::all();
        return view('backend.employee.employee_leave.create_leave',$data);
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
            'employee_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'leave_purpose_id' => 'required',
        ]);

        if($request->leave_purpose_id == "0"){
            $leavepurpose = new LeavePurpose();
            $leavepurpose->name = $request->name;
            $leavepurpose->save();
            $leave_purpose_id = $leavepurpose->id;
        }
        else{
            $leave_purpose_id = $request->leave_purpose_id;
        }

        $emp_lave = new EmployeeLeave();
        $emp_lave->employee_id = $request->employee_id;
        $emp_lave->start_date = date('Y-m-d',strtotime($request->start_date));
        $emp_lave->end_date = date('Y-m-d',strtotime($request->end_date));
        $emp_lave->leave_purpose_id = $leave_purpose_id;
        $emp_lave->save();

        return redirect()->route('emplyoee.leave.view')->with('Done','Leave Granted..!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = EmployeeLeave::find($id);
        $data['employees'] = User::where('usertype','employee')->get();
        $data['leave'] = LeavePurpose::all();
        return view('backend.employee.employee_leave.edit_leave',$data);
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
        $request->validate([
            'employee_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'leave_purpose_id' => 'required',
        ]);

        if($request->leave_purpose_id == "0"){
            $leavepurpose = new LeavePurpose();
            $leavepurpose->name = $request->name;
            $leavepurpose->save();
            $leave_purpose_id = $leavepurpose->id;
        }
        else{
            $leave_purpose_id = $request->leave_purpose_id;
        }

        $emp_lave = EmployeeLeave::find($id);
        $emp_lave->employee_id = $request->employee_id;
        $emp_lave->start_date = date('Y-m-d',strtotime($request->start_date));
        $emp_lave->end_date = date('Y-m-d',strtotime($request->end_date));
        $emp_lave->leave_purpose_id = $leave_purpose_id;
        $emp_lave->save();

        return redirect()->route('emplyoee.leave.view')->with('Done','Leave Update successfully..!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp_lave = EmployeeLeave::find($id);
        $emp_lave->delete();
        return redirect()->route('emplyoee.leave.view')->with('rong','Leave information Delete..?');
    }
}
