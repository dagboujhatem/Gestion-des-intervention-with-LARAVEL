<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Panne
 * @package App
 * @version April 14, 2019, 8:00 pm UTC
 *
 * @property string nom
 * @property string description
 * @property string type_de_panne
 * @property string priorit 
 */
class Panne extends Model
{
    use SoftDeletes;

    public $table = 'pannes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nom',
        'temps_estime',
        'description',
        'type_de_panne',
        'priorite',
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
        'nom' => 'string',
        'temps_estime' => 'string',
        'description' => 'string',
        'type_de_panne' => 'string',
        'priorite' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required',
        'temps_estime' => 'required',
        'description' => 'required'
    ];

    public function equipement()
    {
        return $this->belongsTo('App\Equipement','equipement_id');
    }

    public function intervention()
    {
       return $this->hasOne('App\Intervention');
    }
}
