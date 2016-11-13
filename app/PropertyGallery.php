<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyGallery extends Model
{
    protected $fillable = ['property_id', 'file_name', 'file_size', 'file_meme', 'file_path', 'user_id'];

    public function gallery(){
        return $this->belongsTo('App\Property');
    }
}
