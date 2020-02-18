<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{

    protected $table = 'comentarios';
    //
    public function commentable(){
        //cambiar a, permite que las otras relaciones que usen esta tabla como polifmorfica realice la trasnformacion en las respectivas columnas
        return $this->morphTo();
    }

    //un comentario pertenece a un usuario
    public function user(){
        return $this->belongsTo(User::class);
    }

}
