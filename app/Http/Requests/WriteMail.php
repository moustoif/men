<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WriteMail extends FormRequest
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
            "nom" => "required",
            "email" => "required|email",
            "sujet" => "required"
        ];
    }

    public function messages()
    {
        return [
            "nom.required" => "Le nom de l'expéditeur est recquis",
            "email.required" => "L'adresse du destinataire est recquis",
            "email.email" => "Saisir une adresse email valide",
            "sujet.required" => "La raison d'envoi est recquise"
        ];
    }
}
