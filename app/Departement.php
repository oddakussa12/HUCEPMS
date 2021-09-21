<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $fillable = [
        'name','collage_id','head_user_id'
    ];

    public function collage(){
        return $this->belongsTo('App\Collage');
    }
    // departement has many subjects
    public function subjects (){
        return $this->belongsToMany('App\Subject');
    }
    public function teachers (){
        return $this->hasMany('App\Teacher');
    }
    public function hasAnySubject($sub){
        return null !== $this->subjects()->where('name',$sub)->first();
    }
    public function students(){
        return $this->hasMany('App\Student');
    }
    public function deptSubjectTeacher($subject_id,$departement_id){
        $teacher = DB::select('select * from departement_subject where subject_id = ?', [$subject_id], '&& departement_id = ?',[$departement_id]);
        foreach($teacher as $teach){
            $teacherName = User::where('id',$teach->teacher_id)->get();
        }
        return $teacherName;
    }
}
