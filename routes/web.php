<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $users = App\User::all();  // consulta en el modelo de todos los usuarios

    return view('welcome', ['users' => $users]);
});




Route::get('profile/{id}', function($id){

    $user = \App\User::find($id);

    //user accede a la funcion posts, que retorna todos los que tenga el usuario
    //withCount('comments') el modelo Posts cuenta con la funcion comments y los retornara
    $posts = $user->posts()
        ->with('category', 'image', 'tags')    //nombre de los metodos en el Modelo post para que traiga el join en la consulta
        ->withCount('comments')->get();

    $videos = $user->videos()
        ->with('category', 'image', 'tags')    //nombre de los metodos en el Modelo Video para que traiga el join en la consulta
        ->withCount('comments')->get();

    //dd($user->name);
    //dd($user);


    return view('profile', [
       'user' => $user,
        'posts' => $posts,
        'videos' => $videos
    ]);

})->name('profile');