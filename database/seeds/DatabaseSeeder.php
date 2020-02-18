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
    }


}
