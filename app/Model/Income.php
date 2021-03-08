<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    public function member(){
        return $this->belongsTo('App\User','member_id','id');
    }
    protected $fillable = [
        'member_id','amount','date','income','description'
    ];
}
