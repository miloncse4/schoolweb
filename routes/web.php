<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\YearController;
use App\Http\Controllers\Backend\Marks\GradeController;
use App\Http\Controllers\Backend\Marks\MarksController;
use App\Http\Controllers\Backend\Setup\GroupController;
use App\Http\Controllers\Backend\Setup\ShiftController;
use App\Http\Controllers\Backend\Report\AllStudentResult;
use App\Http\Controllers\Backend\Report\ProfitController;
use App\Http\Controllers\Backend\Setup\SubjectController;
use App\Http\Controllers\Backend\Account\SalaryController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Student\ExamFeeController;
use App\Http\Controllers\Backend\Account\OtherCostController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Account\StudentFeeController;
use App\Http\Controllers\Backend\Employee\EmpSalaryController;
use App\Http\Controllers\Backend\Setup\AsignSubjectController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\Employee\EmployeRegController;
use App\Http\Controllers\Backend\Employee\EmpAttendanceController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){

        Route::prefix('/user')->group(function(){
        Route::get('/view',[UserController::class,'view'])->name('user.view');
        Route::get('/add',[UserController::class,'create'])->name('user.create');
        Route::post('/store',[UserController::class,'store'])->name('user.store');
        Route::get('/edit/{id}',[UserController::class,'edit'])->name('user.edit');
        Route::post('/update/{id}',[UserController::class,'update'])->name('user.update');
        Route::get('/delete/{id}',[UserController::class,'delete'])->name('user.delete');
        });
        
        //profile start
        Route::prefix('/profile')->group(function(){
        Route::get('/add',[ProfileController::class,'add'])->name('profile.add');
        Route::get('/edit/{id}',[ProfileController::class,'edit'])->name('profile.edit');
        Route::post('/update/{id}',[ProfileController::class,'update'])->name('profile.update');
        Route::get('/change/password',[ProfileController::class,'password'])->name('profile.password');
        Route::post('/change',[ProfileController::class,'change'])->name('profile.change');
        });
        //profile end

        //student setup start
        Route::prefix('/setup')->group(function(){
            Route::get('/student/class/view',[StudentClassController::class,'index'])->name('setup.student.view');
            Route::get('/student/class/create',[StudentClassController::class,'create'])->name('setup.student.create');
            Route::post('/student/class/store',[StudentClassController::class,'store'])->name('setup.student.store');
            Route::get('/student/class/edit/{id}',[StudentClassController::class,'edit'])->name('setup.student.edit');
            Route::post('/student/class/update/{id}',[StudentClassController::class,'update'])->name('setup.student.update');
            Route::get('/student/class/delete/{id}',[StudentClassController::class,'destroy'])->name('setup.student.destroy');

            //Student year
            Route::get('/student/year/view',[YearController::class,'index'])->name('setup.student.year.view');
            Route::get('/student/year/create',[YearController::class,'create'])->name('setup.student.year.create');
            Route::post('/student/year/store',[YearController::class,'store'])->name('setup.student.year.store');
            Route::get('/student/year/edit/{id}',[YearController::class,'edit'])->name('setup.student.year.edit');
            Route::post('/student/year/update/{id}',[YearController::class,'update'])->name('setup.student.year.update');

            //Student Group
            Route::get('/student/group/view',[GroupController::class,'index'])->name('setup.student.group.view');
            Route::get('/student/group/create',[GroupController::class,'create'])->name('setup.student.group.create');
            Route::post('/student/group/store',[GroupController::class,'store'])->name('setup.student.group.store');
            Route::get('/student/group/edit/{id}',[GroupController::class,'edit'])->name('setup.student.group.edit');
            Route::post('/student/group/update/{id}',[GroupController::class,'update'])->name('setup.student.group.update');

            //shift route
            Route::get('/student/shift/view',[ShiftController::class,'index'])->name('setup.student.shift.view');
            Route::get('/student/shift/create',[ShiftController::class,'create'])->name('setup.student.shift.create');
            Route::post('/student/shift/store',[ShiftController::class,'store'])->name('setup.student.shift.store');
            Route::get('/student/shift/edit/{id}',[ShiftController::class,'edit'])->name('setup.student.shift.edit');
            Route::post('/student/shift/update/{id}',[ShiftController::class,'update'])->name('setup.student.shift.update');

            //Fee Category
            Route::get('/fee/category/view',[FeeCategoryController::class,'index'])->name('setup.fee.view');
            Route::get('/fee/category/create',[FeeCategoryController::class,'create'])->name('setup.fee.create');
            Route::post('/fee/category/store',[FeeCategoryController::class,'store'])->name('setup.fee.store');
            Route::get('/fee/category/edit/{id}',[FeeCategoryController::class,'edit'])->name('setup.fee.edit');
            Route::post('/fee/category/update/{id}',[FeeCategoryController::class,'update'])->name('setup.fee.update');

            //fee category amount
            Route::get('/fee/amount/view',[FeeAmountController::class,'index'])->name('setup.fee.amount.view');
            Route::get('/fee/amount/create',[FeeAmountController::class,'create'])->name('setup.fee.amount.create');
            Route::post('/fee/amount/store',[FeeAmountController::class,'store'])->name('setup.fee.amount.store');
            Route::get('/fee/amount/edit/{fee_category_id}',[FeeAmountController::class,'edit'])->name('setup.fee.amount.edit');
            Route::post('/fee/amount/update/{fee_category_id}',[FeeAmountController::class,'update'])->name('setup.fee.amount.update');
            Route::get('/fee/amount/details/{fee_category_id}',[FeeAmountController::class,'details'])->name('setup.fee.amount.details');

            //Exam type route
            Route::get('/exam/type/view',[ExamTypeController::class,'index'])->name('setup.exam.type.view');
            Route::get('/exam/type/create',[ExamTypeController::class,'create'])->name('setup.exam.type.create');
            Route::post('/exam/type/store',[ExamTypeController::class,'store'])->name('setup.exam.type.store');
            Route::get('/exam/type/edit/{id}',[ExamTypeController::class,'edit'])->name('setup.exam.type.edit');
            Route::post('/exam/type/update/{id}',[ExamTypeController::class,'update'])->name('setup.exam.type.update');

            //Subject route
            Route::get('/subject/index',[SubjectController::class,'index'])->name('setup.subject.view');
            Route::get('/subject/create',[SubjectController::class,'create'])->name('setup.subject.create');
            Route::post('/subject/store',[SubjectController::class,'store'])->name('setup.subject.store');
            Route::get('/subject/edit/{id}',[SubjectController::class,'edit'])->name('setup.subject.edit');
            Route::post('/subject/update/{id}',[SubjectController::class,'update'])->name('setup.subject.update');

            //Asign subject
            Route::get('/assign/subject/index',[AsignSubjectController::class,'index'])->name('setup.asign.subject.view');
            Route::get('/assign/subject/create',[AsignSubjectController::class,'create'])->name('setup.asign.subject.create');
            Route::post('/assign/subject/store',[AsignSubjectController::class,'store'])->name('setup.asign.subject.store');
            Route::get('/assign/subject/details/{class_id}',[AsignSubjectController::class,'details'])->name('setup.asign.subject.details');
            Route::get('/assign/subject/delete/{class_id}',[AsignSubjectController::class,'delete'])->name('setup.asign.subject.delete');

            //designation 
            Route::get('/Designation/view',[DesignationController::class,'index'])->name('setup.designation.view');
            Route::get('/Designation/create',[DesignationController::class,'create'])->name('setup.designation.create');
            Route::post('/Designation/store',[DesignationController::class,'store'])->name('setup.designation.store');
            Route::get('/Designation/edit/{id}',[DesignationController::class,'edit'])->name('setup.designation.edit');
            Route::post('/Designation/update/{id}',[DesignationController::class,'update'])->name('setup.designation.update');
            Route::get('/Designation/delete/{id}',[DesignationController::class,'destroy'])->name('setup.designation.delete');
        });
        //end setup

        //Student
        Route::prefix('/student')->group(function(){
            Route::get('/rege/view',[StudentRegController::class,'index'])->name('student.reg.view');
            Route::get('/rege/add',[StudentRegController::class,'create'])->name('student.reg.add');
            Route::post('/rege/store',[StudentRegController::class,'store'])->name('student.reg.store');
            Route::get('/rege/edit/{student_id}',[StudentRegController::class,'edit'])->name('student.reg.edit');
            Route::post('/rege/update/{student_id}',[StudentRegController::class,'update'])->name('student.reg.update');
            Route::get('/rege/search',[StudentRegController::class,'serch'])->name('student.reg.search');
            Route::get('/promotion/{student_id}',[StudentRegController::class,'promotion'])->name('student.reg.promotion');
            Route::post('/promotion/store/{student_id}',[StudentRegController::class,'pstore'])->name('student.reg.promotion.store');
            Route::get('/reg/details/{student_id}',[StudentRegController::class,'details'])->name('student.reg.details');
            // Route::get('/reg/active/status/{id}',[StudentRegController::class,'inactive'])->name('student.reg.inactive');

            //Regeistration Fee
            Route::get('/registration/fee',[RegistrationFeeController::class,'index'])->name('student.regist.fee.view');
            Route::get('/registration/fee/create',[RegistrationFeeController::class,'create'])->name('student.regist.fee.create');
            Route::post('/registration/fee/store',[RegistrationFeeController::class,'store'])->name('student.regist.fee.store');
            Route::get('/registration/fee/edit/{id}',[RegistrationFeeController::class,'edit'])->name('student.regist.edit');
            Route::post('/registration/fee/update/{id}',[RegistrationFeeController::class,'update'])->name('student.regist.update');
            Route::get('/registration/fee/delete/{id}',[RegistrationFeeController::class,'destroy'])->name('student.regist.delete');
            //Monthlyfee
            Route::get('/monthlyfee/view',[MonthlyFeeController::class,'index'])->name('student.monthly.view');
            Route::get('/monthlyfee/create',[MonthlyFeeController::class,'create'])->name('student.monthly.create');
            Route::post('/monthlyfee/store',[MonthlyFeeController::class,'store'])->name('student.monthly.store');
            Route::get('/monthlyfee/edit/{id}',[MonthlyFeeController::class,'edit'])->name('student.monthly.edit');
            Route::post('/monthlyfee/update/{id}',[MonthlyFeeController::class,'update'])->name('student.monthly.update');
            Route::get('/monthlyfee/delete/{id}',[MonthlyFeeController::class,'update'])->name('student.monthly.delete');
            //Examfee
            Route::get('/exam/fee/view',[ExamFeeController::class,'index'])->name('student.exam.view');
            Route::get('/exam/fee/create',[ExamFeeController::class,'create'])->name('student.exam.create');
            Route::post('/exam/fee/store',[ExamFeeController::class,'store'])->name('student.exam.store');
            Route::get('/exam/fee/edit/{id}',[ExamFeeController::class,'edit'])->name('student.exam.edit');
            Route::post('/exam/fee/update/{id}',[ExamFeeController::class,'update'])->name('student.exam.update');
            Route::get('/exam/fee/delete/{id}',[ExamFeeController::class,'destroy'])->name('student.exam.delete');
        });

        //Employee
        Route::prefix('/employee')->group(function(){
            Route::get('/reg/index',[EmployeRegController::class,'index'])->name('emplyoee.reg.index');
            Route::get('/reg/add',[EmployeRegController::class,'create'])->name('emplyoee.reg.add');
            Route::post('/reg/store',[EmployeRegController::class,'store'])->name('emplyoee.reg.store');
            Route::get('/reg/edit/{id}',[EmployeRegController::class,'edit'])->name('emplyoee.reg.edit');
            Route::post('/reg/update/{id}',[EmployeRegController::class,'update'])->name('emplyoee.reg.update');
            Route::get('/reg/details/{id}',[EmployeRegController::class,'details'])->name('emplyoee.reg.details');
            Route::get('/reg/delete/{id}',[EmployeRegController::class,'delete'])->name('emplyoee.reg.delete');
            //Employee salary
            Route::get('/salary/view',[EmpSalaryController::class,'index'])->name('emplyoee.salary.view');
            Route::get('/salary/increment/{id}',[EmpSalaryController::class,'increment'])->name('emplyoee.salary.increment');
            Route::post('/salary/inc/store/{id}',[EmpSalaryController::class,'store'])->name('emplyoee.salary.store');
            Route::get('/salary/view/details/{id}',[EmpSalaryController::class,'details'])->name('emplyoee.salary.details');
            Route::get('/salary/payslip/{id}',[EmpSalaryController::class,'pay'])->name('emplyoee.salary.pay');
            //Employee Leave
            Route::get('/leave/view',[EmployeeLeaveController::class,'index'])->name('emplyoee.leave.view');
            Route::get('/leave/add',[EmployeeLeaveController::class,'create'])->name('emplyoee.leave.add');
            Route::post('/leave/store',[EmployeeLeaveController::class,'store'])->name('emplyoee.leave.store');
            Route::get('/leave/edit/{id}',[EmployeeLeaveController::class,'edit'])->name('emplyoee.leave.edit');
            Route::post('/leave/update/{id}',[EmployeeLeaveController::class,'update'])->name('emplyoee.leave.update');
            Route::get('/leave/delete/{id}',[EmployeeLeaveController::class,'destroy'])->name('emplyoee.leave.delete');
            //Employee attendance
            Route::get('/attendance/view',[EmpAttendanceController::class,'index'])->name('emplyoee.attendance.view');
            Route::get('/attendance/add',[EmpAttendanceController::class,'create'])->name('emplyoee.attendance.add');
            Route::post('/attendance/store',[EmpAttendanceController::class,'store'])->name('emplyoee.attendance.store');
            Route::get('/attendance/edit/{date}',[EmpAttendanceController::class,'edit'])->name('emplyoee.attendance.edit');
            Route::get('/attendance/details/{date}',[EmpAttendanceController::class,'details'])->name('emplyoee.attendance.details');
        });

        Route::prefix('/marks')->group(function(){
            Route::get('/add',[MarksController::class,'add'])->name('marks.add');
            Route::post('/store',[MarksController::class,'store'])->name('marks.store');
            Route::get('/edit',[MarksController::class,'edit'])->name('marks.edit');
            Route::get('/get-student-marks',[MarksController::class,'getMarks'])->name('get-student-marks');
            Route::post('/update',[MarksController::class,'update'])->name('marks.update');
            //Grate point
            Route::get('/grade/index',[GradeController::class,'index'])->name('marks.grade.index');
            Route::get('/grade/add',[GradeController::class,'create'])->name('marks.grade.add');
            Route::post('/grade/store',[GradeController::class,'store'])->name('marks.grade.store');
            Route::get('/grade/edit/{id}',[GradeController::class,'edit'])->name('marks.grade.edit');
            Route::post('/grade/update/{id}',[GradeController::class,'update'])->name('marks.grade.update');
        });

        //Ajax Marks Route
        Route::get('/get-student',[DefaultController::class,'getStudent'])->name('get-student');
        Route::get('/get-subject',[DefaultController::class,'getSubject'])->name('get-subject');

        //Account route
        Route::prefix('/account')->group(function(){
            Route::get('/student/fee/view',[StudentFeeController::class,'index'])->name('account.fee.view');
            Route::get('/student/fee/add',[StudentFeeController::class,'create'])->name('account.fee.add');
            Route::post('/student/fee/store',[StudentFeeController::class,'store'])->name('account.fee.store');
            Route::get('/student/getstudent',[StudentFeeController::class,'getStudent'])->name('accounts.fee.getstudent');
            Route::get('/student/fee/delete/{id}',[StudentFeeController::class,'destroy'])->name('account.fee.delete');
            //Empolye salary 
            Route::get('/salary/view',[SalaryController::class,'index'])->name('salary.view');
            Route::get('/salary/add',[SalaryController::class,'create'])->name('salary.add');
            Route::post('/salary/store',[SalaryController::class,'store'])->name('salary.store');
            Route::get('/salary/edit/{id}',[SalaryController::class,'edit'])->name('salary.edit');
            Route::post('/salary/update/{id}',[SalaryController::class,'update'])->name('salary.update');
            Route::get('/salary/delete/{id}',[SalaryController::class,'destroy'])->name('salary.delete');
            //Other cost
            Route::get('/othercost/view',[OtherCostController::class,'index'])->name('othercost.view');
            Route::get('/othercost/add',[OtherCostController::class,'create'])->name('othercost.add');
            Route::post('/othercost/store',[OtherCostController::class,'store'])->name('othercost.store');
            Route::get('/othercost/edit/{id}',[OtherCostController::class,'edit'])->name('othercost.edit');
            Route::post('/othercost/update/{id}',[OtherCostController::class,'update'])->name('othercost.update');
            Route::get('/othercost/delete/{id}',[OtherCostController::class,'destroy'])->name('othercost.delete');
        });

        //Report route
        Route::prefix('/reports')->group(function(){
            Route::get('/attendance/view',[ProfitController::class,'view'])->name('attendance.view');
            Route::get('/attendance/get',[ProfitController::class,'attendanceGet'])->name('attendance.get');
            //Student id card
            Route::get('/student_id/card/view',[ProfitController::class,'card_view'])->name('student_id.view');
            Route::get('/student_id/cardget',[ProfitController::class,'cardGet'])->name('student_id.get');
            //All Student Results
            Route::get('/result/view',[AllStudentResult::class,'resultView'])->name('result.view');
            Route::get('/result/get',[AllStudentResult::class,'resultGet'])->name('result.get');
            //marksheet
            Route::get('/marksheet/view',[ProfitController::class,'markView'])->name('marksheet.view');
            Route::get('/marksheet/get',[ProfitController::class,'markGet'])->name('marksheet.get');
        });
});
