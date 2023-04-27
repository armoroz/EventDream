<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class eventproductlog
 * @package App\Models
 * @version February 7, 2023, 8:11 pm UTC
 *
 * @property \App\Models\Event $eventid
 * @property \App\Models\Product $productid
 * @property integer $eventproductquantity
 * @property integer $eventid
 * @property integer $productid
 * @property number $totalcost
 */
class eventproductlog extends Model
{


    public $table = 'eventproductlog';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'eventproductquantity',
        'eventid',
        'productid',
        'totalcost'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'eventproductquantity' => 'integer',
        'eventid' => 'integer',
        'productid' => 'integer',
        'totalcost' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'eventproductquantity' => 'nullable|integer',
        'eventid' => 'nullable|integer',
        'productid' => 'nullable|integer',
        'totalcost' => 'nullable|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function eventid()
    {
        return $this->belongsTo(\App\Models\event::class, 'eventid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(\App\Models\product::class, 'productid');
    }
	
}
