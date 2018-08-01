<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->default('');
            $table->integer('sex')->default(0);
            $table->text('title')->nullable();
            $table->text('title_en')->nullable();
            $table->text('explanations')->nullable();
            $table->text('explanations_en')->nullable();
            $table->text('when_at_work')->nullable();
            $table->text('when_at_work_en')->nullable();
            $table->string('hero_name')->default('');
            $table->string('hero_name_en')->default('');
            $table->text('hero_desc')->nullable();
            $table->text('hero_desc_en')->nullable();
            $table->string('icon')->default('');
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
        Schema::dropIfExists('heroes');
    }
}
