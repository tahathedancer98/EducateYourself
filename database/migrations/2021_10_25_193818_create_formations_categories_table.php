<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('formation')->index()->nullable();
            $table->unsignedBigInteger('categorie')->index()->nullable();
            $table->foreign('formation')
                ->references('id')
                ->on('formations')
                ->onDelete('SET NULL');
            $table->foreign('categorie')
                ->references('id')
                ->on('categories')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formations_categories');
    }
}
