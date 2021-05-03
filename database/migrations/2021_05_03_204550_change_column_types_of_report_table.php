<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnTypesOfReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->string('format')->nullable()->change();
            $table->string('coach')->nullable()->change();
            $table->date('date')->nullable()->change();
            $table->string('home_team')->nullable()->change();
            $table->text('away_team')->nullable()->change();
            $table->string('home_penalties')->nullable()->change();
            $table->string('away_penalties')->nullable()->change();
            $table->string('home_score')->nullable()->change();
            $table->string('away_score')->nullable()->change();
            $table->string('grade_division')->nullable()->change();
            $table->string('overall_grade')->nullable()->change();
            $table->text('signals_note')->nullable()->change();
            $table->string('wistla_tone_grade')->nullable()->change();
            $table->string('c_c_signal_grade')->nullable()->change();
            $table->string('presentation_grade')->nullable()->change();
            $table->string('pre_match_duties_grade')->nullable()->change();
            $table->text('game_law_note')->nullable()->change();
            $table->string('application_grade')->nullable()->change();
            $table->string('scrum_grade')->nullable()->change();
            $table->string('process_grade')->nullable()->change();
            $table->string('advantage_grade')->nullable()->change();
            $table->text('understandig_note')->nullable()->change();
            $table->string('ruck_communication_grade')->nullable()->change();
            $table->string('penalty_grade')->nullable()->change();
            $table->string('effective_caution_grade')->nullable()->change();
            $table->string('movement_patterns_grade')->nullable()->change();
            $table->text('marker_ruck_note')->nullable()->change();
            $table->string('ten_m_grade')->nullable()->change();
            $table->string('ten_m_complaince_grade')->nullable()->change();
            $table->string('marker_complaince_grade')->nullable()->change();
            $table->string('ruck_speed_grade')->nullable()->change();
            $table->text('communication_note')->nullable()->change();
            $table->string('ruck_vocab_grade')->nullable()->change();
            $table->string('tackle_grade')->nullable()->change();
            $table->string('player_rapport_grade')->nullable()->change();
            $table->string('communication_timming_grade')->nullable()->change();
            $table->text('positioning_note')->nullable()->change();
            $table->string('ten_m_position_grade')->nullable()->change();
            $table->string('in_goal_grade')->nullable()->change();
            $table->string('start_restart_grade')->nullable()->change();
            $table->string('kicks_breaks_grade')->nullable()->change();
            $table->text('coach_comments')->nullable()->change();
            $table->text('overall_assesment')->nullable()->change();
            $table->text('final_comments')->nullable()->change();
            $table->text('file_name')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reports', function (Blueprint $table) {
            //
        });
    }
}
