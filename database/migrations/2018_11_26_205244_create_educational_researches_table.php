<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationalResearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_researches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('name',255);
            $table->string('id_number',255);
            $table->string('work',255);
            $table->string('mobile');
            $table->string('email');
            $table->string('qualification');
            $table->string('uni',255);
            $table->string('college',255);
            $table->string('specialization',255);

            $table->string('search_title',255);
            $table->string('search_goal',255);
            $table->string('chapter_date');
            $table->string('targets',255);
            $table->string('authority',255);
            $table->string('authority_address',255);
            $table->string('target',255);
            $table->string('search_tool',255);
            $table->string('search_tools',255);
            $table->string('letter_approval',255);

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
        Schema::dropIfExists('educational_researches');
    }
}
