<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    // Un nivel tiene muchos usuarios
    public function users(){
        return $this->hasMany(User::class);
    }

    public function posts(){
        // tiene muchos pots a traves del perfil
        return $this->hasManyThrough(Post::class, Profile::class);
    }


    public function videos(){
        // tiene mchos videos a traves del perfil
        return $this->hasManyThrough(Video::class, Profile::class);
    }
}
