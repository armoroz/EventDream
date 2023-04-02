<?php

namespace App\Repositories;

use App\Models\standardmenurating;
use App\Repositories\BaseRepository;

/**
 * Class standardmenuratingRepository
 * @package App\Repositories
 * @version March 5, 2023, 2:09 pm UTC
*/

class standardmenuratingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'rating',
        'comment',
        'standardmenuid',
		'customerid'
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
        return standardmenurating::class;
    }
}
