<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class venuerating
 * @package App\Models
 * @version February 9, 2023, 11:00 pm UTC
 *
 * @property \App\Models\Venue $venueid
 * @property integer $rating
 * @property string $comment
 * @property integer $venueid
 */
class venuerating extends Model
{


    public $table = 'venuerating';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'rating',
        'comment',
        'venueid',
		'customerid'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'rating' => 'integer',
        'comment' => 'string',
        'venueid' => 'integer',
		'customerid' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'rating' => 'nullable|integer',
        'comment' => 'nullable|string',
        'venueid' => 'nullable|integer',
		'customerid' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function venueid()
    {
        return $this->belongsTo(\App\Models\Venue::class, 'venueid');
    }
	
	public function customer()
	{
		return $this->belongsTo(\App\Models\Customer::class, 'customerid');
	}
	
}
