<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{


    //
    public function commentable(){
        return $this->morphTo();
    }
}
