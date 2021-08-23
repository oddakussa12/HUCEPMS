<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramType extends Model
{
    protected $fillable = [
        'name'
    ];
    public function collages(){
        return $this->hasMany('App\Collage');
    }
}
