<?php

namespace App\Http\Controllers\Backend;

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
use App\Models\AssignSubject;
use File;

class DefaultController extends Controller
{
    public function getStudent(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $allData = AssignStudent::with(['student'])->where('year_id',$year_id)->where('class_id',$class_id)->get();
        return response()->json($allData);
    }

    public function getSubject(Request $request){
        $class_id = $request->class_id;
        $allData = AssignSubject::with(['subject_name'])->where('class_id',$class_id)->get();
        return response()->json($allData);
    }
}
