<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommitteePersonTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('committee_person', function (Blueprint $table) {
                $table->integer('person_id')->unsigned();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('committee_person');
    }
}
