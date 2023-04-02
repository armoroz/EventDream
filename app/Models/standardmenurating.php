<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class standardmenurating
 * @package App\Models
 * @version March 5, 2023, 2:09 pm UTC
 *
 * @property \App\Models\Standardmenu $standardmenuid
 * @property integer $rating
 * @property string $comment
 * @property integer $standardmenuid
 */
class standardmenurating extends Model
{


    public $table = 'standardmenurating';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'rating',
        'comment',
        'standardmenuid',
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
        'standardmenuid' => 'integer',
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
        'standardmenuid' => 'nullable|integer',
		'customerid' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function standardmenuid()
    {
        return $this->belongsTo(\App\Models\Standardmenu::class, 'standardmenuid');
    }
	
    public function customer()
    {
        return $this->belongsTo(\App\Models\Customer::class, 'customerid');
    }
	
}
