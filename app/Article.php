<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function comments(){

        return $this->hasMany('App\Comment');

    }

    public function getArticleAuthor(){

       return  User::find($this->user_id);

    }

    public function getComments()
    {



    }
}
