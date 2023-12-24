<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnels;
use App\Models\Decompte;
use App\Models\Direction;
use Illuminate\Support\Facades\Hash;
use App\Models\Service;
use App\Models\Abscence;
use Illuminate\Support\Facades\DB;
use Session;

class GetDefaultPage extends Controller
{
    public function getAdminHomePage(){
        $tp = Personnels::where('is_admin', 0)->count(); // Total personnels
        $tpa = Personnels::where('etat', 'Actif')->where('is_admin', 0)->count(); // Total personnels actifs
        $tpi = Personnels::where('etat', 'Non actif')->where('is_admin', 0)->count(); // Total personnels inactifs
        $tpabs = Personnels::where('etat', 'Abscent')->where('is_admin', 0)->count(); // Total personnels abscent
        $tpen = Personnels::where('etat', 'En congé')->where('is_admin', 0)->count(); // Total personnels en congé

        $td = Abscence::count(); // Total demande
        $da = Abscence::where('statut', 'Approuvée')->count(); // Demande acceptées
        $dr = Abscence::where('statut', 'Rejetée')->count(); // Demande acceptées
        $dea = Abscence::where('statut', 'En attente')->count(); // Demande en attente

        return view('Admin.main', ['tp' => $tp, 'tpa' => $tpa, 'tpi' => $tpi, 'tpabs' => $tpabs, 'tpen' => $tpen,
    'td' => $td, 'da' => $da, 'dr' => $dr, 'dea' => $dea]);
    }

    public function getAboutMePage(){
            $matricule = Session::get('loginId');
            $user = DB::table('personnels')
                ->where('matricule', $matricule)
                ->join('direction', 'personnels.direction', '=', 'direction.code_direction')
                ->join('service', 'personnels.service', '=', 'service.code_service')
                ->first();
        return view('Admin.about', ['moi' => $user]);
    }

    public function getAddEmployeePage(){
        $direction = Direction::select('code_direction', 'abrev_direction')->get();
        $service = Service::select('code_service', 'abrev_service')->get();
        return view('Admin.employee', ['direction' => $direction, 'service' => $service]);
    }

    public function getMyRequestPage(){
        $matricule = Session::get('loginId');
        $request = Decompte::where('matricule', $matricule)->get();
        $user = Personnels::select('nom', 'prenom')->where('matricule', $matricule)->first();
        $yearInTable = Decompte::select('annee')->where('matricule', $matricule)->get();

        return view('Admin.request', ['mesDecompte' => $request, 'moi' => $user, 'annee' => $yearInTable]);
    }

    public function getEmailPage(){
        
        return view('Admin.mail');
    }

    public function getMyRequest(){
            $matricule = Session::get('loginId');
            $user = Personnels::where('matricule', $matricule)->first();

            $request = Abscence::where('matricule', $matricule)->get();
        return view('Admin.myrequest', ['moi' => $user, 'abscence' => $request]);
    }

    public function getUpdatePage(){
        $direction = Direction::select('code_direction', 'abrev_direction')->get();
        $service = Service::select('code_service', 'abrev_service')->get();

        $user = DB::table('personnels')
            ->where('matricule', '=', Session::get('loginId'))
            ->join('direction', 'personnels.direction', '=', 'direction.code_direction')
            ->join('service', 'personnels.service', '=', 'service.code_service')
            ->first();
        
        return view('Admin.update', ['direction' => $direction, 'service' => $service, 'moi' => $user]);
    }

    public function getPage(){

        return view('Employees.waiting');
    }

    public function getEmployeeHomePage(){
        $matricule = Session::get('loginId');
        $user = DB::table('personnels')
            ->where('matricule', $matricule)
            ->join('direction', 'personnels.direction', '=', 'direction.code_direction')
            ->join('service', 'personnels.service', '=', 'service.code_service')
            ->first();
        return view('Employees.main', ['moi' => $user]);
    }

    public function getEmployeeRequestPage(){
        $matricule = Session::get('loginId');
        $request = Decompte::where('matricule', $matricule)->get();
        $user = Personnels::select('nom', 'prenom')->where('matricule', $matricule)->first();
        $yearInTable = Decompte::select('annee')->where('matricule', $matricule)->get();
        return view('Employees.request', ['mesDecompte' => $request, 'moi' => $user, 'annee' => $yearInTable]);
    }

    public function getAllMyRequestPage(){
        $matricule = Session::get('loginId');
        $user = Personnels::where('matricule', $matricule)->first();
        $request = Abscence::where('matricule', $matricule)->get();
        return view('Employees.myrequest', ['moi' => $user, 'abscence' => $request]);
    }

    public function getUpPage(){
        $direction = Direction::select('code_direction', 'abrev_direction')->get();
        $service = Service::select('code_service', 'abrev_service')->get();

        $user = DB::table('personnels')
            ->where('matricule', '=', Session::get('loginId'))
            ->join('direction', 'personnels.direction', '=', 'direction.code_direction')
            ->join('service', 'personnels.service', '=', 'service.code_service')
            ->first();
        
        return view('Employees.update', ['direction' => $direction, 'service' => $service, 'moi' => $user]);
    }

    public function getPdfPage(){

        return view('pdf.pdf');
    }
}
