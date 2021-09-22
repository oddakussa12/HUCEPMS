<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collage extends Model
{
    protected $fillable = [
        'CollageName','programtype_id','programlevel_id','registrar_id'
    ];

    public function programType(){
        return $this->belongsTo('App\ProgramType','programtype_id');
    }
    public function programLevel(){
        return $this->belongsTo('App\ProgramLevel','programlevel_id');
    }
    public function departements(){
        return $this->hasMany('App\Departement');
    }
    // collage has many subjects
    public function subjects(){
        return $this->hasMany('App\Subject');
    }
}
