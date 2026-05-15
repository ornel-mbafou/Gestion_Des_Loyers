<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('/', 'pages.Home.homes')->name('home');

// Route::get('/',[HomeController::class, 'index']);

