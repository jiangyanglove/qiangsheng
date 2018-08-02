<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreetalksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freetalks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('type')->default('photo');//photo 照片 plan 行动计划
            $table->string('photos')->default('');
            $table->string('letter_plan_ids')->default('');
            $table->text('content')->nullable();
            $table->integer('enabled')->default(1);
            $table->integer('likes')->default(0);
            $table->integer('comments')->default(0);
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
        Schema::dropIfExists('freetalks');
    }
}
