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
        Schema::create('partenaire', function (Blueprint $table) {
            $table->id('SiretPartenaire');
            $table->string('RaisonSocialePartenaire', 50);
            $table->string('siegePartenaire', 50);
            $table->char('cpPartenaire', 5);
            $table->string('villePartenaire', 50);
            $table->string('contactPartenaire', 50)->unique();
            $table->string('dateDebutPartenariat', 50);
            $table->string('logoPartenaire', 500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partenaire');
    }
};
