<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketevenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticketevenements', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('prix');
            $table->string('nombre');
            $table->boolean('disponible')->default(1);
            $table->integer('evenement_id')->unsigned()->nullable();
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
        Schema::dropIfExists('ticketevenements');
    }
}
