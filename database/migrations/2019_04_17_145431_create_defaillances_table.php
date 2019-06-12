<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDefaillancesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defaillances', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('description');
            $table->string('responsable'); 

            $table->integer('entretien_id')->unsigned();
            $table->foreign('entretien_id')->references('id')->on('entretiens')
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
        Schema::drop('defaillances');
    }
}
