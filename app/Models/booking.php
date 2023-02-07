<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class booking
 * @package App\Models
 * @version February 7, 2023, 10:54 pm UTC
 *
 * @property \App\Models\Product $productid
 * @property \App\Models\Venue $venueid
 * @property integer $bookedprodquantity
 * @property string $bookeddate
 * @property time $bookedtime
 * @property integer $productid
 * @property integer $venueid
 */
class booking extends Model
{


    public $table = 'booking';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'bookedprodquantity',
        'bookeddate',
        'bookedtime',
        'productid',
        'venueid'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'bookedprodquantity' => 'integer',
        'bookeddate' => 'date',
        'productid' => 'integer',
        'venueid' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'bookedprodquantity' => 'nullable|integer',
        'bookeddate' => 'nullable',
        'bookedtime' => 'nullable',
        'productid' => 'nullable|integer',
        'venueid' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function productid()
    {
        return $this->belongsTo(\App\Models\Product::class, 'productid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function venueid()
    {
        return $this->belongsTo(\App\Models\Venue::class, 'venueid');
    }
}
