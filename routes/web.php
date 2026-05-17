<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('/', 'pages.Home.home')->name('home');
Route::view('/logement', 'pages.Logement.logement')->name('logement');
Route::view('/detail-logement', 'pages.Logement.detail')->name('logement.detail');
Route::view('/apropos', 'pages.apropos')->name('apropos');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/visit', 'pages.visit')->name('visit');
Route::view('/google', 'pages.google')->name('google');
Route::view('/das', 'pages.das')->name('das');


