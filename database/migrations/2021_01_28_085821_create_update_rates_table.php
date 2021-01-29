<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('update_rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('grade')->nullabe();
            $table->string('refree_rate')->nullabe();
            $table->string('touch_judge_rate')->nullabe();
            $table->string('coach_rate')->nullabe();

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
        Schema::dropIfExists('update_rates');
    }
}
