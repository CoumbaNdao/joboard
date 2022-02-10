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
         Schema::create('concerner', function (Blueprint $blueprint){
                        $blueprint->id();
                         $blueprint->id();

                        $blueprint->foreign('id_type_competence')->references('id')->on('type_competence');
                        $blueprint->foreign('id_competence')->references('id')->on('competence');
                        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('concerner');
    }
};
