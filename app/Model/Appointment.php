<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $fillable = [
        'home_team', 'away_team', 'grade','referee','referee_rate','touch_judge_one','touch_judge_two','touch_judge_rate','coach','coach_rate','file_id'
    ];

}
