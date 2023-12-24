<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAccountRequest extends FormRequest
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
            "matricule" => "required|unique:personnels,matricule",
            "nom" => "required|string",
            "prenom" => "required|string",
            "cin" => "required|digits:12",
            "telephone" => "required|digits_between:10,12",
            "adresse" => "required",
            "poste" => "required",
            "direction" => "required",
            "service" => "required|string",
            "email" => "required|email|unique:personnels,email",
            "password" => "required|min:5|max:12",
        ];
    }

    public function messages(){
        return [
            "matricule.required" => "Votre email est requis",
            "matricule.unique" => "L'email saisi existe déjà",

            "nom.required" => "Votre nom est requis",
            "nom.string" => "Le nom doit être écrit en chaine de caractère",

            "prenom.required" => "Votre prénom est requis",
            "prenom.string" => "Votre prénom doit être écrit en chaine de caractère",

            "cin.required" => "Votre Carte d'Identité Nationale est requis",
            //"cin.max" => "La Carte d'Identité Nationale doit être égale à 12 chiffres",
            //"cin.min" => "La Carte d'Identité Nationale doit être égale à 12 chiffres",
            //"cin.numeric" => "La Carte d'Identité Nationale est une suite de chiffres",
            "cin.digits" => "La Carte d'Identité Nationale est une suite de 12 chiffres",

            "telephone.required" => "Votre téléphone est requis",
            "telephone.digits_between" => "Votre téléphone doit être compris entre 10 à 12 chiffres",

            "adresse.required" => "Votre adresse est requise",

            "poste.required" => "Votre poste est requise",

            "direction.required" => "Votre direction est requise",

            "service.required" => "Le service où vous travaillez est requis",
            "service.string" => "Le service doit être écrit en chaine de caractère",

            "email.required" => "Votre email est requis",
            "email.unique" => "Votre adresse email existe déjà",
            "email.email" => "Saisir une adresse email valide",

            "password.required" => "Mot de passe requis",
            "password.min" => "Le mot de passe doit être >= 5 et <= 12",
            "password.max" => "Le mot de passe doit être >= 5 et <= 12",


        ];
    }
}
