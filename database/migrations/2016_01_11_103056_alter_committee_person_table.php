<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCommitteePersonTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('committee_person', function (Blueprint $table) {
            $table->integer('committee_id')->unsigned();
            $table->primary(['committee_id', 'person_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('committee_person', function (Blueprint $table) {
            //
        });
    }
}
