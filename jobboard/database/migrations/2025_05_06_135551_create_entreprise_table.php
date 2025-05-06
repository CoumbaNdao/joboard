<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprise', function (Blueprint $table) {
            $table->bigInteger('numeroSiret')->unique();
            $table->string('raisonSociale', 100);
            $table->string('descEntreprise', 2500);
            $table->string('adresseEntreprise', 120);
            $table->char('cpEntreprise', 5)->nullable();
            $table->string('villeEntreprise', 50);
            $table->char('telEntreprise', 10)->unique();
            $table->string('emailEntreprise', 50)->unique();
            $table->string('loginEntreprise', 50)->unique();
            $table->string('mdpEntreprise', 255);
            $table->string('urlEntreprise', 2000);
            $table->integer('codePostalRegion')->unsigned()->nullable();

            $table->foreign('codePostalRegion')->references('codePostalRegion')->on('region')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entreprise');
    }
};
