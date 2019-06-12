<?php

namespace App\Repositories;

use App\Intervention;
use App\Repositories\BaseRepository;

/**
 * Class InterventionRepository
 * @package App\Repositories
 * @version April 19, 2019, 10:34 am UTC
*/

class InterventionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'description',
        'temps_arret',
        'heures_personnes',
        'prix_m_o',
        'prix_pieces',
        'total',
        'impact_sur_le_service',
        'panne_id'
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
        return Intervention::class;
    }
}
