<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImportData extends Model
{
    //
    protected $fillable = [
            'uploadedBy','filename','linkname','year','round','is_added'
    ];

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User','uploadedBy','id');
    }

    public function list()
    {
        return $this->hasMany('App\Model\Appointment','file_id','id');
    }

}
