<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'subject_code',
        'teacher_id',
        'description',
        'collage_id'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    // subject belongs to many departements
    public function departements(){
        return $this->belongsToMany('App\Departement');
    }
}
