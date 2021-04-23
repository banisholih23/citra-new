<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notification;
use App\Notifications\CommunityResetPassword as ResetPasswordNotification;

class Community extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 protected $table = "community"; 
    protected $fillable = [
        'broker_id','name', 'email', 'password', 'phone','address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function sendPasswordResetNotification($token)
{
    $this->notify(new ResetPasswordNotification($token));
}

                  public function userbrokernya()
    {
return $this->hasOne('App\Models\Broker','id','broker_id');
    }
	
	
	
    
}
