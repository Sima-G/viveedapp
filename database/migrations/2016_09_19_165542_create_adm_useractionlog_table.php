<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmUseractionlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adm_useractionlog', function (Blueprint $table) {
            $table->increments('id');
            $table->text('module')->nullable();
            $table->text('table')->nullable();
            $table->integer('action_id')->nullable();
            $table->text('action')->nullable();
            $table->integer('user')->nullable();
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
        Schema::drop('adm_useractionlog');
    }
}
