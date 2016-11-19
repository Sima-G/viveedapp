<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterConferenceTableName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('settings', 'cnf_settings');
        Schema::rename('speakers', 'cnf_speakers');
        Schema::rename('sessions', 'cnf_sessions');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('cnf_settings', 'settings');
        Schema::rename('cnf_speakers', 'speakers');
        Schema::rename('cnf_sessions', 'sessions');
    }
}
