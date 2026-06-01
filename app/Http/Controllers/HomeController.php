<?php

namespace App\Http\Controllers;

use App\Models\Logement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index() {
    // On récupère les logements récents par exemple
    $logements = Logement::latest()->take(6)->get();

    return view('pages.Home.homes', compact('logements'));
}
}
