<?php

namespace App\Repositories;

use App\Models\standardmenulog;
use App\Repositories\BaseRepository;

/**
 * Class standardmenulogRepository
 * @package App\Repositories
 * @version March 1, 2023, 11:30 pm UTC
*/

class standardmenulogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'menuitemid',
        'standardmenuid'
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
        return standardmenulog::class;
    }
}
