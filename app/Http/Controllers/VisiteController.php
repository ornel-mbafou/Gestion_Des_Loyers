<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisiteRequest;
use App\Models\Logement;
use App\Models\Visite;
use Illuminate\Http\Request;

class VisiteController extends Controller
{
    //
    public function create($logement_id)
    {
        // On cherche le logement, s'il n'existe pas -> erreur 404
        $logement = Logement::findOrFail($logement_id);

        // On renvoie ta vue en lui passant le logement
        return view('visites.create', compact('logement'));
    }

    /**
     * Enregistre la demande de visite en base de données
     */
    public function store(VisiteRequest $request)
    {
        // 1. Validation stricte des données reçues du formulaire
        $data = $request->validated();

        // 2. Trouver le logement pour connaître son gestionnaire
        $logement = Logement::find($data['logement_id']);

        // 3. Création de la visite
        Visite::create([
            'logement_id' => $data['logement_id'],
            'user_id' => $logement->gestionnaire_id, // Lié automatiquement au gestionnaire du bien !
            'nom_visiteur' => $data['nom_visiteur'],
            'telephone_visiteur' => $data['telephone_visiteur'],
            'date_visite' => $data['date_visite'],
            'commentaire' => $data['commentaire'],
            'statut' => 'en_attente', // Statut par défaut
        ]);


        return redirect()->route('home')
            ->with('succes', 'Votre demande de visite a bien été envoyée ! Un gestionnaire vous contactera.');
    }
}

