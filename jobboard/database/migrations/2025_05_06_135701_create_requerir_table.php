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
        Schema::create('requerir', function (Blueprint $table) {
            $table->integer('IDOffre');
            $table->integer('IDCompetence');
            $table->primary(['IDOffre', 'IDCompetence']);

            $table->foreign('IDOffre')->references('IDOffre')->on('offre')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('IDCompetence')->references('IDCompetence')->on('competence')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requerir');
    }
};
