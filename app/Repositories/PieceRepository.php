<?php

namespace App\Repositories;

use App\Piece;
use App\Repositories\BaseRepository;

/**
 * Class PieceRepository
 * @package App\Repositories
 * @version April 12, 2019, 3:04 pm UTC
*/

class PieceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'quantite',
        'description',
        'nom_du_fournisseur',
        'prix_unitaire',
        'date_de_commande',
        'date_recu',
        'num_facture'
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
        return Piece::class;
    }
}
