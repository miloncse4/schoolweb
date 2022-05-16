<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\StudentClass;
use App\Models\Group;
use App\Models\Shift;
use App\Models\Year;
use App\Models\EmployeeSalaryLog;
use App\Models\Designation;
use File;

class EmployeRegController extends Controller
{
    public function index(){
        $data['allData'] = User::where('usertype','employee')->get();
        return view('backend.employee.employee_reg.employee_index',$data);
    }

    public function create(){
        $data['designation'] = Designation::all();
        return view('backend.employee.employee_reg.employee_add', $data);
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'gander' => 'required',
            'religion' => 'required',
            'dob' => 'required',
            'designation_id' => 'required',
            'join_date' => 'required',
            'salary' => 'required',
            'img' => 'required',
        ]);

        DB::transaction(function () use($request){
            $checkYear = date('Ym',strtotime($request->join_date));
            $employee = User::where('usertype','employee')->orderBy('id','DESC')->first();
            if($employee == null){
                $firstReg = 0;
                $employeeId = $firstReg + 1;
                if( $employeeId < 10){
                    $id_no = '000'.$employeeId;
                }
                elseif( $employeeId < 100){
                    $id_no = '00'.$employeeId;
                }
                elseif( $employeeId < 1000){
                    $id_no = '0'.$employeeId;
                }
            }
            else{
                $employee = User::where('usertype','employee')->orderBy('id','DESC')->first()->id;
                $employeeId = $employee + 1;
                if( $employeeId < 10){
                    $id_no = '000'.$employeeId;
                }
                elseif( $employeeId < 100){
                    $id_no = '00'.$employeeId;
                }
                elseif( $employeeId < 1000){
                    $id_no = '0'.$employeeId;
                }
            }
            $final_id_no = $checkYear.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'employee';
            $user->code = $code;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gander = $request->gander;
            $user->religion = $request->religion;
            $user->designation_id = $request->designation_id;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->join_date = date('Y-m-d',strtotime($request->join_date));
            $user->salary = $request->salary;
            if($request->file('img')){
                $file = $request->file('img');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('uploads/employee_images'),$filename);
                $user['img'] = $filename;
            }
            $user->save();

            $employee_salary = new EmployeeSalaryLog();
            $employee_salary->employee_id = $user->id;
            $employee_salary->effected_date = date('Y-m-d',strtotime($request->join_date));
            $employee_salary->previous_salary = $request->salary;
            $employee_salary->present_salary = $request->salary;
            $employee_salary->increment_salary = '0';
            
            $employee_salary->save();                
        });
        return redirect()->route('emplyoee.reg.index')->with('Done','Employee information insert successfully.!');
    
}

    public function edit($id){
        $data['users'] = User::find($id);
        $data['designation'] = Designation::all();

        return view('backend.employee.employee_reg.employee_edit', $data);
    }

    public function update(Request $request,$id){

        $request->validate([
            'name' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'gander' => 'required',
            'religion' => 'required',
            'dob' => 'required',
            'designation_id' => 'required',
        ]);
   
        $user = User::find($id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gander = $request->gander;
        $user->religion = $request->religion;
        $user->designation_id = $request->designation_id;
        $user->dob = date('Y-m-d',strtotime($request->dob));
        if($request->file('img')){
            $file = $request->file('img');
            @unlink(public_path('uploads/employee_images'.$user->img));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/employee_images'),$filename);
            $user['img'] = $filename;
        }
        $user->save();

        return redirect()->route('emplyoee.reg.index')->with('Done','Employee Data update successfully.!');

    }

    public function details($id){
        $data['details'] = User::find($id);
        return view('backend.employee.employee_reg.employee_details_pdf',$data);
    }

    public function delete($id){
        $data = User::find($id); 
        $data->delete();

        return redirect()->route('emplyoee.reg.index')->with('rong','Data Deleted..?');
    }
}
