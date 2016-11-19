<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterConferenceRelationTableColumnNames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cnf_session_cnf_speaker', function($table)
        {
            $table->renameColumn('session_id', 'cnf_session_id');
            $table->renameColumn('speaker_id', 'cnf_speaker_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cnf_session_cnf_speaker', function($table)
        {
            $table->renameColumn('cnf_session_id', 'session_id');
            $table->renameColumn('cnf_speaker_id', 'speaker_id');
        });
    }
}
