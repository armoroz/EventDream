<?php

namespace App\Repositories;

use App\Models\venue;
use App\Repositories\BaseRepository;

/**
 * Class venueRepository
 * @package App\Repositories
 * @version February 8, 2023, 11:22 pm UTC
*/

class venueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'venuename',
        'addressline1',
        'addressline2',
        'city',
        'eircode',
        'humancapacity',
        'costtorent',
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
        return venue::class;
    }
}
