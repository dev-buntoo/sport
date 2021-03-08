<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UpdateRate extends Model
{
    //
    protected $fillable= ['grade','refree_rate','touch_judge_rate','coach_rate'];
}
