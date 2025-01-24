<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('session_id');
            $table->string('commentaire')->nullable();
            $table->string('modedepaiement')->nullable();
            $table->string('prix');
            $table->string('qte');
            $table->string('montant');
            $table->boolean('paye')->default(0);
            $table->boolean('livre')->default(0);
            $table->integer('ticketevenement_id')->unsigned();
            $table->integer('evenement_id')->unsigned();
            $table->integer('livraison_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
