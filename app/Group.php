<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    // Un grupo tiene y pertenece a muchos usuarios
    public function users(){

        // ->withTimestamps()  // permite llenar la tabla en los campos create_at y update_at
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
