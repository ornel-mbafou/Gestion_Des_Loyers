<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogementController;
use App\Http\Controllers\UserController;
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

// Route::view('/', 'pages.Home.homes')->name('home');
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


// Route Logement
Route::get('dash-admin/logement', [LogementController::class, 'index'])->name('logement.list');
Route::get('dash-admin/create-logement', [LogementController::class, 'create'])->name('logement.create');
Route::post('dash-admin/store-logement', [LogementController::class, 'store'])->name('logement.store');
Route::get('dash-admin/edit-logement/{id}', [LogementController::class, 'edit'])->name('logement.edit');
Route::post('update-logement/{id}', [LogementController::class, 'update'])->name('logement.update');
Route::delete('delete-logement/{id}', [LogementController::class, 'destroy'])->name('logement.delete');
Route::get('dash-admin/detail-logement/{id}', [LogementController::class, 'show'])->name('logement.detail');
Route::get('dash-admin/delete/{id}', [LogementController::class, 'destroy'])->name('logement.delete');

// Route Logement
Route::get('dash-gestionnaire/logement', [LogementController::class, 'index'])->name('logement.list');
Route::get('dash-gestionnaire/create-logement', [LogementController::class, 'create'])->name('logement.create');
Route::post('dash-gestionnaire/store-logement', [LogementController::class, 'store'])->name('logement.store');
Route::get('dash-gestionnaire/edit-logement/{id}', [LogementController::class, 'edit'])->name('logement.edit');
Route::post('update-logement/{id}', [LogementController::class, 'update'])->name('logement.update');
Route::delete('delete-logement/{id}', [LogementController::class, 'destroy'])->name('logement.delete');
Route::get('dash-gestionnaire/detail-logement/{id}', [LogementController::class, 'show'])->name('logement.detail');
Route::get('dash-gestionnaire/delete/{id}', [LogementController::class, 'destroy'])->name('logement.delete');
