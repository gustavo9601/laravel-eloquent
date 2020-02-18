<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

use App\User;
use App\Category;

$factory->define(Post::class, function (Faker $faker) {

    $usuarios = User::all();
    $cantidad = $usuarios->count();


    $categorias = Category::all();
    $cantidad_catgorias = $categorias->count();


    return [
        'name' => $faker->sentence,
        'category_id' => rand(1, $cantidad_catgorias),
        'user_id' => rand(1, $cantidad)
    ];
});
