<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $fillable = [
        'first_name','last_name','middle_name','email','resume','gender','phone_number'
    ];
}
