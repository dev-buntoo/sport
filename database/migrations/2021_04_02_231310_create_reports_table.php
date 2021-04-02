<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('report_id');
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('format');
            $table->string('coach');
            $table->date('date');
            $table->string('home_team');
            $table->text('away_team');
            $table->string('home_penalties');
            $table->string('away_penalties');
            $table->string('home_score');
            $table->string('away_score');
            $table->string('grade_division');
            $table->string('overall_grade');
            $table->text('signals_note');
            $table->string('wistla_tone_grade');
            $table->string('c_c_signal_grade');
            $table->string('presentation_grade');
            $table->string('pre_match_duties_grade');
            $table->text('game_law_note');
            $table->string('application_grade');
            $table->string('scrum_grade');
            $table->string('process_grade');
            $table->string('advantage_grade');
            $table->text('understandig_note');
            $table->string('ruck_communication_grade');
            $table->string('penalty_grade');
            $table->string('effective_caution_grade');
            $table->string('movement_patterns_grade');
            $table->text('marker_ruck_note');
            $table->string('ten_m_grade');
            $table->string('ten_m_complaince_grade');
            $table->string('marker_complaince_grade');
            $table->string('ruck_speed_grade');
            $table->text('communication_note');
            $table->string('ruck_vocab_grade');
            $table->string('tackle_grade');
            $table->string('player_rapport_grade');
            $table->string('communication_timming_grade');
            $table->text('positioning_note');
            $table->string('ten_m_position_grade');
            $table->string('in_goal_grade');
            $table->string('start_restart_grade');
            $table->string('kicks_breaks_grade');
            $table->text('coach_comments');
            $table->text('overall_assesment');
            $table->text('final_comments');
            $table->text('file_name');
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
        Schema::dropIfExists('reports');
    }
}
