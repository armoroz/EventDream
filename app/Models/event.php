<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class event
 * @package App\Models
 * @version February 8, 2023, 11:39 am UTC
 *
 * @property \App\Models\Venue $venueid
 * @property \App\Models\Customer $customerid
 * @property \App\Models\User $userid
 * @property \App\Models\Standardmenu $standardmenuid
 * @property \App\Models\Custommenu $custommenuid
 * @property \App\Models\Delivery $deliveryid
 * @property \Illuminate\Database\Eloquent\Collection $eventproductlogs
 * @property string $eventdate
 * @property time $eventtime
 * @property string|\Carbon\Carbon $orderplacedon
 * @property number $eventordertotal
 * @property integer $eventdiscount
 * @property integer $venueid
 * @property integer $customerid
 * @property integer $userid
 * @property integer $standardmenuid
 * @property integer $custommenuid
 */
class event extends Model
{


    public $table = 'event';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'eventdate',
        'eventtime',
        'orderplacedon',
        'eventordertotal',
        'eventdiscount',
        'venueid',
        'customerid',
        'userid',
        'standardmenuid',
        'custommenuid'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'eventdate' => 'date',
        'orderplacedon' => 'datetime',
        'eventordertotal' => 'decimal:2',
        'eventdiscount' => 'integer',
        'venueid' => 'integer',
        'customerid' => 'integer',
        'userid' => 'integer',
        'standardmenuid' => 'integer',
        'custommenuid' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'eventdate' => 'nullable',
        'eventtime' => 'nullable',
        'orderplacedon' => 'nullable',
        'eventordertotal' => 'nullable|numeric',
        'eventdiscount' => 'nullable|integer',
        'venueid' => 'nullable|integer',
        'customerid' => 'nullable|integer',
        'userid' => 'nullable|integer',
        'standardmenuid' => 'nullable|integer',
        'custommenuid' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function venueid()
    {
        return $this->belongsTo(\App\Models\venue::class, 'venueid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function customerid()
    {
        return $this->belongsTo(\App\Models\customer::class, 'customerid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userid()
    {
        return $this->belongsTo(\App\Models\User::class, 'userid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function standardmenuid()
    {
        return $this->belongsTo(\App\Models\standardmenu::class, 'standardmenuid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function custommenuid()
    {
        return $this->belongsTo(\App\Models\custommenu::class, 'custommenuid');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function eventproductlogs()
    {
        return $this->hasMany(\App\Models\eventproductlog::class, 'eventid');
    }
}
