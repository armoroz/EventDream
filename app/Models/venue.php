<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class venue
 * @package App\Models
 * @version February 8, 2023, 11:22 pm UTC
 *
 * @property \App\Models\User $userid
 * @property \Illuminate\Database\Eloquent\Collection $bookings
 * @property \Illuminate\Database\Eloquent\Collection $events
 * @property string $venuename
 * @property string $addressline1
 * @property string $addressline2
 * @property string $city
 * @property string $eircode
 * @property integer $humancapacity
 * @property number $costtorent
 * @property integer $userid
 */
class venue extends Model
{


    public $table = 'venue';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'venuename',
        'addressline1',
        'addressline2',
        'city',
        'eircode',
        'humancapacity',
        'costtorent',
        'userid'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'venuename' => 'string',
        'addressline1' => 'string',
        'addressline2' => 'string',
        'city' => 'string',
        'eircode' => 'string',
        'humancapacity' => 'integer',
        'costtorent' => 'decimal:2',
        'userid' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'venuename' => 'nullable|string|max:40',
        'addressline1' => 'nullable|string|max:40',
        'addressline2' => 'nullable|string|max:40',
        'city' => 'nullable|string|max:25',
        'eircode' => 'nullable|string|max:7',
        'humancapacity' => 'nullable|integer',
        'costtorent' => 'nullable|numeric',
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
        return $this->hasMany(\App\Models\Booking::class, 'venueid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function events()
    {
        return $this->hasMany(\App\Models\Event::class, 'venueid');
    }
}
