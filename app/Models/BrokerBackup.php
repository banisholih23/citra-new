<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class BrokerBackup extends Model
{

    protected $table = 'broker_backup'; 
    protected $fillable = array('id','broker_code','username','name', 'password','activation_key','spa_id','multi_id', 'password', 'remember_token','created_at','updated_at');
    public $timestamps = false;
    
}
