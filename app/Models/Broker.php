<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

use App\Notifications\PialangsResetPasswordNotification;

class Broker extends Authenticatable
{
    use Notifiable;
    use HasApiTokens, Notifiable;
    
    protected $table = "broker";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'broker_code', 'username', 'name', 'password', 'activation_key', 'spa_id', 'multi_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    //Send password reset notification
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PialangsResetPasswordNotification($token));
    }

    public function usernya()
    {
        return $this->hasMany('App\Models\User');
    }

    public function isNotActivated()
    {
        return $this->activation_key ? true : false;
    }

    public function groupsbroker()
    {
        return $this->belongsTo('App\Models\GroupsCommunity');
    }


    public function brokeruser()
    {
        return $this->belongsTo('App\Models\Community');
    }
}
