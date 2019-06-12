<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Piece
 * @package App
 * @version April 12, 2019, 3:04 pm UTC
 *
 * @property string nom
 * @property string quantite
 * @property string description
 * @property string nom_du_fournisseur
 * @property string prix_unitaire
 * @property string date_de_commande
 * @property string date_recu
 * @property string num_facture
 */
class Piece extends Model
{
    use SoftDeletes;

    public $table = 'pieces';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'quantite' => 'string',
        'description' => 'string',
        'nom_du_fournisseur' => 'string',
        'prix_unitaire' => 'string',
        'date_de_commande' => 'string',
        'date_recu' => 'string',
        'num_facture' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required',
        'quantite' => 'required',
        'description' => 'required',
        'nom_du_fournisseur' => 'required',
        'quantite' => 'integer|min:1',
        'prix_unitaire' => 'required|regex:/^\d+(\.\d{1,3})?$/',
        'date_de_commande' => 'date',
        'date_recu' => 'date',
        'num_facture' => 'required'
    ];

    
}
