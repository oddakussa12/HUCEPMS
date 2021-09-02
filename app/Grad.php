<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grad extends Model
{
    protected $fillable = [
        'subject_id','student_id','grade'
    ];
    
    public function subject(){
        return $this->belongsTo('App\Subject');
    }
    
}
