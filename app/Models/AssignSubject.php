<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    use HasFactory;

    public function class_name(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }

    public function subject_name(){
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
}
