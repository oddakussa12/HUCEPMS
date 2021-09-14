<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GPA extends Model
{
    protected $fillable = [
        'student_id','GPA'
    ];

    public function student(){
        return $this->belongsTo('App\Student');
    }
}
