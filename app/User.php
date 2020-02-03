<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    //Un usuario tiene un solo perfil
    public function profile(){
        return $this->hasOne(Profile::class);
    }

    //Un usuario pertenece a un level
    public function level(){
        return $this->belongsTo(Level::class);
    }


    //Un usuario puede pertenece y tiene muchos grupos
    // relacion muchos a muchos
    public function groups(){

        // ->withTimestamps()  // permite llenar la tabla en los campos create_at y update_at
        return $this->belongsToMany(Group::class)->withTimestamps();
    }

    // Tengo una localizacion atraves de Profile
    // Sirve cuando la relacion hay alguna otra tabla intermedia
    // Para ello en la tabla intermedia debe existir la relacion hasOne normal
    public function location(){
        return $this->hasOneThrough(Location::class, Profile::class);
    }

}
