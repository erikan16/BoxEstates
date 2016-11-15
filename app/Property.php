<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }


    public function images()
    {
        return $this->hasMany('App\PropertyGallery');
    }

    public function imagesDisplay()
    {
        return $this->hasMany('App\PropertyGallery')->get();
    }

    public function getFirstImage()
    {
        return $this->hasMany('App\PropertyGallery')->first();
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
