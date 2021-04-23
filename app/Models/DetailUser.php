<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class DetailUser extends Model
{

    protected $table = 'departements'; 
    protected $primaryKey = 'id';
    protected $fillable = array('broker_code','name','username','spa_id','multi_id','activation_key','created_at');
    public $timestamps = false;
	
 
    
}
