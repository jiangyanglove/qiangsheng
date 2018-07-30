<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeeknoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weeknotices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('week');
            $table->string('name');
            $table->string('name_en');
            $table->string('start_date');
            $table->text('content')->nullable();
            $table->text('content_en')->nullable();
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
        Schema::dropIfExists('weeknotices');
    }
}
