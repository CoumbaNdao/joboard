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
       Schema::create('entreprise', function (Blueprint $blueprint){
            $blueprint->bigInteger('numero_siret');
            $blueprint->string('raison_social');
            $blueprint->string('adresse_entreprise');
            $blueprint->integer('code_postal_enteprise');
            $blueprint->string('ville_entreprise');
            $blueprint->email('email_entreprise');
            $blueprint->string('username_entreprise');
            $blueprint->password('password_entreprise');
            $blueprint->url('url_entreprise');
            $blueprint->foreign('code_postal_region')->references('code_postal')->on('region');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('entreprise');
    }
};
