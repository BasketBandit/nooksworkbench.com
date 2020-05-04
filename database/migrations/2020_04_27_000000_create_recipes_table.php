<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 32)->unique();
            $table->string('image', 255);
            $table->string('category', 32);
            $table->tinyInteger('customisable')->default(0);
            $table->string('grid', 7);
            $table->integer('sell');
            $table->string('tag', 64);
            $table->string('source', 64);
            $table->string('m1_id', 32);
            $table->integer('m1_val');
            $table->string('m2_id', 32);
            $table->integer('m2_val');
            $table->string('m3_id', 32);
            $table->integer('m3_val');
            $table->string('m4_id', 32);
            $table->integer('m4_val');
            $table->string('m5_id', 32);
            $table->integer('m5_val');
            $table->string('m6_id', 32);
            $table->integer('m6_val');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
