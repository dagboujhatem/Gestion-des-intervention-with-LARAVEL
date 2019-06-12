<?php

namespace App\Repositories;

use App\Equipement;
use App\Repositories\BaseRepository;

/**
 * Class EquipementRepository
 * @package App\Repositories
 * @version April 14, 2019, 7:18 pm UTC
*/

class EquipementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'localisation',
        'description'
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
        return Equipement::class;
    }
}
