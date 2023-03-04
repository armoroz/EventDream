<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class standardmenu
 * @package App\Models
 * @version March 1, 2023, 11:29 pm UTC
 *
 * @property \App\Models\User $userid
 * @property \Illuminate\Database\Eloquent\Collection $events
 * @property \Illuminate\Database\Eloquent\Collection $standardmenulogs
 * @property string $standardmenuname
 * @property string $style
 * @property string $course
 * @property string $description
 * @property integer $userid
 */
class standardmenu extends Model
{


    public $table = 'standardmenu';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'standardmenuname',
        'style',
        'course',
        'description',
        'userid'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'standardmenuname' => 'string',
        'style' => 'string',
        'course' => 'string',
        'description' => 'string',
        'userid' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'standardmenuname' => 'nullable|string|max:20',
        'style' => 'nullable|string|max:20',
        'course' => 'nullable|string|max:20',
        'description' => 'nullable|string',
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
    public function events()
    {
        return $this->hasMany(\App\Models\Event::class, 'standardmenuid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function standardmenulogs()
    {
        return $this->hasMany(\App\Models\Standardmenulog::class, 'standardmenuid');
    }
	
	public function standardmenuimages()
	{
		return $this->hasMany(\App\Models\Standardmenuimages::class, 'standardmenuid');
	}
}
