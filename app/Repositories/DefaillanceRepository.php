<?php

namespace App\Repositories;

use App\Defaillance;
use App\Repositories\BaseRepository;

/**
 * Class DefaillanceRepository
 * @package App\Repositories
 * @version April 17, 2019, 2:54 pm UTC
*/

class DefaillanceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'description',
        'responsable',
        'entretien_id'
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
        return Defaillance::class;
    }
}
