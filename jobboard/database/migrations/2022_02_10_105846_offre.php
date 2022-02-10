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
        Schema::create('offre', function (Blueprint $blueprint){
                    $blueprint->id();
                    $blueprint->string('titre_offre');
                    $blueprint->string('description_offre');
                    $blueprint->datetime('date_publication_offre');
                    $blueprint->float('remuneration_offre');
                    $blueprint->datetime('date_debut_contrat');
                    $blueprint->string('duree_contrat');
                    $blueprint->boolean('status_offre');
                    $blueprint->foreign('id_type_offre')->references('id')->on('type_offre');
                    $blueprint->foreign('numero_siret_entreprise')->references('numero_siret')->on('entreprise');
               });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('offre');
    }
};
