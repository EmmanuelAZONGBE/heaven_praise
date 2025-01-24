<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achats', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('datefacture')->nullable();
            $table->string('numcommande');
            $table->string('numfacture');
            $table->string('bondecommande')->nullable();
            $table->string('facture')->nullable();
            $table->string('bordereau')->nullable();
            $table->string('fichereception')->nullable();
            $table->boolean('paye')->default('0');
            $table->boolean('livre')->default('0');
            $table->boolean('validebon')->default('0');
            $table->boolean('validefacture')->default('0');
            $table->integer('prestataire_id')->unsigned();
            $table->integer('service_id')->unsigned();
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
        Schema::dropIfExists('achats');
    }
}
