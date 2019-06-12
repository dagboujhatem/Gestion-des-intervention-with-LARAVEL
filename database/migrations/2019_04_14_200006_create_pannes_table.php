<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePannesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pannes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nom');
            $table->string('temps_estime');
            $table->text('description');
            $table->string('type_de_panne');
            $table->string('priorite');

            $table->integer('equipement_id')->unsigned();
            $table->foreign('equipement_id')->references('id')->on('equipements')
                 ->onDelete('cascade')->onUpdate('cascade');
                 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pannes');
    }
}
