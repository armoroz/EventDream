<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Model as Model; 

class Appointment extends Model 
{ 
    public $table = 'appointments'; 
    public $timestamps = false; 
    protected $casts = [ 
        'id' => 'integer', 
        'title' => 'string', 
        'start' => 'string', 
        'end' => 'string', 
        'venue' => 'string' 
    ]; 
	
} 