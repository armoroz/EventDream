<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class product
 * @package App\Models
 * @version January 27, 2023, 4:57 pm UTC
 *
 * @property \App\Models\User $userid
 * @property \Illuminate\Database\Eloquent\Collection $bookings
 * @property \Illuminate\Database\Eloquent\Collection $eventproductlogs
 * @property string $productname
 * @property string $producttype
 * @property string $productdesc
 * @property number $productcost
 * @property string $productlocation
 * @property integer $productquantity
 * @property string $productimglink
 * @property string|\Carbon\Carbon $prodaddedon
 * @property string|\Carbon\Carbon $produpdatedon
 * @property string|\Carbon\Carbon $proddeletedon
 * @property integer $userid
 */
class product extends Model
{


    public $table = 'product';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'productname',
        'producttype',
        'productdesc',
        'productcost',
        'productlocation',
        'productquantity',
        'productimglink',
        'prodaddedon',
        'produpdatedon',
        'proddeletedon',
        'userid'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'productname' => 'string',
        'producttype' => 'string',
        'productdesc' => 'string',
        'productcost' => 'decimal:2',
        'productlocation' => 'string',
        'productquantity' => 'integer',
        'productimglink' => 'string',
        'prodaddedon' => 'datetime',
        'produpdatedon' => 'datetime',
        'proddeletedon' => 'datetime',
        'userid' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'productname' => 'nullable|string|max:15',
        'producttype' => 'nullable|string|max:15',
        'productdesc' => 'nullable|string',
        'productcost' => 'nullable|numeric',
        'productlocation' => 'nullable|string|max:30',
        'productquantity' => 'nullable|integer',
        'productimglink' => 'nullable|string|max:50',
        'prodaddedon' => 'nullable',
        'produpdatedon' => 'nullable',
        'proddeletedon' => 'nullable',
        'userid' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userid()
    {
        return $this->belongsTo(\App\Models\User::class, 'userid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class, 'productid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function eventproductlogs()
    {
        return $this->hasMany(\App\Models\Eventproductlog::class, 'productid');
    }
}
