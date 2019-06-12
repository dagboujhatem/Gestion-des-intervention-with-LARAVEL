<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Entretien
 * @package App
 * @version April 17, 2019, 12:54 pm UTC
 *
 * @property string text_du_rappel
 * @property string couleur
 * @property string start_date
 * @property string end_date
 */
class Entretien extends Model
{
    use SoftDeletes;

    public $table = 'entretiens';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'text_du_rappel',
        'frequence',
        'start_date',
        'end_date',
        'equipement_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'equipement_id' => 'integer',
        'text_du_rappel' => 'string',
        'frequence' => 'string',
        'start_date' => 'string',
        'end_date' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'text_du_rappel' => 'required',
        'frequence' => 'required',
        'start_date' => 'required',
        'end_date' => 'required'
    ];

    public function equipement()
    {
        return $this->belongsTo('App\Equipement','equipement_id');
    }

    public function defaillance()
    {
       return $this->hasOne('App\Defaillance');
    }
    
}
