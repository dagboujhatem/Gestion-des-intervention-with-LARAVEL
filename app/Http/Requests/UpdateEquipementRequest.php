<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Equipement;

class UpdateEquipementRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'nom' => 'required',
        'numero_serie' => 'required',
        'localisation' => 'required',
        //'fiche_technique' => 'required',
        'couleur' => 'required',
        'description' => 'required'
    ];

    }
}
