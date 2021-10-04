<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipet extends Model
{
    protected $fillable = [
        'file_name', 'user_id','collage_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
