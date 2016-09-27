<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCtInquantitiesTableAddProductColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ct_inquantities', function(Blueprint $table)
        {
            $table->integer('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ct_inquantities', function(Blueprint $table)
        {
            // delete above columns
            $table->dropColumn('product');
        });
    }
}
