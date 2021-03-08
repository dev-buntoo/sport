<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class log extends Model
{
    //
    public function first_member(){
        return $this->belongsTo('App\User','id','member_one');
    }
    public function second_member(){
        return $this->belongsTo('App\User','id','member_two');
    }
}
