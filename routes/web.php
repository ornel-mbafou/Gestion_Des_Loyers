<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogementController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisiteController;
use App\Http\Controllers\PaiementsController;
use Illuminate\Support\Facades\Route;

// ==========================================
// ROUTES PUBLIQUES (VITRINE)
// ==========================================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/logement', [LogementController::class, 'pageLogement'])->name('logement');
Route::get('/nos-logements/{id}', [LogementController::class, 'showPublic'])->name('logement.detail');

Route::view('/apropos', 'pages.apropos')->name('apropos');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/visit', 'pages.visit')->name('visit');

// Formulaire de demande de visite publique
Route::get('/logements/{logement}/visite', [VisiteController::class, 'create'])->name('visites.create');
Route::post('/visites', [VisiteController::class, 'store'])->name('visites.store');

// ==========================================
// AUTHENTIFICATION
// ==========================================
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logins', [AuthController::class, 'Authentificate'])->name('logins');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register-store', [AuthController::class, 'store'])->name('register.store');
Route::get('/showverify', [AuthController::class, 'showverify'])->name('code.page');
Route::post('/verify', [AuthController::class, 'Verify'])->name('verify');

// ==========================================
// ROUTES SÉCURISÉES (CONNECTÉS)
// ==========================================
Route::middleware(['auth'])->group(function () {

    // Attente de rôle
    Route::view('/Attente', 'Authentification.attenterole')->name('attente.role');

    // Postuler pour une location
    Route::post('/logements/{logement}/postuler', [ContratController::class, 'postuler'])->name('logements.postuler');


    // 🤵 UNIQUEMENT L'ADMINISTRATEUR
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/dash-admin', [DashboardController::class, 'dashboardA'])->name('admin.dashboard');

        // Gestion des utilisateurs
        Route::get('dash-admin/list-users', [UserController::class, 'list'])->name('admin.users.list');
        Route::get('dash-admin/create-users', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('dash-admin/store-users', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('dash-admin/edit-users/{user}', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::post('dash-admin/update-users/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('dash-admin/delete-users/{user}', [UserController::class, 'destroy'])->name('admin.users.delete');


        //Route profil admin

        Route::get('/dash-admin/mon-profil', [ProfilController::class, 'show'])->name('admin.profile.show');
        Route::post('/dash-admin/mon-profil/update', [ProfilController::class, 'update'])->name('profile.update');

        // Gestion des logements
        Route::get('dash-admin/list-logements', [LogementController::class, 'index'])->name('admin.logement.list');
        Route::get('dash-admin/create-logement', [LogementController::class, 'create'])->name('admin.logement.create');
        Route::post('dash-admin/store-logement', [LogementController::class, 'store'])->name('admin.logement.store');
        Route::get('dash-admin/edit-logement/{id}', [LogementController::class, 'edit'])->name('admin.logement.edit');
        Route::post('dash-admin/update-logement/{id}', [LogementController::class, 'update'])->name('admin.logement.update');
        Route::delete('dash-admin/delete-logement/{id}', [LogementController::class, 'destroy'])->name('admin.logement.delete');
        Route::get('dash-admin/detail-logement/{id}', [LogementController::class, 'show'])->name('admin.logement.detail');

        // Gestion des visites
        Route::get('/dash-admin/visites', [VisiteController::class, 'index'])->name('admin.visites.index');
        Route::post('/dash-admin/visites/{id}/accepter', [VisiteController::class, 'accepter'])->name('admin.visites.accepter');
        Route::post('/dash-admin/visites/{id}/refuser', [VisiteController::class, 'refuser'])->name('admin.visites.refuser');

        // Gestion des contrats
        Route::get('dash-admin/contrats', [ContratController::class, 'adminIndex'])->name('admin.contrats.index');
        Route::post('dash-admin/contrats/{contrat}/valider', [ContratController::class, 'adminValider'])->name('admin.contrats.valider');
        Route::post('dash-admin/contrats/{contrat}/refuser', [ContratController::class, 'adminRefuser'])->name('admin.contrats.refuser');


        // paiements
        Route::get('/dash-admin/gestion-paiements', [PaiementsController::class, 'indexGestionnaire'])->name('admin.paiements.index');
        Route::post('/dash-admin/paiements/{id}/valider', [PaiementsController::class, 'valider'])->name('admin.paiements.valider');

    });







    //  GESTIONNAIRE ET ADMIN
    Route::middleware(['role:gestionnaire,admin'])->group(function () {
        Route::get('/dash-gestionnaire', [DashboardController::class, 'dashboardG'])->name('gestionnaire.dashboard');

        // Gestion des utilisateurs par le gestionnaire
        Route::get('dash-gestionnaire/list-users', [UserController::class, 'list'])->name('gestionnaire.users.list');
        Route::get('dash-gestionnaire/create-users', [UserController::class, 'create'])->name('gestionnaire.users.create');
        Route::post('dash-gestionnaire/store-users', [UserController::class, 'store'])->name('gestionnaire.users.store');
        Route::get('dash-gestionnaire/edit-users/{user}', [UserController::class, 'edit'])->name('gestionnaire.users.edit');
        Route::post('dash-gestionnaire/update-users/{user}', [UserController::class, 'update'])->name('gestionnaire.users.update');
        Route::delete('dash-gestionnaire/delete-users/{user}', [UserController::class, 'destroy'])->name('gestionnaire.users.delete');


        //Route profil gestionnaire

        Route::get('/dash-gestionnaire/mon-profil', [ProfilController::class, 'show'])->name('gestionnaire.profile.show');
        Route::post('/dash-gestionnaire/mon-profil/update', [ProfilController::class, 'update'])->name('profile.update');

        // Visites
        Route::get('/dash-gestionnaire/visites', [VisiteController::class, 'index'])->name('gestionnaire.visites.index');
        Route::post('/gestionnaire/visites/{id}/accepter', [VisiteController::class, 'accepter'])->name('gestionnaire.visites.accepter');
        Route::post('/gestionnaire/visites/{id}/refuser', [VisiteController::class, 'refuser'])->name('gestionnaire.visites.refuser');

        // Gestion des logements
        Route::get('dash-gestionnaire/list-logements', [LogementController::class, 'index'])->name('gestionnaire.logement.list');
        Route::get('dash-gestionnaire/create-logement', [LogementController::class, 'create'])->name('gestionnaire.logement.create');
        Route::post('dash-gestionnaire/store-logement', [LogementController::class, 'store'])->name('gestionnaire.logement.store');
        Route::get('dash-gestionnaire/edit-logement/{id}', [LogementController::class, 'edit'])->name('gestionnaire.logement.edit');
        Route::post('dash-gestionnaire/update-logement/{id}', [LogementController::class, 'update'])->name('gestionnaire.logement.update');
        Route::delete('dash-gestionnaire/delete-logement/{id}', [LogementController::class, 'destroy'])->name('gestionnaire.logement.delete');
        Route::get('dash-gestionnaire/detail-logement/{id}', [LogementController::class, 'show'])->name('gestionnaire.logement.detail');

        // Contrats
        Route::get('dash-gestionnaire/contrats', [ContratController::class, 'gestionnaireIndex'])->name('gestionnaire.contrats.index');
        Route::post('dash-gestionnaire/contrats/{contrat}/valider', [ContratController::class, 'adminValider'])->name('gestionnaire.contrats.valider');
        Route::post('dash-gestionnaire/contrats/{contrat}/refuser', [ContratController::class, 'adminRefuser'])->name('gestionnaire.contrats.refuser');


        // paiements
        Route::get('/dash-gestionnaire/gestion-paiements', [PaiementsController::class, 'indexGestionnaire'])->name('gestionnaire.paiements.index');
        Route::post('/dash-gestionnaire/paiements/{id}/valider', [PaiementsController::class, 'valider'])->name('gestionnaire.paiements.valider');
    });





    //  LOCATAIRE ET ADMIN
    Route::middleware(['role:locataire,admin'])->group(function () {
        Route::get('/dash-locataire', [DashboardController::class, 'dashboardL'])->name('dash-locataire');
        Route::get('/dash-locataire/mes-visites', [VisiteController::class, 'index'])->name('locataire.visites.index');
        Route::get('/dash-locataire/list-logements', [LogementController::class, 'index'])->name('locataire.logement.list');
        Route::get('/dash-locataire/detail-logement/{id}', [LogementController::class, 'show'])->name('locataire.logement.detail');
        Route::get('/dash-locataire/contrats', [ContratController::class, 'monContrat'])->name('locataire.contrats.index');


        //Route profil locataire

        Route::get('/dash-locataire/mon-profil', [ProfilController::class, 'show'])->name('locataire.profile.show');
        Route::post('/dash-locataire/mon-profil/update', [ProfilController::class, 'update'])->name('profile.update');

        // Route Paiement
        Route::get('/dash-locataire/mes-paiements', [PaiementsController::class, 'indexLocataire'])->name('locataire.paiements.index');
        Route::post('/dash-locataire/declarer-paiement', [PaiementsController::class, 'storePaiement'])->name('locataire.paiements.store');
    });
});
