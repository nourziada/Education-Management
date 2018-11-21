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

            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('account_type');
            $table->string('user_name')->unique();
            $table->string('management')->nullable();
            $table->string('department')->nullable();
            $table->string('sefa');
            $table->string('mobile');
            $table->string('phone');
            $table->string('mail');
            $table->string('civil_registry');
            $table->string('admin')->default(2);
            $table->string('status')->default(0);

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
