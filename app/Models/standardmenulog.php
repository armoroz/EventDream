<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class standardmenulog
 * @package App\Models
 * @version March 1, 2023, 11:30 pm UTC
 *
 * @property \App\Models\Menuitem $menuitemid
 * @property \App\Models\Standardmenu $standardmenuid
 * @property integer $menuitemid
 * @property integer $standardmenuid
 */
class standardmenulog extends Model
{


    public $table = 'standardmenulog';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'menuitemid',
        'standardmenuid'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'menuitemid' => 'integer',
        'standardmenuid' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'menuitemid' => 'nullable|integer',
        'standardmenuid' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function menuitemid()
    {
        return $this->belongsTo(\App\Models\Menuitem::class, 'menuitemid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function standardmenuid()
    {
        return $this->belongsTo(\App\Models\Standardmenu::class, 'standardmenuid');
    }
}
