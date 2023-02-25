<?php

namespace App\Repositories;

use App\Models\venue;
use App\Repositories\BaseRepository;

/**
 * Class venueRepository
 * @package App\Repositories
 * @version February 9, 2023, 11:16 pm UTC
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
        'userid',
		'lat',
		'lng'
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
