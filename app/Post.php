<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Un post pertenece a un usuario
    public function user(){
        return $this->belongsTo(User::class);
    }


    //Un post pertenece a una categoria
    public function category(){
        return $this->belongsTo(Category::class);
    }


    //uno a muchos
    public function comments(){
        // un post tiene muchos comentarios puede ser hasMany
        // en este caso es polimorfico
        // el metodo polimorfico sera commentable
        // para que permita reutilizar los mismos campos especificando el valor y la entidad a la que hace relacion
        return $this->morphMany(Comment::class, 'commentable');
        //comentable_id
        //comentable_type

    }

    //un post tiene una imagen
    public function image(){
        //seria un hasOne
        //pero este es polimorfico donde se especificara el tipo de la entidad y el valor
        return $this->morphOne(Image::class, 'imageable');
    }


    //un post tiene muchas etiquetas y una etiqueta muchos post
    public function tags(){
        //muchos a muchos
        return $this->morphToMany(Tag::class, 'taggable');
    }

}
