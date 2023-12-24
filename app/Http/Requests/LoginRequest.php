<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|exists:personnels,email',
            'password' => 'required|min:5|max:12'
        ];
    }
    public function messages()
    {
        return [
            "email.required" => "Votre email est requis",
            "email.email" => "Saisir une adresse email valide",
            "email.exists" => "Votre email n'est pas encore enregister",
            "password.required" => "Votre mot de passe est requis",
            "password.min" => "Le mot de passe doit être >= 5 et <= 12",
            "password.max" => "Le mot de passe doit être >= 5 et <= 12",
        ];
    }
}
