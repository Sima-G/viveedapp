<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtrGroupCtCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('ctr_group_ct_category');

        Schema::create('ctr_group_ct_category', function (Blueprint $table) {
            $table->integer('ctr_group_id')->unsigned()->index();
            $table->foreign('ctr_group_id')->references('id')->on('ctr_groups')->onDelete('cascade');
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
        Schema::drop('ctr_group_ct_category');
    }
}
