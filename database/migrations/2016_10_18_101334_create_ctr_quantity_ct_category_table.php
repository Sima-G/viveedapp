<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtrQuantityCtCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::dropIfExists('ctr_quantity_ct_category');

        Schema::create('ctr_quantity_ct_category', function (Blueprint $table) {
            $table->integer('ctr_quantity_id')->unsigned()->index();
            $table->foreign('ctr_quantity_id')->references('id')->on('ctr_quantities')->onDelete('cascade');
            $table->integer('ct_category_id')->unsigned()->index();
            $table->foreign('ct_category_id')->references('id')->on('ct_categories')->onDelete('cascade');
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
        Schema::drop('ctr_quantity_ct_category');
    }
}
