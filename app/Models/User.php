<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;

    use HasApiTokens, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['broker_id', 'username', 'password', 'spa_id', 'multi_id', 'activation_key'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function brokernya()
    {
        return $this->belongsTo('App\Models\Broker');
    }
}
