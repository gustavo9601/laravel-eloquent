<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        //factory(Modelo, cantidad a crear)->create();
        factory(App\Group::class, 5)->create();
        //creando con datos quemados
        // si no se especfiica cantidad se crea 1 solo
        factory(App\Level::class)->create(['name' => 'Oro']);
        factory(App\Level::class)->create(['name' => 'Plata']);
        factory(App\Level::class)->create(['name' => 'Bronce']);

        //->each()  cada ves que se cree un registro
        // se desencadena las siguientes funciones
        factory(App\User::class, 5)->create()->each(
            function ($user) {  //retorna la informacion de cada usuario creado

                $profile = $user->profile()->save(factory(App\Profile::class)->make());   // crea un perfil provisional con la informacion del usuario que lo creo
                $profile->location()->save(factory(App\Profile::class)->make());

                $user->groups()->attach($this->arreglo(rand(1, 3)));

                $user->image()->save(factory(App\Image::class)->make(
                    [ // se guarda la imagen con valores personalizados, y no los que estan en el factory
                        'url' => 'http://via.placeholder.com/90x90'
                    ]
                ));

            }
        );


        factory(App\Category::class, 4)->create();
        factory(App\Tag::class, 15)->create();


        factory(App\Post::class, 50)->create()->each(
            function ($post) {
                $post->image()->save(factory(App\Image::class)->make());
                $post->tags()->attach($this->arreglo(rand(1,12)));

                $number_comments = rand(1, 5);

                for ($i = 0; $i < $number_comments; $i ++){
                    $post->comments()->save(factory(App\Comentarios::class)->make());
                }
            }
        );



        factory(App\Video::class, 50)->create()->each(
            function ($video) {
                $video->image()->save(factory(App\Image::class)->make());
                $video->tags()->attach($this->arreglo(rand(1,12)));

                $number_comments = rand(1, 5);

                for ($i = 0; $i < $number_comments; $i ++){
                    $video->comments()->save(factory(App\Comentarios::class)->make());
                }
            }
        );

    }


    public function arreglo($max)
    {
        $values = [];


        for ($i = 1; $i < $max; $i++) {
            $values[] = $i;
        }

        return $values;
    }

}
