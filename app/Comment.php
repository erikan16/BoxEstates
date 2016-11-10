<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $visible = [

        'id',
        'title',
        'description',
        'user_id'

    ];


    public function article(){

        return $this->belongsTo('App\Article');

    }

    public function getAuthor()
    {

        return User::find($this->user_id);

    }

}
