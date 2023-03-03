<?php

namespace App\Repositories;

use App\Models\standardmenu;
use App\Repositories\BaseRepository;

/**
 * Class standardmenuRepository
 * @package App\Repositories
 * @version March 1, 2023, 11:29 pm UTC
*/

class standardmenuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'standardmenuname',
        'style',
        'course',
        'description',
        'userid'
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
        return standardmenu::class;
    }
}
