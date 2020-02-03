<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    // Un nivel tiene muchos usuarios
    public function users(){
        return $this->hasMany(User::class);
    }
}
