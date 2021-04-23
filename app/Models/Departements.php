<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Departements extends Model
{

    protected $table = 'departements'; 
    protected $primaryKey = 'id';
    protected $fillable = array('name','email');
    public $timestamps = true;
	
	       public function divisiusers()
    {
return $this->belongsTo('App\Models\Admins');
    }
    
}
