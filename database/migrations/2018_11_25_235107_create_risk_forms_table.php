<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiskFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risk_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('type');
            $table->string('name',255);
            $table->text('description');
            $table->string('level');
            $table->text('protection');
            $table->string('effect');
            $table->text('responsible');
            $table->text('treatment');
            $table->text('end');

            $table->string('management');
            $table->string('department');

            $table->string('is_confirmed')->default(0);
            $table->string('is_deleted')->default(0);
            $table->string('status')->default(1);
            
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
        Schema::dropIfExists('risk_forms');
    }
}
