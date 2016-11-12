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

//        return  User::find($this->user_id);
//        return $this->belongsTo('App\Profile');

        $profile_picture = User::where($this->user_id, Profile::find('user_id'));

        return $profile_picture;
    }
}
