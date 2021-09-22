<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $fillable = [
        'first_name','last_name','middle_name','email','resume','gender','phone_number',
        'departement_id', 'collage_id'
    ];

    public function departement(){
        return $this->belongsTo('App\Departement');
    }
    public function collage(){
        return $this->belongsTo('App\Collage');
    }
}
