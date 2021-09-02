<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'subject_code',
        // 'teacher_id',
        'description',
        'collage_id',
        'credit_hr',
    ];

    // public function teacher()
    // {
    //     return $this->belongsTo(Teacher::class);
    // }
    // subject belongs to many departements
    public function departements(){
        return $this->belongsToMany('App\Departement');
    }
    public function teachers(){
        return $this->belongsToMany('App\Teacher')
        ->withPivot('teacher_id');
    }
    public function resources(){
        return $this->hasMany('App\Resource');
    }

    public function exams(){
        return $this->hasMany('App\Exam');
    }

    public function grad(){
        return $this->hasOne('App\Grad');
    }
}
