<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLevelIdAtUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // en ves de Schema::create usamos ::table que permitira editar una tabla existente
        Schema::table('users', function(Blueprint $table){
            $table->bigInteger('level_id')->unsigned()->nullable()
                ->after('id'); // le especficiamos despues de que columna queremos que se agregue esta nueva


            $table->foreign('level_id')->references('id')->on('levels')
                ->onDelete('set null')  // no se eliminara el usuario si no se actualizara a null
                ->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
