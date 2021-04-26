<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable implements Auditable
{
    use Notifiable;
    use \OwenIt\Auditing\Auditable;

    public function payrols()
    {
        return $this->hasMany('App\Model\Payout','member_id','id');
    }
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
    public function isOnline()
{
    return (Cache::has('user-is-online-' .$this->id))?'online':'offline';
}
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','fname','mname','lname','date_of_birth','phone_1','phone_2','email_1','email_2',
        'gender','address','acc_name','acc_number','bank_name','bsb_number','tfn_number','payment_frequency','member_number','status','role','life_member','date_of_joining','referre_level','coach_level','wwcc_number','wwcc_expiry','photo',
        'is_member','role_id'
    ];

    protected $dates = [

        'email_verified_at',
        'two_factor_expires_at',
    ];

    public function generateTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = rand(100000, 999999);
        $this->two_factor_expires_at = now()->addMinutes(10);
        $this->save();
    }

    public function resetTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
