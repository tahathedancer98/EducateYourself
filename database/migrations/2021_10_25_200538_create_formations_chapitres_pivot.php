<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsChapitresPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations_chapitres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('formation')->index();
            $table->unsignedBigInteger('chapitre')->index();
            $table->foreign('formation')
                ->references('id')
                ->on('formations');
            $table->foreign('chapitre')
                ->references('id')
                ->on('chapitres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formations_chapitres');
    }
}
