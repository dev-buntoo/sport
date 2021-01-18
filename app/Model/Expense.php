<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function member(){
        return $this->belongsTo('App\User','id','member_id');
    }
    protected $fillable = [
        'member_id','amount','date','expense','description'
    ];
}
