<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Draft extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drafts', function (Blueprint $table) {
        $table->bigIncrements('report_id');
        $table->unsignedBigInteger('member_id');
        $table->string('format')->nullable();
        $table->string('coach')->nullable();
        $table->date('date')->nullable();
        $table->string('home_team')->nullable();
        $table->text('away_team')->nullable();
        $table->string('home_penalties')->nullable();
        $table->string('away_penalties')->nullable();
        $table->string('home_score')->nullable();
        $table->string('away_score')->nullable();
        $table->string('grade_division')->nullable();
        $table->string('overall_grade')->nullable();
        $table->text('signals_note')->nullable();
        $table->string('wistla_tone_grade')->nullable();
        $table->string('c_c_signal_grade')->nullable();
        $table->string('presentation_grade')->nullable();
        $table->string('pre_match_duties_grade')->nullable();
        $table->text('game_law_note')->nullable();
        $table->string('application_grade')->nullable();
        $table->string('scrum_grade')->nullable();
        $table->string('process_grade')->nullable();
        $table->string('advantage_grade')->nullable();
        $table->text('understandig_note')->nullable();
        $table->string('ruck_communication_grade')->nullable();
        $table->string('penalty_grade')->nullable();
        $table->string('effective_caution_grade')->nullable();
        $table->string('movement_patterns_grade')->nullable();
        $table->text('marker_ruck_note')->nullable();
        $table->string('ten_m_grade')->nullable();
        $table->string('ten_m_complaince_grade')->nullable();
        $table->string('marker_complaince_grade')->nullable();
        $table->string('ruck_speed_grade')->nullable();
        $table->text('communication_note')->nullable();
        $table->string('ruck_vocab_grade')->nullable();
        $table->string('tackle_grade')->nullable();
        $table->string('player_rapport_grade')->nullable();
        $table->string('communication_timming_grade')->nullable();
        $table->text('positioning_note')->nullable();
        $table->string('ten_m_position_grade')->nullable();
        $table->string('in_goal_grade')->nullable();
        $table->string('start_restart_grade')->nullable();
        $table->string('kicks_breaks_grade')->nullable();
        $table->text('coach_comments')->nullable();
        $table->text('overall_assesment')->nullable();
        $table->text('final_comments')->nullable();
        $table->text('file_name')->nullable();
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
    }
}
