<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationalPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operational_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('plane_type');
            $table->string('school_name')->nullable();
            $table->string('strategic_goal');
            $table->string('strategic_indicators');
            $table->string('associated_title');
            $table->text('detailed_objectives');
            $table->text('detailed_indicators');
            $table->string('initiative_title');
            $table->string('plane_title');
            $table->text('requirements');
            $table->text('targeted');
            $table->string('ad_execution_time_from');
            $table->string('ad_execution_time_to');
            $table->string('hijri_execution_time_from');
            $table->string('hijri_execution_time_to');
            $table->text('place');
            $table->string('main_implementing');
            $table->text('sub_implementing');
            $table->string('cost');
            $table->string('ministerial_number');
            $table->string('strategic_number');
            $table->string('detailed_number');

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
        Schema::dropIfExists('operational_plans');
    }
}
