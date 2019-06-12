<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInterventionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interventions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('description');
            $table->string('temps_arret');
            $table->string('heures_personnes');
            $table->string('prix_m_o');
            $table->string('prix_pieces');
            $table->string('total');
            $table->text('impact_sur_le_service');
            $table->integer('panne_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('panne_id')->references('id')->on('pannes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('interventions');
    }
}
