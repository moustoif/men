<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\MakeRequest;
use Session;
use Carbon\Carbon;

class Employee extends Controller
{
    public function updateMyProfile(Request $request){
        DB::table('personnels')
            ->where('matricule', $request->default_matricule)
            ->update([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'cin' => $request->cin,
                'telephone' => $request->telephone,
                'adresse' => $request->adresse,
                'email' => $request->email,
                'poste' => $request->poste,
                'service' => $request->service,
                'direction' => $request->direction
            ]);
        return redirect('personnel/acceuil');
    }

    public function addNewRequest(MakeRequest $request){
        $request->validated();
        $debut = Carbon::parse($request->input('debut'));
        $fin = Carbon::parse($request->input('fin'));
        $value = $debut->diffInDays($fin);
        $matricule = Session::get('loginId');

        $limite = 0;
        $limiteParAbscence = 0;

        $jRestants = DB::table('decompte')
            ->select('nb_jours')
            ->where('matricule', $matricule)
            ->where('annee', $request->annee)
            ->get();
        
        $checked_day = 0;
        foreach ($jRestants as $key) {
            $checked_day = $key->nb_jours;
        }
        //$jrs = (int)$nbJrs - (int)$value;
        // Verifie si le nombre de jours depasse
        $condition = DB::table('abscence')
            ->where('matricule', $matricule)
            ->sum('nb_jours');
        // Verifie si le nombre de jours depasse
        
        //persmission
        if($request->type == "Persmission")
        {
            $limiteParAbscence = 3;
            $limite = 10;
            if($condition <= $limite)
            {
                if($value > $limiteParAbscence )
                {
                    $request->session()->flash("p_depasse", "La permission ne doit pas plus de 3 jours.");
                } else if($checked_day <= 0){
                    $request->session()->flash("zero", "Votre décompte est à 0 pour cette année.");
                } else {
                    $conge = DB::table('abscence')->insert([
                        'matricule' => $matricule,
                        'debut' => $request->debut,
                        'fin' => $request->fin,
                        'nb_jours' => $value,
                        'annee_abs' => $request->annee,
                        'type' => $request->type,
                        'motif' => $request->motif
                    ]);
                    $request->session()->flash("p_success", "Votre demande est bien envoyée et va être consultée.");
                }
            } else {
                $request->session()->flash("p_echec", "La persmission ne doit pas dépasser plus de 10 ou inférieur au nombre de jours demandé.");
            }
        } 
        //persmission

        //Congé annuel
        else if($request->type == "Congé annuel")
        {
            $limite = 30;
            $limiteParAbscence = 15;
            if($condition <= $limite)
            {
                if($value > $limiteParAbscence)
                {
                    $request->session()->flash("ca_depasse", "Le congé annuel ne doit pas dépasser de plus 15 jours d'un coup.");
                } else if($checked_day <= 0){
                    $request->session()->flash("zero", "Votre décompte est à 0 pour cette année.");
                } else {
                    $conge = DB::table('abscence')->insert([
                        'matricule' => $matricule,
                        'debut' => $request->debut,
                        'fin' => $request->fin,
                        'nb_jours' => $value,
                        'annee_abs' => $request->annee,
                        'type' => $request->type,
                        'motif' => $request->motif
                    ]);
                    $request->session()->flash("ca_success", "Votre demande est bien envoyée et va être consultée.");
                }
            } else {
                $request->session()->flash("ca_echec", "La persmission ne doit pas dépasser plus de 30.");
            }
        } 
        //Congé annuel

        //Congé de maternité
        else if($request->type == "Congé de maternité")
        {
            $conge = DB::table('abscence')->insert([
                'matricule' => $matricule,
                'debut' => $request->debut,
                'fin' => $request->fin,
                'nb_jours' => $value,
                'annee_abs' => $request->annee,
                'type' => $request->type,
                'motif' => $request->motif
            ]);
            $request->session()->flash("cm_success", "Votre demande est bien envoyée et va être consultée.");

        }
        //Congé de maternité

        //Congé de paternité
        else if($request->type == "Congé de paternité")
        {
            $limite = 30;
            $limiteParAbscence = 15;
            if($condition < $limite)
            {
                if($value > $limiteParAbscence)
                {
                    $request->session()->flash("cp_depasse", "Le congé de paternité ne doit pas dépasser de plus 15 jours d'un coup.");
                } else if($checked_day <= 0){
                    $request->session()->flash("zero", "Votre décompte est à 0 pour cette année.");
                } else {
                    $conge = DB::table('abscence')->insert([
                        'matricule' => $matricule,
                        'debut' => $request->debut,
                        'fin' => $request->fin,
                        'nb_jours' => $value,
                        'annee_abs' => $request->annee,
                        'type' => $request->type,
                        'motif' => $request->motif
                    ]);
                    $request->session()->flash("cp_success", "Votre demande est bien envoyée et va être consultée.");  
                }
            } else {
                $request->session()->flash("cp_echec", "Le congé de paternité ne doit pas dépasser plus de 30.");  
            }
        }
        //Congé de paternité

        //Autorisation d'abscence
        else if($request->type == "Autorisation d'abscence")
        {
            $limite = 30;
            $limiteParAbscence = 15;
            if($condition < $limite)
            {
                if($value > $limiteParAbscence)
                {
                    $request->session()->flash("depasse", "L'autorisation d'abscence ne doit pas dépasser de plus 15 jours d'un coup.");  
                } else if($checked_day <= 0){
                    $request->session()->flash("zero", "Votre décompte est à 0 pour cette année.");  
                } else {
                    $conge = DB::table('abscence')->insert([
                        'matricule' => $matricule,
                        'debut' => $request->debut,
                        'fin' => $request->fin,
                        'nb_jours' => $value,
                        'annee_abs' => $request->annee,
                        'type' => $request->type,
                        'motif' => $request->motif
                    ]);
                $request->session()->flash("success", "Votre demande est bien envoyée et va être consultée.");  
                }
            } else {
                $request->session()->flash("echec", "L'autorisation d'abscence ne doit pas dépasser plus de 30.");  
            }
        }
        //Autorisation d'abscence

        return redirect('personnel/demande');
    }

    public function addNewCount(Request $request){
        $validation = $request->validate([
            "annee" => "required"
        ], [
            "annee.required" => "L'année est recquise",
        ]);

        $matricule = Session::get('loginId');
        DB::table('decompte')->insert([
            'annee' => $request->annee,
            'matricule' => $matricule
        ]);

        return redirect('personnel/mes-demandes');
    }
}
