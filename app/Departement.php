<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $fillable = [
        'name','collage_id'
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
}
