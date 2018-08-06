<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_styles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('photos')->default('');
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
        Schema::dropIfExists('work_styles');
    }
}
