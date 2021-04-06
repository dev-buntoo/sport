<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class log extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
//    public function second_member(){
//        return $this->belongsTo('App\User','id','member_two');
//    }
    protected $guarded = [];
}
