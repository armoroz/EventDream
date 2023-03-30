<?php

namespace App\Repositories;

use App\Models\custommenu;
use App\Repositories\BaseRepository;

/**
 * Class custommenuRepository
 * @package App\Repositories
 * @version March 1, 2023, 11:31 pm UTC
*/

class custommenuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'custommenuname',
        'description',
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
        return custommenu::class;
    }
}
