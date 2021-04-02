<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{

    protected $fillable = [
        'member_id',
        'date','gross_amount','deduction',
        'net_amount','bank_pay','bank_ref',
        'payment_date','description','is_view'
    ];


    public function member(){
        return $this->belongsTo('App\User','member_id','id');
    }
    public function record()
    {
        return $this->hasMany('App\Model\Payslip','payout_id','id');
    }
    public function payrun(){
        return $this->belongsTo('App\Model\Payrun','payrun_id','id');
    }
}
