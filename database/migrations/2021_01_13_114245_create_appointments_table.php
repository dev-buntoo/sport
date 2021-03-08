<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('home_team')->nullable();
            $table->string('away_team')->nullable();
            $table->string('grade')->nullable();
            $table->string('referee')->nullable();
            $table->string('referee_rate')->nullable();
            $table->string('touch_judge_one')->nullable();
            $table->string('touch_judge_two')->nullable();
            $table->string('touch_judge_rate')->nullable();
            $table->string('coach')->nullable();
            $table->string('coach_rate')->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
