<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function property(){
        return $this->belongsToMany('App\Property');
    }
}
