<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Model as Model; 

class Venueevent extends Model 
{ 
    public $table = 'venueevents'; 
    public $timestamps = false; 
    protected $casts = [ 
        'id' => 'integer', 
        'title' => 'string', 
        'date' => 'string', 
        'venueid' => 'integer' 
    ]; 
	
}  