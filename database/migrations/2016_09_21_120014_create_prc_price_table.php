<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrcPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prc_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('catalogue')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->decimal('discount', 8, 2)->nullable();
            $table->tinyInteger('init')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('state')->nullable();
            $table->softDeletes();
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
        Schema::drop('prc_products');
    }
}
