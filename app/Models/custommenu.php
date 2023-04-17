<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class custommenu
 * @package App\Models
 * @version March 1, 2023, 11:31 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $custommenulogs
 * @property \Illuminate\Database\Eloquent\Collection $events
 * @property string $custommenuname
 * @property string $description
 */
class custommenu extends Model
{


    public $table = 'custommenu';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'custommenuname',
        'description',
		'customerid'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'custommenuname' => 'string',
        'description' => 'string',
		'customerid' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'custommenuname' => 'nullable|string|max:20',
        'description' => 'nullable|string',
		'customerid' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function custommenulogs()
    {
        return $this->hasMany(\App\Models\custommenulog::class, 'custommenuid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function events()
    {
        return $this->hasMany(\App\Models\event::class, 'custommenuid');
    }
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function menuitems()
    {
        return $this->belongsToMany(\App\Models\menuitem::class, 'custommenulog','custommenuid','menuitemid');
    }
	
    public function customerid()
    {
        return $this->belongsTo(\App\Models\customer::class, 'customerid');
    }

}
