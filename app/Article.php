<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function comments(){

        return $this->hasMany('App\Comment');

    }

    public function user() {
        return $this->hasOne('App\User');
    }

    public function getArticleAuthor(){

       return  User::find($this->user_id);
    }

    public function getAuthorImage(){

        $profile = Profile::where('user_id', $this->user_id)->first();

        if (null == $profile) {

            return 'default.jpg';

        } else {

            return $profile->image;
        }
    }
}
