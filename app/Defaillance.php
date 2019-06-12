<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Defaillance
 * @package App
 * @version April 17, 2019, 2:54 pm UTC
 *
 * @property string description
 * @property string responsable
 * @property integer entretien_id
 */
class Defaillance extends Model
{
    use SoftDeletes;

    public $table = 'defaillances';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'description',
        'responsable',
        'entretien_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'description' => 'string',
        'responsable' => 'string',
        'entretien_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'description' => 'required',
        'responsable' => 'required',
        'entretien_id' => 'required',
    ];
    
    public function entretien()
    {
        return $this->belongsTo('App\Entretien','entretien_id');
    }
    
}
