<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\EmployeeSalaryLog;
use App\Models\Designation;
use File;

class EmpSalaryController extends Controller
{
    public function index(){
        $data['allData'] = User::where('usertype','employee')->get();
        return view('backend.employee.employee_salary.view_salary',$data);
    }

    public function increment($id){
        $data['users'] = User::find($id);

        return view('backend.employee.employee_salary.increment_salary', $data);
    }

    public function store(Request $request,$id){
        $request->validate([
            'increment_salary' => 'required',
            'effected_date' => 'required',
        ]);

        $user = User::find($id);
        $previous_salary = $user->salary;
        $present_salary = (float)$previous_salary+(float)$request->increment_salary;
        $user->salary = $present_salary;
        $user->save();

        $salaryData = new EmployeeSalaryLog();
        $salaryData->employee_id = $id;
        $salaryData->previous_salary = $previous_salary;
        $salaryData->increment_salary = $request->increment_salary;
        $salaryData->present_salary = $present_salary;
        $salaryData->effected_date = date('Y-m-d',strtotime($request->effected_date));

        $salaryData->save();
        return redirect()->route('emplyoee.salary.view')->with('Done','Salary Increment successfully.');
    }

    public function details($id){
        $data['details'] = User::find($id);
        $data['salary_log'] = EmployeeSalaryLog::where('employee_id',$data['details']->id)->get();
        return view('backend.employee.employee_salary.increment_salary_detail',$data);
    }

    public function pay($id){
        $info['pay'] = User::find($id);
        return view('backend.employee.employee_salary.pay_slip',$info);
    }
}
