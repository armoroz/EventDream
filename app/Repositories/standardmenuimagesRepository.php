<?php

namespace App\Repositories;

use App\Models\standardmenuimages;
use App\Repositories\BaseRepository;

/**
 * Class standardmenuimagesRepository
 * @package App\Repositories
 * @version March 4, 2023, 8:04 pm UTC
*/

class standardmenuimagesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'standardmenuid',
        'imagefile'
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
        return standardmenuimages::class;
    }
}
