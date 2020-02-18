<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comentarios;
use Faker\Generator as Faker;

use App\User;

$factory->define(Comentarios::class, function (Faker $faker) {


    $usuarios = User::all();
    $cantidad = $usuarios->count();

    return [
        'name' => $faker->text,
        'user_id' => rand(1, $cantidad)
    ];
});
