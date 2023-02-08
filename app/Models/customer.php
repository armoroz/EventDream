<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class customer
 * @package App\Models
 * @version January 27, 2023, 3:57 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $events
 * @property string $firstname
 * @property string $surname
 * @property string $dob
 * @property integer $age
 * @property integer $phone
 * @property string $email
 * @property string $addressline1
 * @property string $addressline2
 * @property string $city
 * @property string $eircode
 * @property integer $cardno
 * @property string $cardexpiry
 * @property integer $cvv
 * @property string $username
 * @property string $pass
 */
class customer extends Model
{


    public $table = 'customer';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'firstname',
        'surname',
        'dob',
        'age',
        'phone',
        'email',
        'addressline1',
        'addressline2',
        'city',
        'eircode',
        'cardno',
        'cardexpiry',
        'cvv',
        'username',
        'pass'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'firstname' => 'string',
        'surname' => 'string',
        'dob' => 'date',
        'age' => 'integer',
        'phone' => 'integer',
        'email' => 'string',
        'addressline1' => 'string',
        'addressline2' => 'string',
        'city' => 'string',
        'eircode' => 'string',
        'cardno' => 'integer',
        'cardexpiry' => 'string',
        'cvv' => 'integer',
        'username' => 'string',
        'pass' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'firstname' => 'nullable|string|max:15',
        'surname' => 'nullable|string|max:15',
        'dob' => 'nullable',
        'age' => 'nullable|integer',
        'phone' => 'nullable|integer',
        'email' => 'nullable|string|max:30',
        'addressline1' => 'nullable|string|max:40',
        'addressline2' => 'nullable|string|max:40',
        'city' => 'nullable|string|max:25',
        'eircode' => 'nullable|string|max:7',
        'cardno' => 'nullable',
        'cardexpiry' => 'nullable|string|max:7',
        'cvv' => 'nullable|integer',
        'username' => 'nullable|string|max:20',
        'pass' => 'nullable|string|max:30'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function events()
    {
        return $this->hasMany(\App\Models\Event::class, 'customerid');
    }
	
	public function user()
	{
		return $this->belongsTo(\App\User::class,'userid','id');
	}
}
