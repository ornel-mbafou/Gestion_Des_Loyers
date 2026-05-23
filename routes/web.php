<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//route authentification
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');

// Route vitrine

Route::view('/', 'pages.Home.homes')->name('home');
Route::view('/logement', 'pages.Logement.logement')->name('logement');
Route::view('/detail-logement', 'pages.Logement.detail')->name('logement.detail');
Route::view('/apropos', 'pages.apropos')->name('apropos');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/visit', 'pages.visit')->name('visit');
Route::view('/das', 'pages.das')->name('das');


// Route::get('/',[HomeController::class, 'index']);


