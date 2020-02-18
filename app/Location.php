<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //una localizacion pertenece a un perfil
    public function profile(){
        return $this->belongsTo(Profile::class);
    }
}
