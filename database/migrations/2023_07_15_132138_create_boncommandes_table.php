<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoncommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boncommandes', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('numcommande');
            $table->string('bondecommande')->nullable();
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
        Schema::dropIfExists('boncommandes');
    }
}
