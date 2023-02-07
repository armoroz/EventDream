<?php

namespace App\Repositories;

use App\Models\event;
use App\Repositories\BaseRepository;

/**
 * Class eventRepository
 * @package App\Repositories
 * @version February 7, 2023, 8:11 pm UTC
*/

class eventRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'eventproductquantity',
        'eventid',
        'productid',
        'totalcost'
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
        return event::class;
    }
}
