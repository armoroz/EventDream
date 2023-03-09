<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class menuitem
 * @package App\Models
 * @version March 1, 2023, 11:26 pm UTC
 *
 * @property \App\Models\User $userid
 * @property \Illuminate\Database\Eloquent\Collection $custommenulogs
 * @property \Illuminate\Database\Eloquent\Collection $standardmenulogs
 * @property string $menuitemname
 * @property string $menuitemdesc
 * @property string $menuitemnutrition
 * @property string $menuitemallergens
 * @property number $menuitemcost
 * @property string $menuitemimglink
 * @property integer $userid
 */
class menuitem extends Model
{


    public $table = 'menuitem';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'menuitemname',
        'menuitemdesc',
        'menuitemnutrition',
        'menuitemallergens',
        'menuitemcost',
        'menuitemimglink',
        'userid'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'menuitemname' => 'string',
        'menuitemdesc' => 'string',
        'menuitemnutrition' => 'string',
        'menuitemallergens' => 'string',
        'menuitemcost' => 'decimal:2',
        'menuitemimglink' => 'string',
        'userid' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'menuitemname' => 'nullable|string|max:20',
        'menuitemdesc' => 'nullable|string',
        'menuitemnutrition' => 'nullable|string',
        'menuitemallergens' => 'nullable|string',
        'menuitemcost' => 'nullable|numeric',
        'menuitemimglink' => 'nullable',
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
    public function custommenulogs()
    {
        return $this->hasMany(\App\Models\Custommenulog::class, 'menuitemid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function standardmenus()
    {
        return $this->belongsToMany(\App\Models\Standardmenu::class, 'standardmenulog','standardmenuid','menuitemid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function standardmenulogs()
    {
        return $this->hasMany(\App\Models\Standardmenulog::class, 'menuitemid');
    }
	
	public function __toString()
	{
		return $this->menuitemname . " " . $this->menuitemdesc ;
	}
	
}
