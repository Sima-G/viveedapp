<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtrProductCtrQuantityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('ctr_product_ctr_quantity');

        Schema::create('ctr_product_ctr_quantity', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ctr_product_id')->unsigned()->index();
            $table->foreign('ctr_product_id')->references('id')->on('ctr_products')->onDelete('cascade');
            $table->integer('ctr_quantity_id')->unsigned()->index();
            $table->foreign('ctr_quantity_id')->references('id')->on('ctr_quantities')->onDelete('cascade');
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
        Schema::drop('ctr_ingredient_ctr_group');
    }
}
