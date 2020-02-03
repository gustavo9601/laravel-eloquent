<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //un perfil pertenece a un usuario
    public function user(){
        return $this->belongsTo(User::class);
    }
}
