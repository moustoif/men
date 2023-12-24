<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\CreateAccountRequest;
use App\Models\Personnels;
use App\Http\Requests\AddFromExtra;
use App\Models\Direction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Service;
use Session;

class Login extends Controller
{
    public function getLoginPage(){
        return view('Auth.login');
    }
    public function getRegisterPage(){
        $direction = Direction::select('code_direction', 'abrev_direction')->get();
        $service = Service::select('code_service', 'abrev_service', 'code_direction')->get();
        return view('Auth.register', ['direction' => $direction, 'service' =>  $service]);
    }
    public function loginToAccount(LoginRequest $request){
        $request->validated();
        $user = DB::table('personnels')
            ->where('email', $request->email)
            ->first();

        if($user)
        {
            if(Hash::check($request->password, $user->mot_de_passe))
            {
                if($user->is_admin == 1){
                    $request->session()->put('loginId', $user->matricule);
                    return redirect('admin/acceuil');
                }

                else if($user->is_admin == 0 && ($user->etat == "Actif" || $user->etat == "En congé"))
                {
                    $request->session()->put('loginId', $user->matricule);
                    return redirect('personnel/acceuil');
                }

                else if($user->is_admin == 0 && $user->etat == "Non actif")
                {
                    return redirect('personnel/en-attente-de-validation');
                } 
            } else {
                return back()->with('Le mot de passe ne correspond pas');
            }
        } else {
            return back()->with("L'email n'existe pas");
        }

    }

    public function createAccount(CreateAccountRequest $request){
        $request->validated();
        DB::table('personnels')->insert([
            'matricule' => $request->matricule,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'cin' => $request->cin,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'direction' => $request->direction,
            'service' => $request->service,
            'mot_de_passe' => Hash::make($request->password),
            'poste' => $request->poste
        ]);
        $request->session()->flash("success", "{$request->nom} a été ajouté.");
        return redirect('/s\'enregistrer');
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return view('Auth.login');
        }
    }

    public function getExtraPage(){
        return view('Extra.main');
    }

    public function addEmployeeFromExtra(AddFromExtra $request){
        $request->validated();
        DB::table('personnels')->insert([
            'matricule' => $request->matricule,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'cin' => $request->cin,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'direction' => $request->direction,
            'service' => $request->service,
            'is_admin' => $request->nommination,
            'etat' => $request->etat,
            'mot_de_passe' => Hash::make($request->password),
            'poste' => $request->poste
        ]);
        return redirect('/');
    }
}
