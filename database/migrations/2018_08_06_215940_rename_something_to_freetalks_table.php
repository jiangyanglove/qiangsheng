<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameSomethingToFreetalksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('freetalks', function (Blueprint $table) {
            $table->renameColumn('letter_plan_ids', 'letter_id');
        });

        Schema::table('letters', function (Blueprint $table) {
            $table->renameColumn('contents', 'content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
