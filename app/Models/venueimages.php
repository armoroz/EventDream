<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class venueimages
 * @package App\Models
 * @version February 27, 2023, 5:08 pm UTC
 *
 * @property \App\Models\Venue $venueid
 * @property integer $venueid
 * @property string $imagefile
 */
class venueimages extends Model
{


    public $table = 'venueimages';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'venueid',
        'imagefile'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'venueid' => 'integer',
        'imagefile' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'venueid' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function venueid()
    {
        return $this->belongsTo(\App\Models\venue::class, 'venueid');
    }
}
