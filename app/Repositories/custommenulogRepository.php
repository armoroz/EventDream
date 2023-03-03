<?php

namespace App\Repositories;

use App\Models\custommenulog;
use App\Repositories\BaseRepository;

/**
 * Class custommenulogRepository
 * @package App\Repositories
 * @version March 1, 2023, 11:32 pm UTC
*/

class custommenulogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'menuitemid',
        'custommenuid'
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
        return custommenulog::class;
    }
}
