<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    public function imageable(){
        //es una tabla polimorfica
        //la relacion uno a uno o uno a muchos se define en la entidad que la relacionoa
        return $this->morphTo();
    }

}
