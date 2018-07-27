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
            $table->boolean('is_admin')->default(0);

            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('password');

            $table->string('slackURL')->default('#');

            $table->string('company');
            $table->string('domain')->unique();

            $table->integer('balance')->default(0);
            $table->string('plan');

            $table->rememberToken();
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
