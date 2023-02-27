<?php

namespace App\Repositories;

use App\Models\venueimages;
use App\Repositories\BaseRepository;

/**
 * Class venueimagesRepository
 * @package App\Repositories
 * @version February 27, 2023, 5:08 pm UTC
*/

class venueimagesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'venueid',
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
        return venueimages::class;
    }
}
