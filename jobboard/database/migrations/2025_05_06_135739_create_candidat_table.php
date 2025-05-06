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
        Schema::create('candidat', function (Blueprint $table) {
            $table->integer('IDCandidat')->autoIncrement();
            $table->string('nomCandidat', 100);
            $table->string('prenomCandidat', 250);
            $table->string('emailCandidat', 50)->unique();
            $table->char('telephoneCandidat', 10)->nullable()->unique();
            $table->string('adresseCandidat', 120);
            $table->char('cpCandidat', 5)->nullable();
            $table->string('villeCandidat', 50);
            $table->string('loginCandidat', 50)->unique();
            $table->string('mdpCandidat', 255);
            $table->integer('codePostalRegion')->unsigned();
            $table->integer('IDNiveauEtude')->unsigned();

            $table->primary('IDCandidat');

            $table->foreign('codePostalRegion')->references('codePostalRegion')->on('region')->onDelete('no action')->onUpdate('cascade');
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
        Schema::dropIfExists('candidat');
    }
};
