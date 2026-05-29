<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisiteController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//route authentification
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logins', [AuthController::class, 'Authentificate'])->name('logins');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register-store', [AuthController::class, 'store'])->name('register.store');
Route::get('/showverify', [AuthController::class, 'showverify'])->name('code.page');
Route::post('/verify', [AuthController::class, 'Verify'])->name('verify');

//Dashboard

// Route::view('/dash-admin', 'admin.dashboard')->name('admin.dashboard');
// Route::view('/dash-gestionnaire', 'gestionnaire.dashboard')->name('gestionnaire.dashboard');
// Route::view('/dash-locataire', 'locataire.dashboard')->name('locataire.dashboard');
// Route::view('/Attente', 'Authentification.attenterole')->name('attente.role');



//  Uniquement l'admin
Route::middleware('role:admin')->group(function () {
    Route::view('/dash-admin', 'admin.dashboard')->name('admin.dashboard');
});

//  Le gestionnaire OU l'admin
Route::middleware('role:gestionnaire,admin')->group(function () {
    Route::view('/dash-gestionnaire', 'gestionnaire.dashboard')->name('gestionnaire.dashboard');
});

//  Le locataire OU l'admin
Route::middleware('role:locataire,admin')->group(function () {
    Route::view('/dash-locataire', 'locataire.dashboard')->name('dash-locataire');
});

// N'importe quel utilisateur connecté (sans distinction de rôle)
Route::middleware('auth')->group(function () {
    Route::view('/Attente', 'Authentification.attenterole')->name('attente.role');
});



// Route vitrine

Route::view('/', 'pages.Home.homes')->name('home');
Route::view('/logement', 'pages.Logement.logement')->name('logement');
Route::view('/detail-logement', 'pages.Logement.detail')->name('logement.detail');
Route::view('/apropos', 'pages.apropos')->name('apropos');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/visit', 'pages.visit')->name('visit');


//Route User
Route::get('dash-admin/list-users', [UserController::class, 'list'])->name('users.list');
Route::get('dash-admin/create-users', [UserController::class, 'create'])->name('users.create');
Route::post('dash-admin/store-users', [UserController::class, 'store'])->name('users.store');
Route::get('dash-admin/edit-users/{user}', [UserController::class, 'edit'])->name('users.edit');
Route::post('update-users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('delete-users/{user}', [UserController::class, 'destroy'])->name('users.delete');


//Route Visite
// Route pour afficher le formulaire (on passe l'ID du logement dans l'URL)
Route::get('/logements/{logement}/visite', [VisiteController::class, 'create'])->name('visites.create');

// Route pour enregistrer le formulaire
Route::post('/visites', [VisiteController::class, 'store'])->name('visites.store');


