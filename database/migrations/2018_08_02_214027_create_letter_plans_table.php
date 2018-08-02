<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLetterPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letter_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('letter_id');
            $table->text('what')->nullable();
            $table->text('how')->nullable();
            $table->text('when')->nullable();
            $table->integer('enabled')->default(1);
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
        Schema::dropIfExists('letter_plans');
    }
}
