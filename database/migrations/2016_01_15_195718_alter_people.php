<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPeople extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('people', function (Blueprint $table) {
            $table->timestamps();
            if (!Schema::hasColumn('people', 'first_name')) {
                $table->string('first_name');
            }
            if (!Schema::hasColumn('people', 'last_name')) {
                $table->string('last_name');
            }
            if (!Schema::hasColumn('people', 'email')) {
                $table->string('email');
            }
            if (!Schema::hasColumn('people', 'occupation')) {
                $table->string('occupation');
            }
            if (!Schema::hasColumn('people', 'resume')) {
                $table->string('resume');
            }
            if (!Schema::hasColumn('people', 'room')) {
                $table->string('room');
            }
            if (!Schema::hasColumn('people', 'img')) {
                $table->string('img');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('people', function (Blueprint $table) {
            //
        });
    }
}
