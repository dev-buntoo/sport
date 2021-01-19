<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    public function member(){
        return $this->belongsTo('App\User','member_id','id');
    }
    public function record()
    {
        return $this->hasMany('App\Model\Payslip','payout_id','id');
    }
}
