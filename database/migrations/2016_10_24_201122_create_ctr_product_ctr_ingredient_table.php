<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtrProductCtrIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('ctr_product_ctr_ingredient');

        Schema::create('ctr_product_ctr_ingredient', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ctr_product_id')->unsigned()->index();
            $table->foreign('ctr_product_id')->references('id')->on('ctr_products')->onDelete('cascade');
            $table->integer('ctr_ingredient_id')->unsigned()->index();
            $table->foreign('ctr_ingredient_id')->references('id')->on('ctr_ingredients')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->text('quantity')->nullable();
            $table->tinyInteger('status');
            $table->tinyInteger('state');
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
        Schema::drop('ctr_product_ctr_ingredient');
    }
}
