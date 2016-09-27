<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtInquantitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_inquantities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ingredient');
            $table->text('quantity')->nullable();
            $table->tinyInteger('unique')->nullable();
            $table->tinyInteger('status');
            $table->tinyInteger('state');
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
        Schema::drop('ct_inquantities');
    }
}
