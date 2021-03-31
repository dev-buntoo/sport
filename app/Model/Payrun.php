<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payrun extends Model
{
    protected $fillable =['schedule','startDate','endDate','payrunDate'];

    public function record()
    {
        return $this->hasMany('App\Model\Payslip','payout_id','id');
    }

    public function payslip()
    {
        return $this->hasMany('App\Model\Payslip','payrun_id','id');
    }
}
