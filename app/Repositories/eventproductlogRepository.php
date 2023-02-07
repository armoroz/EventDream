<?php

namespace App\Repositories;

use App\Models\eventproductlog;
use App\Repositories\BaseRepository;

/**
 * Class eventproductlogRepository
 * @package App\Repositories
 * @version February 7, 2023, 8:11 pm UTC
*/

class eventproductlogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
		'eventdate',
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
        return eventproductlog::class;
    }
}
