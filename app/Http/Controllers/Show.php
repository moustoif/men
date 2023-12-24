<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Show extends Controller
{
    //Employée
    public function getEmployeeList(){
        $personnels = DB::table('personnels')
            ->where('is_admin', 0)
            ->join('direction', 'personnels.direction', '=', 'direction.code_direction')
            ->join('service', 'personnels.service', '=', 'service.code_service')
            ->get();
        return view('Admin.users.lists', ['personnels' => $personnels]);
    }

    public function getEmployeeInHoliday(){
        $personnelsEnConge = DB::table('personnels')
            ->where('is_admin', 0)
            ->where('etat', 'En congé')
            ->join('direction', 'personnels.direction', '=', 'direction.code_direction')
            ->join('service', 'personnels.service', '=', 'service.code_service')
            ->get();
        return view('Admin.users.holiday', ['personnelsEnConge' => $personnelsEnConge]);
    }

    public function getInactiveEmployee(){
        $personnels = DB::table('personnels')
            ->where('is_admin', 0)
            ->where('etat', 'Non actif')
            ->join('direction', 'personnels.direction', '=', 'direction.code_direction')
            ->join('service', 'personnels.service', '=', 'service.code_service')
            ->get();
        return view('Admin.users.non-active', ['pEnAttente' => $personnels]);
    }

    public function getPresentEmployeeList(){
        $personnels = DB::table('personnels')
            ->where('is_admin', 0)
            ->where('etat', 'Actif')
            ->join('direction', 'personnels.direction', '=', 'direction.code_direction')
            ->join('service', 'personnels.service', '=', 'service.code_service')
            ->get();
        return view('Admin.users.active', ['pActif' => $personnels]);
    }

    public function getMissingEmployeeList(){
        $personnels = DB::table('personnels')
            ->where('is_admin', 0)
            ->where('etat', 'Abscent')
            ->join('direction', 'personnels.direction', '=', 'direction.code_direction')
            ->join('service', 'personnels.service', '=', 'service.code_service')
            ->get();
        return view('Admin.users.missing', ['abs' => $personnels]);
    }
    //Employée

    //Demandes
    public function getRequestList(){
        $conges = DB::table('abscence')->get();
        return view('Admin.requests.lists', ['conges' => $conges]);
    }

    public function getAcceptedRequest(){
        $conges = DB::table('abscence')->where('statut', 'Approuvée')->get();
        return view('Admin.requests.accepted', ['approuvees' => $conges]);
    }

    public function getDeniedRequest(){
        $conges = DB::table('abscence')->where('statut', 'Rejetée')->get();
        return view('Admin.requests.denied', ['refusees' => $conges]);
    }

    public function getWaitingRequest(){
        $conges = DB::table('abscence')->where('statut', 'En attente')->get();
        return view('Admin.requests.waiting', ['enAttente' => $conges]);
    }
    //Demandes

    public function getAboutSomeone($matricule){
        $user = DB::table('personnels')
            ->where('matricule', $matricule)
            ->join('direction', 'personnels.direction', '=', 'direction.code_direction')
            ->join('service', 'personnels.service', '=', 'service.code_service')
            ->first();
        return view('Employees.about', ['moi' => $user]);
    }

    public function getRequestOfSomeone($matricule){
        $mesDemandes = DB::table('abscence')
            ->where('matricule', $matricule)
            ->get();
        return view('Admin.users.myrequest', ['mesDemandes' => $mesDemandes]);
    }
}
