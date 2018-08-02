<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreetalkCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freetalk_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("freetalk_id");
            $table->integer("user_id");
            $table->text("content");
            $table->integer("parent")->default(0);
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
        Schema::dropIfExists('freetalk_comments');
    }
}
