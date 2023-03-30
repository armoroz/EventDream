<?php

namespace App\Repositories;

use App\Models\event;
use App\Repositories\BaseRepository;

/**
 * Class eventRepository
 * @package App\Repositories
 * @version February 8, 2023, 11:39 am UTC
*/

class eventRepository extends BaseRepository
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
        'venueid',
        'customerid',
        'userid',
        'standardmenuid',
        'custommenuid',
        'deliveryid'
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
	
	public function findByCustomerId($customerId)
	{
		return $this->model->where('customerid', $customerId)->get();
	}	
}
