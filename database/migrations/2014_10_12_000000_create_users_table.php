<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('wwid');
            $table->string('password')->default('');
            $table->string('name')->default('');
            $table->string('email')->default('');
            $table->integer('sex')->default(0);//1 男 2女
            $table->string('city')->default('');
            $table->string('icon')->default('');
            $table->integer('logins')->default(0);
            $table->datetime('last_login_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
