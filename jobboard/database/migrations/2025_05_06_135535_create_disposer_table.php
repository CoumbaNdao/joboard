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
        Schema::create('disposer', function (Blueprint $table) {
            $table->integer('IDCandidat');
            $table->integer('IDCompetence');
            $table->primary(['IDCandidat', 'IDCompetence']);

            $table->foreign('IDCandidat')->references('IDCandidat')->on('candidat')->onDelete('no action')->onUpdate('cascade');
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
        Schema::dropIfExists('disposer');
    }
};
