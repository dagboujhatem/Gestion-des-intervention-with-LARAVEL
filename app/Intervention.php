<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Intervention
 * @package App
 * @version April 19, 2019, 10:34 am UTC
 *
 * @property string description
 * @property string temps_arret
 * @property string heures_personnes
 * @property string prix_m_o
 * @property string prix_pieces
 * @property string total
 * @property string impact_sur_le_service
 * @property integer panne_id
 */
class Intervention extends Model
{
    use SoftDeletes;

    public $table = 'interventions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'description' => 'string',
        'temps_arret' => 'string',
        'heures_personnes' => 'string',
        'prix_m_o' => 'string',
        'prix_pieces' => 'string',
        'total' => 'string',
        'impact_sur_le_service' => 'string',
        'panne_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'panne_id' => 'required',
        'description' => 'required',
        'temps_arret' => 'required|integer',
        'heures_personnes' => 'required',
        'prix_m_o' => 'required',
        'prix_pieces' => 'required',
        'total' => 'required'
    ];


    public function panne()
    {
        return $this->belongsTo('App\Panne','panne_id'); 
    }


    
}
