<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Intervention;

class UpdateInterventionRequest extends FormRequest
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
        'panne_id' => 'required',
        'description' => 'required',
        'temps_arret' => 'required',
        'heures_personnes' => 'required', 
    ];
    }
}
