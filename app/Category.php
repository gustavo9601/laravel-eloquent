<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //una categoria tiene muchos post
    public function posts(){
        return $this->hasMany(Post::class);
    }


    //una categoria tiene muchos videos
    public function videos(){
        return $this->hasMany(Video::class);
    }
}
