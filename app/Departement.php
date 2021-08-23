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
    public function subjects (){
        return $this->hasMany('App\Subject');
    }
    public function teachers (){
        return $this->hasMany('App\Teacher');
    }
}
