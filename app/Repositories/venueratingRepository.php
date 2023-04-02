<?php

namespace App\Repositories;

use App\Models\venuerating;
use App\Repositories\BaseRepository;

/**
 * Class venueratingRepository
 * @package App\Repositories
 * @version February 9, 2023, 11:00 pm UTC
*/

class venueratingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'rating',
        'comment',
        'venueid',
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
        return venuerating::class;
    }
}
