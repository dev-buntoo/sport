<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    protected $guarded  = [];
    public function member(){
        return $this->hasOne('App\Member', 'id', 'member_id');
    }
}
