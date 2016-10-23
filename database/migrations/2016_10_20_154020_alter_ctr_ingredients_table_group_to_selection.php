<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCtrIngredientsTableGroupToSelection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ctr_ingredients', function($table)
        {
            $table->renameColumn('group', 'selection');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ctr_ingredients', function($table)
        {
            $table->renameColumn('selection', 'group');
        });
    }
}
