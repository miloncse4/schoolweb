<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\StudentClass;
use App\Models\Year;
use App\Models\ExamType;
use App\Models\AssignSubject;
use App\Models\MarksGrade;

class StudentMarks extends Model
{
    use HasFactory;

    public function student(){
        return $this->belongsTo(User::class,'student_id','id');
    }

    public function class_name(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }

    public function year_name(){
        return $this->belongsTo(Year::class,'year_id','id');
    }

    public function assign_subject(){
        return $this->belongsTo(AssignSubject::class,'assign_subject_id','id');
    }

    public function exam_type(){
        return $this->belongsTo(ExamType::class,'exam_type_id','id');
    }

    public function total_grade(){
        return $this->hasOne(MarksGrade::class);
    }

}
