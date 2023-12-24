<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\GetDefaultPage;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Show;
use App\Http\Controllers\Employee;
use App\Http\Controllers\SendMail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Login::class, 'getLoginPage']); //Affiche la page login
Route::get('/s\'enregistrer', [Login::class, 'getRegisterPage']); //Affiche la page s'enregister
Route::match(['get', 'post'], '/loginToAccount', [Login::class, 'loginToAccount']); //Login
Route::match(['get', 'post'], '/createAccount', [Login::class, 'createAccount']); // Cree un compte
Route::get('personnel/en-attente-de-validation', [GetDefaultPage::class, 'getPage']); //personel en attente de validation
Route::get('/extra', [Login::class, 'getExtraPage']); //personel en attente de validation
Route::match(['get', 'post'], '/addEmployeeFromExtra', [Login::class, 'addEmployeeFromExtra']);

Route::group(['middleware' => 'mymiddleware'], function(){
    //  Admin page par défault
    Route::get('admin/acceuil', [GetDefaultPage::class, 'getAdminHomePage']); //page d'acceuil pour admin
    Route::get('admin/mes-informations', [GetDefaultPage::class, 'getAboutMePage']); //informations pour admin
    Route::get('admin/plus-de-personnel', [GetDefaultPage::class, 'getAddEmployeePage']); //ajout de nouveau personnel pour admin
    Route::get('admin/mon-demande', [GetDefaultPage::class, 'getMyRequestPage']); //page d'ajout d'une nouvelle demande
    Route::get('admin/mes-demandes', [GetDefaultPage::class, 'getMyRequest']);//a propos des demandes pour l'admin
    Route::get('admin/email', [GetDefaultPage::class, 'getEmailPage']); //page d'envoi d'email

    Route::get('personnel/acceuil', [GetDefaultPage::class, 'getEmployeeHomePage']); //page d'acceuil pour employee
    Route::get('personnel/demande', [GetDefaultPage::class, 'getEmployeeRequestPage']); //page d'acceuil pour employee
    Route::get('personnel/mes-demandes', [GetDefaultPage::class, 'getAllMyRequestPage']); //page d'acceuil pour employee
    Route::get('personnel/mon-profil/mis-à-jour', [GetDefaultPage::class, 'getUpPage']); // page mis mis à jour pour personnel
    //  Admin page par défault

    //Autre
    Route::get('admin/personnel/listes', [Show::class, 'getEmployeeList']);//Affiche la liste des personnels
    Route::get('admin/demande/listes', [Show::class, 'getRequestList']);//Affiche la liste des demandes
    Route::get('admin/personnel/abscents', [Show::class, 'getMissingEmployeeList']);//Affiche la liste des personnels abscents
    Route::get('admin/demande/acceptées', [Show::class, 'getAcceptedRequest']);//Affiche la liste des demandes acceptées
    Route::get('admin/personnel/presents', [Show::class, 'getPresentEmployeeList']);//Affiche la liste des personnels presents
    Route::get('admin/demande/refusées', [Show::class, 'getDeniedRequest']);//Affiche la liste des demandes refusées
    Route::get('admin/personnel/en-congées', [Show::class, 'getEmployeeInHoliday']);//Affiche la liste des demandes refusées
    Route::get('admin/demandes/en-attente', [Show::class, 'getWaitingRequest']);//Affiche la liste des demandes en attente
    Route::get('admin/personnel/inactifs', [Show::class, 'getInactiveEmployee']);//Affiche la liste des demandes inactifs
    Route::get('/personnel/matricule={matricule}/a-propos', [Show::class, 'getAboutSomeone']);//Affiche la liste des demandes inactifs
    Route::get('/personnel/matricule={matricule}/ses-demandes', [Show::class, 'getRequestOfSomeone']);
    //Autre


    // Action
    Route::get('admin/mon-profil/mis-à-jour', [GetDefaultPage::class, 'getUpdatePage']);//affiche la page mis à jour le profil admin
    Route::match(['get', 'post'], '/updateProfile', [Admin::class, 'updateProfile']);//met à jour le profil admin
    Route::match(['get', 'post'], '/new-request', [Admin::class, 'newRequest']); //ajout d'une demande pour admin
    Route::match(['get', 'post'], '/new-count', [Admin::class, 'newCount']); //nouveau decompte congé pour admin
    Route::match(['get', 'post'], '/sendMail', [SendMail::class, 'sendMail']);
    Route::match(['get', 'post'], '/updateMyProfile', [Employee::class, 'updateMyProfile']);//met à jour le profil employée
    Route::match(['get', 'post'], '/add-new-request', [Employee::class, 'addNewRequest']);//ajout d'une demande pour employée
    Route::match(['get', 'post'], '/add-new-count', [Employee::class, 'addNewCount']);//nouveau decompte congé pour employée
    Route::get('valider/{matricule}', [Admin::class, 'makeActive']);//valider une demande
    Route::get('rejetez/{id_conge}', [Admin::class, 'deniedRequest']);//refuser une demande
    Route::get('/{matricule}/Approuvez/{id_conge}/{annee_abs}', [Admin::class, 'AcceptRequest']);//Accepter une demande
    Route::match(['get', 'post'], '/addEmployee', [Admin::class, 'addEmployee']); //ajouter un nouveau personnel
    Route::get('/wanna-work', [Admin::class, 'work']);

    //Action


    Route::get('logout', [Login::class, 'logout']);
});
Route::get('personnel/pdf', [GetDefaultPage::class, 'getPdfPage']);





