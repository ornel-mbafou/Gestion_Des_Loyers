<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisiteRequest;
use App\Mail\NotificationVisite;
use App\Models\Contrat;
use App\Models\Logement;
use App\Models\User;
use App\Models\Visite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VisiteController extends Controller
{
    //






    public function create(int $logement_id)
    {
        // On cherche le logement, s'il n'existe pas -> erreur 404
        $logement = Logement::findOrFail($logement_id);

        // On renvoie la vue en lui passant le logement
        return view('pages.visit', compact('logement'));
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
            'email_visiteur' => $data['email_visiteur'],
            'date_visite' => $data['date_visite'],
            'commentaire' => $data['commentaire'],
            'statut' => 'en_attente', // Statut par défaut
        ]);


        return redirect()->route('home')
            ->with('succes', 'Votre demande de visite a bien été envoyée ! Un gestionnaire vous contactera.');
    }


    // 1. Afficher les visites sur le tableau de bord
    public function index()
    {
        $user = Auth::user();

        // Si c'est un locataire, on filtre par son email (ou son user_id)
        if ($user->roles === 'locataire') {
            $visites = Visite::with('logement')
                ->where('email_visiteur', $user->email) // Ou ->where('user_id', $user->id) selon ta structure
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            // L'admin (et le gestionnaire) voient TOUTES les visites
            $visites = Visite::with('logement')
                ->orderBy('created_at', 'desc')
                ->get();
        }

        // On retourne la vue (ajuste le chemin si nécessaire, ex: 'shared.visites')
        return view('gestionnaire.visites', compact('visites'));
    }
    // 2. Accepter la visite
    public function accepter($id)
    {
        $visite = Visite::findOrFail($id);
        $visite->update(['statut' => 'effectuee']); // On change le statut en base de données

        // 🚀 ENVOI DU MAIL AUTOMATIQUE
        Mail::to($visite->email_visiteur)->send(new NotificationVisite($visite));

        return redirect()->back()->with('succes', 'La visite a été confirmée et un mail a été envoyé au visiteur !');
    }

    // 3. Refuser la visite
    public function refuser($id)
    {
        $visite = Visite::findOrFail($id);
        $visite->update(['statut' => 'annulee']); // On change le statut en base de données
        // 🚀 ENVOI DU MAIL AUTOMATIQUE
        Mail::to($visite->email_visiteur)->send(new NotificationVisite($visite));

        return redirect()->back()->with('succes', 'La visite a été refusée et un mail d\'annulation a été envoyé.');
    }
}
