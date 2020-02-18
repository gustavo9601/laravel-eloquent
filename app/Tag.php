<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //una etiqueta tiene muchos post
    public function posts(){
        return $this->morphedByMany(Post::class, 'taggable');
    }


    //una etiqueta tiene muchos videos
    public function videos(){
        return $this->morphedByMany(Video::class, 'videoable');
    }
}
