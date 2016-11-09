<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPrcProductTableAddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::dropIfExists('prc_products');

        Schema::create('prc_products', function(Blueprint $table)
        {
            /*$table->integer('product')->unsigned()->index()->change();
            $table->integer('quantity')->unsigned()->index()->change();
            $table->integer('catalogue')->unsigned()->index()->change();
            $table->foreign('product')->references('id')->on('ctr_products')->onDelete('cascade');
            $table->foreign('quantity')->references('id')->on('ctr_quantities')->onDelete('cascade');
            $table->foreign('catalogue')->references('id')->on('prc_catalogues')->onDelete('cascade');*/

            $table->increments('id');
            $table->integer('product')->unsigned()->index();
            $table->integer('quantity')->unsigned()->index();
            $table->integer('catalogue')->unsigned()->index();
            $table->foreign('product')->references('id')->on('ctr_products')->onDelete('cascade');
            $table->foreign('quantity')->references('id')->on('ctr_quantities')->onDelete('cascade');
            $table->foreign('catalogue')->references('id')->on('prc_catalogues')->onDelete('cascade');
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

        /*Schema::table('prc_products', function(Blueprint $table)
        {
            $table->dropForeign('product');
            $table->dropForeign('quantity');
            $table->dropForeign('catalogue');
            $table->integer('product')->nullable()->change();
            $table->integer('quantity')->nullable()->change();
            $table->integer('catalogue')->nullable()->change();
        });*/
    }
}
