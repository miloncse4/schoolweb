<?php

namespace App\Http\Controllers\Backend\Student;

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
use File;

class StudentRegController extends Controller
{
    public function index(){
        $data['years'] = Year::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::all();
        $data['year_id'] = Year::orderBy('id','desc')->first()->id;
        $data['class_id'] = StudentClass::orderBy('id','asc')->first()->id;
        $data['allData'] = AssignStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();
        return view('backend.student.student_reg.student_view',$data);
    }

    public function serch(Request $request){
        $request->validate([
            'year_id' => 'required',
            'class_id' => 'required',
        ]);

        $data['years'] = Year::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::all();
        $data['year_id'] = $request->year_id;
        $data['class_id'] = $request->class_id;
        $data['allData'] = AssignStudent::where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
        return view('backend.student.student_reg.student_view',$data);
    }

    public function create(){

        $data['years'] = Year::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::all();
        $data['groups'] = Group::all();
        $data['shifts'] = Shift::all();

        return view('backend.student.student_reg.student_add', $data);
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
            'discount' => 'required',
            'year_id' => 'required',
            'class_id' => 'required',
        ]);

        DB::transaction(function () use($request){
            $checkYear = Year::find($request->year_id)->year;
            $student = User::where('usertype','student')->orderBy('id','DESC')->first();
            if($student == null){
                $firstReg = 0;
                $studentId = $firstReg + 1;
                if( $studentId < 10){
                    $id_no = '000'.$studentId;
                }
                elseif( $studentId < 100){
                    $id_no = '00'.$studentId;
                }
                elseif( $studentId < 1000){
                    $id_no = '0'.$studentId;
                }
            }
            else{
                $student = User::where('usertype','student')->orderBy('id','DESC')->first()->id;
                $studentId = $student + 1;
                if( $studentId < 10){
                    $id_no = '000'.$studentId;
                }
                elseif( $studentId < 100){
                    $id_no = '00'.$studentId;
                }
                elseif( $studentId < 1000){
                    $id_no = '0'.$studentId;
                }
            }
            $final_id_no = $checkYear.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'student';
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gander = $request->gander;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            if($request->file('img')){
                $file = $request->file('img');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('uploads/student_images'),$filename);
                $user['img'] = $filename;
            }
            $user->save();

            $assign_student = new AssignStudent();
            $assign_student->student_id = $user->id;
            $assign_student->roll = $request->roll;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();
            
            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_category_id = '1';
            $discount_student->discount = $request->discount;
            $discount_student->save();         
           
        });
        return redirect()->route('student.reg.view')->with('success','Student information insert successfully.!');
    
}

    public function edit($student_id){
        $data['editData'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        $data['years'] = Year::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::all();
        $data['groups'] = Group::all();
        $data['shifts'] = Shift::all();

        return view('backend.student.student_reg.edit', $data);
    }

    public function update(Request $request,$student_id){

        $request->validate([
            'name' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'gander' => 'required',
            'religion' => 'required',
            'dob' => 'required',
            'discount' => 'required',
            'year_id' => 'required',
            'class_id' => 'required',
        ]);

        DB::transaction(function () use($request,$student_id){
        
            $user = User::where('id',$student_id)->first();
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gander = $request->gander;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            if($request->file('img')){
                $file = $request->file('img');
                @unlink(public_path('uploads/student_images/'.$user->img));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('uploads/student_images'),$filename);
                $user['img'] = $filename;
            }
            $user->save();

            $assign_student = AssignStudent::where('id',$request->id)->where('student_id',$student_id)->first();
            $assign_student->roll = $request->roll;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();
            
            $discount_student = DiscountStudent::where('assign_student_id',$request->id)->first();
            $discount_student->discount = $request->discount;
            $discount_student->save();         
           
        });
        return redirect()->route('student.reg.view')->with('success','Student information update successfully.!');

    }

    public function promotion($student_id){
        $data['editData'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        $data['years'] = Year::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::all();
        $data['groups'] = Group::all();
        $data['shifts'] = Shift::all();

        return view('backend.student.student_reg.promotion_student', $data);
    }

    public function pstore(Request $request,$student_id){

        DB::transaction(function () use($request,$student_id){
        
            $user = User::where('id',$student_id)->first();
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gander = $request->gander;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            if($request->file('img')){
                $file = $request->file('img');
                @unlink(public_path('uploads/student_images/'.$user->img));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('uploads/student_images'),$filename);
                $user['img'] = $filename;
            }
            $user->save();

            $assign_student = new AssignStudent();
            $assign_student->student_id = $student_id;
            $assign_student->roll = $request->roll;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();
            
            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_category_id = '1';
            $discount_student->discount = $request->discount;
            $discount_student->save();         
           
        });
        return redirect()->route('student.reg.view')->with('success','Student promotion successfully.!');

    }

    public function details($student_id){
        $data['details'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        return view('backend.student.student_reg.student_details_pdf',$data);
    }

    // public function inactive($id){
    //     User::find($id)->update(['status' => 0]);
    //     return back();
    //     return $id;
    // }

}
