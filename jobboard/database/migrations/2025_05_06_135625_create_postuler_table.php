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
        Schema::create('postuler', function (Blueprint $table) {
            $table->integer('IDOffre');
            $table->integer('IDCandidat');
            $table->integer('IDCv');
            $table->primary(['IDOffre', 'IDCandidat', 'IDCv']);

            $table->foreign('IDOffre')->references('IDOffre')->on('offre')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('IDCandidat')->references('IDCandidat')->on('candidat')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('IDCv')->references('IDCv')->on('cvcandidat')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postuler');
    }
};
