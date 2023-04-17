<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class custommenulog
 * @package App\Models
 * @version March 1, 2023, 11:32 pm UTC
 *
 * @property \App\Models\Menuitem $menuitemid
 * @property \App\Models\Custommenu $custommenuid
 * @property integer $menuitemid
 * @property integer $custommenuid
 */
class custommenulog extends Model
{


    public $table = 'custommenulog';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'menuitemid',
        'custommenuid'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'menuitemid' => 'integer',
        'custommenuid' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'menuitemid' => 'nullable|integer',
        'custommenuid' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function menuitemid()
    {
        return $this->belongsTo(\App\Models\menuitem::class, 'menuitemid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function custommenuid()
    {
        return $this->belongsTo(\App\Models\custommenu::class, 'custommenuid');
    }
}
