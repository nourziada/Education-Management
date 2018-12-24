<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStrategicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strategics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('strategic_goal',500);
            $table->string('initiatives',500);
            $table->string('target',500);
            $table->string('responsible_management',500);
            $table->string('responsible_department');
            $table->string('measurement',500);
            $table->string('management');
            $table->string('department');


            $table->string('department_initiatives',500);
            $table->string('performance_index',500);
            $table->string('executing_agency',255);
            $table->string('supporting_body',255);


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
        Schema::dropIfExists('strategics');
    }
}
