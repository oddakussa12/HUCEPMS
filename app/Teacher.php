<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'user_id',
        'gender',
        'phone',
        'dateofbirth',
        'current_address',
        'permanent_address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function subjects()
    // {
    //     return $this->hasMany(Subject::class);
    // }
    public function subjects(){
        return $this->belongsToMany('App\Subject')
        ->withPivot('teacher_id');
    }

    public function classes()
    {
        return $this->hasMany(Grade::class);
    }

    public function students() 
    {
        return $this->classes()->withCount('students');
    }
    public function resources(){
        return $this->hasMany('App\Resource');
    }
}
