<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //un video pertenece a un usuario
    public function user(){
        return $this->belongsTo(User::class);
    }

    //un video pertenece a una categoria
    public function category(){
        return $this->belongsTo(Category::class);
    }


    //uno a muchos
    public function comments(){
        // un video tiene muchos comentarios puede ser hasMany
        // en este caso es polimorfico
        // el metodo polimorfico sera commentable
        // para que permita reutilizar los mismos campos especificando el valor y la entidad a la que hace relacion
        return $this->morphMany(Comment::class, 'commentable');
        //comentable_id
        //comentable_type

    }

    //un video tiene una imagen
    public function image(){
        //seria un hasOne
        //pero este es polimorfico donde se especificara el tipo de la entidad y el valor
        return $this->morphOne(Image::class, 'imageable');
    }


    //un video tiene muchas etiquetas y una etiqueta muchos videos
    public function tags(){
        //muchos a muchos

        //una tabla polimorfica puede tener muchas formas
        //para este caso tiene muchos tipo de entidades y muchos valores
        return $this->morphToMany(Tag::class, 'taggable');
    }


}
