<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('operational_plan_id');
            $table->text('strong');
            $table->text('week');
            $table->text('opportunities');
            $table->text('threats');

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
        Schema::dropIfExists('swats');
    }
}
