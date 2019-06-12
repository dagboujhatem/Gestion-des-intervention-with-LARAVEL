<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Equipement
 * @package App
 * @version April 14, 2019, 7:18 pm UTC
 *
 * @property string nom
 * @property string localisation
 * @property string description
 */
class Equipement extends Model
{
    use SoftDeletes;

    public $table = 'equipements';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nom',
        'numero_serie',
        'fiche_technique',
        'couleur',
        'localisation',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'numero_serie' => 'string',
        'fiche_technique' => 'string',
        'couleur' => 'string',
        'localisation' => 'string',
        'description' => 'string'
    ];
 
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required',
        'numero_serie' => 'required',
        'localisation' => 'required',
        'fiche_technique' => 'required',
        'couleur' => 'required',
        'description' => 'required'
    ];

    public function pannes()
    {
       return $this->hasMany('App\Panne');
    }

    public function entretiens()
    {
       return $this->hasMany('App\Entretien');
    }

}
