<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtIngroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_ingroups', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('selection');
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
        Schema::drop('ct_ingroups');
    }
}
