<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionSpeakerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_speaker', function (Blueprint $table) {
            $table->integer('session_id')->unsigned()->index();
            $table->foreign('session_id')->references('id')->on('session')->onDelete('cascade');
            $table->integer('speaker_id')->unsigned()->index();
            $table->foreign('speaker_id')->references('id')->on('speaker')->onDelete('cascade');
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
        Schema::drop('session_speaker');
    }
}
