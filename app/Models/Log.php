<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Log extends Model
{

    protected $table = 'log'; 
    protected $primaryKey = 'id';
    protected $fillable = array('email', 'table_action','action', 'data');
    public $timestamps = true;
    
}
