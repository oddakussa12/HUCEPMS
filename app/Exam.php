<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'name','subject_id','value'
    ];

    public function subject(){
        return $this->belongsTo('App\Subject');
    }
    public function students(){
        return $this->belongsToMany('App\Student');
    }
}
