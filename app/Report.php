<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    public $primaryKey = 'report_id';
    protected $fillable = [
        'member_id', 'date', 'home_team', 'away_team', 'home_penalties', 'away_penalties', 'home_score', 'away_score', 'grade_division', 'overall_grade', 'signals_note', 'wistla_tone_grade', 'c_c_signal_grade', 'presentation_grade', 'pre_match_duties_grade', 'game_law_note', 'application_grade', 'scrum_grade', 'process_grade', 'advantage_grade', 'understandig_note', 'ruck_communication_grade', 'penalty_grade', 'effective_caution_grade', 'movement_patterns_grade', 'marker_ruck_note', 'ten_m_grade', 'ten_m_complaince_grade', 'marker_complaince_grade', 'ruck_speed_grade', 'communication_note', 'ruck_vocab_grade', 'tackle_grade', 'player_rapport_grade', 'communication_timming_grade', 'positioning_note', 'ten_m_position_grade', 'in_goal_grade', 'start_restart_grade', 'kicks_breaks_grade', 'coach_comments', 'overall_assesment', 'final_comments', 'file_name',
    ];
    //relation with member
    public function member(){
        return $this->hasOne('App\Member', 'id', 'member_id');
    }
}
