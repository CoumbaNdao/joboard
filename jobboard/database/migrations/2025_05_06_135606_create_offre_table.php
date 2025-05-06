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
        Schema::create('offre', function (Blueprint $table) {
            $table->integer('IDOffre')->autoIncrement();
            $table->string('titreOffre', 100);
            $table->string('descOffre', 2500);
            $table->date('datePubOffre');
            $table->float('remuneration', 10, 2)->nullable();
            $table->date('dateDebutContrat');
            $table->string('dureeContrat', 20);
            $table->enum('statutOffre', ['publiee', 'expiree', 'en attente de publication']);
            $table->integer('IDTypeOffre')->nullable();
            $table->integer('numeroSiret')->nullable();
            $table->integer('IDNiveauEtude')->nullable();


            $table->foreign('numeroSiret')->references('numeroSiret')->on('entreprise')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('IDTypeOffre')->references('IDTypeOffre')->on('typeoffre')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('IDNiveauEtude')->references('IDNiveauEtude')->on('niveauetude')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offre');
    }
};
