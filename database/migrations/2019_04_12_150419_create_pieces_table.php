<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePiecesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pieces', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nom');
            $table->string('quantite');
            $table->text('description');
            $table->string('nom_du_fournisseur');
            $table->string('prix_unitaire');
            $table->string('date_de_commande');
            $table->string('date_recu');
            $table->string('num_facture');
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
        Schema::drop('pieces');
    }
}
