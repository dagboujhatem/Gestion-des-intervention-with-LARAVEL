<?php

namespace App\Repositories;

use App\Panne;
use App\Repositories\BaseRepository;

/**
 * Class PanneRepository
 * @package App\Repositories
 * @version April 14, 2019, 8:00 pm UTC
*/

class PanneRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'description',
        'type_de_panne',
        'priorit '
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
        return Panne::class;
    }
}
