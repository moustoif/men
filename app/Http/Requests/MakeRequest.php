<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakeRequest extends FormRequest
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
            "debut" => "required",
            "fin" => "required",
            "type" => "required",
            "motif" => "required|string",
            "annee" => "required"
        ];
    }

    public function messages()
    {
        return [
            "debut.required" => "La date de début est requise.",
            "fin.required" => "La date de fin est requise.",
            "type.required" => "Choisir une option.",
            "motif.required" => "S'il vous plait, donnez votre motif.",
            "debut.string" => "Le motif doit être une chaine de caractère.",
            "annee.required" => "L'année est requise.",
            //"annee.exists" => "Le décompte pour cette année n'existe pas encore, vous devez d'abord l'ajouter."
            
        ];
    }
}
