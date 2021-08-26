<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assesement extends Model
{
    protected $fillable = [
        'subject_id','student_id','testOne','testTwo','assignOne','assignTwo',
        'finalExam','total','grade'
    ];
    public function subject(){
        return $this->belongsTo('App\Subject');
    }
}
