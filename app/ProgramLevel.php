<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramLevel extends Model
{
    protected $fillable = [
        'name'
    ];

    public function collages(){
        return $this->hasMany('App\Collage');
    }
}
