<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Contracts\Auditable;

class Member extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'users';

    public function income()
    {
        return $this->hasMany('App\Model\Income','member_id','id');
    }
    public function expense()
    {
        return $this->hasMany('App\Model\Expense','member_id','id');
    }
    public function roles()
    {
        return $this->belongsTo('App\Model\Role','role_id','id');
    }

    protected $fillable = [
        'name', 'email', 'password','fname','mname','lname','date_of_birth','phone_1','phone_2','email_1','email_2',
        'gender','address','acc_name','acc_number','bank_name','bsb_number','tfn_number','payment_frequency','member_number','status','role','life_member','date_of_joining','referre_level','coach_level','wwcc_number','wwcc_expiry','photo',
        'is_member','role_id'
    ];

    protected $dates = [

        'email_verified_at',
        'two_factor_expires_at',
    ];

}
