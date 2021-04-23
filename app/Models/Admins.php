<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Notifications\AdminsResetPasswordNotification;


class Admins extends Authenticatable
{

    use Notifiable;

protected $table = "admins"; 
    protected $fillable = [
        'name', 'email', 'password','status','departements_id','suspend','level','remember_token'
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
      $this->notify(new AdminsResetPasswordNotification($token));
  }
  
                  public function divisinya()
    {
return $this->hasOne('App\Models\Departements','id','departements_id');
    }
	
	
    
}
