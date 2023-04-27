<?php

namespace App\Repositories;

use App\Models\project;
use App\Repositories\BaseRepository;

/**
 * Class projectRepository
 * @package App\Repositories
 * @version April 27, 2023, 1:47 pm UTC
*/

class projectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'eventdate',
        'eventtime',
        'orderplacedon',
        'eventordertotal',
        'eventdiscount',
        'numOfGuests',
        'venueid',
        'customerid',
        'userid',
        'standardmenuid',
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
        return project::class;
    }
}
