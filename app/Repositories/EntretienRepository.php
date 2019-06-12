<?php

namespace App\Repositories;

use App\Entretien;
use App\Repositories\BaseRepository;

/**
 * Class EntretienRepository
 * @package App\Repositories
 * @version April 17, 2019, 12:54 pm UTC
*/

class EntretienRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'text_du_rappel',
        'couleur',
        'start_date',
        'end_date'
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
        return Entretien::class;
    }
}
