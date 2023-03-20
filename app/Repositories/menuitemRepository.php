<?php

namespace App\Repositories;

use App\Models\menuitem;
use App\Repositories\BaseRepository;

/**
 * Class menuitemRepository
 * @package App\Repositories
 * @version March 1, 2023, 11:26 pm UTC
*/

class menuitemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'menuitemname',
        'menuitemdesc',
        'menuitemnutrition',
        'menuitemallergens',
        'menuitemcost',
        'menuitemimglink',
        'userid',
		'course'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return menuitem::class;
    }
}
