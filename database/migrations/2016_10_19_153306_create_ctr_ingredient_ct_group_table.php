<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtrIngredientCtGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('ctr_ingredient_ctr_group');

        Schema::create('ctr_ingredient_ctr_group', function (Blueprint $table) {
            $table->integer('ctr_ingredient_id')->unsigned()->index();
            $table->foreign('ctr_ingredient_id')->references('id')->on('ctr_ingredients')->onDelete('cascade');
            $table->integer('ctr_group_id')->unsigned()->index();
            $table->foreign('ctr_group_id')->references('id')->on('ctr_groups')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ctr_ingredient_ctr_group');
    }
}
