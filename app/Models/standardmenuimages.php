<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class standardmenuimages
 * @package App\Models
 * @version March 4, 2023, 8:04 pm UTC
 *
 * @property \App\Models\Standardmenu $standardmenuid
 * @property integer $standardmenuid
 * @property string $imagefile
 */
class standardmenuimages extends Model
{


    public $table = 'standardmenuimages';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'standardmenuid',
        'imagefile'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'standardmenuid' => 'integer',
        'imagefile' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'standardmenuid' => 'nullable|integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function standardmenuid()
    {
        return $this->belongsTo(\App\Models\standardmenu::class, 'standardmenuid');
    }
}
