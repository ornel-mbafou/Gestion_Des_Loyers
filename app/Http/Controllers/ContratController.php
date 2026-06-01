<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Logement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContratController extends Controller
{
    //
    public function postuler(Logement $logement)
    {
        // 1. Vérifier si le logement est bien disponible
        if ($logement->statut !== 'disponible') {
            return redirect()->back()->with('error', 'Ce logement n\'est plus disponible.');
        }

        // 2. Vérifier si l'utilisateur n'a pas déjà une demande en cours pour ce logement
        $dejaPostule = Contrat::where('logement_id', $logement->id)
            ->where('user_id', Auth::id())
            ->where('statut', 'en_attente')
            ->exists();

        if ($dejaPostule) {
            return redirect()->back()->with('error', 'Vous avez déjà une demande en cours pour ce logement.');
        }

        // 3. Créer la demande de contrat (statut en_attente)
        Contrat::create([
            'logement_id' => $logement->id,
            'user_id' => Auth::id(),
            'date_debut' => now(), // Date par défaut, l'admin pourra la modifier
            'loyer_mensuel' => $logement->prix,
            'statut' => 'en_attente',
        ]);

        //  Mettre le logement "en attente" pour bloquer d'autres demandes
        //$logement->update(['statut' => 'en_attente']);

        return redirect()->back()->with('succes', 'Votre demande de location a bien été transmise à l\'administrateur.');
    }



    /**
     * =========================================================================
     * 2. CÔTÉ GESTIONNAIRE (SON TABLEAU DE BORD)
     * =========================================================================
     */

    // Afficher uniquement les demandes des logements du gestionnaire connecté
    // public function gestionnaireIndex()
    // {
    //     $gestionnaireId = Auth::id();

    //     $contrats = Contrat::with(['logement', 'locataire'])
    //         ->whereHas('logement', function ($query) use ($gestionnaireId) {
    //             // 'user_id' représente ici le gestionnaire propriétaire du logement
    //             $query->where('user_id', $gestionnaireId);
    //         })
    //         ->latest()
    //         ->get();

    //     return view('Contrat.list', compact('contrats'));
    // }


    public function gestionnaireIndex()
    {
        // 1. Récupérer l'ID du gestionnaire connecté
        $gestionnaire_id = Auth::id();

        // 2. Aller chercher les contrats liés aux logements de CE gestionnaire
        $contrats = Contrat::with(['logement', 'locataire'])
            ->whereHas('logement', function ($query) use ($gestionnaire_id) {
                // On filtre : le logement doit appartenir au gestionnaire connecté
                $query->where('gestionnaire_id', $gestionnaire_id);
            })
            ->latest() // Les plus récents en premier
            ->get();

        // 3. Envoyer ces données à la vue partagée qu'on a créée
        return view('Contrat.list', compact('contrats'));
    }






    // Afficher toutes les demandes reçues par l'admin
    // L'admin général voit absolument TOUTES les demandes et contrats du site
    public function adminIndex()
    {
        $contrats = Contrat::with(['logement', 'locataire'])->latest()->get();

        return view('Contrat.list', compact('contrats'));
    }



    // Valider le contrat
    public function adminValider(Contrat $contrat)
    {
        // 1. Passer le contrat en actif
        $contrat->update(['statut' => 'actif']);

        // 2. Passer le logement lié en "occupé"
        $contrat->logement->update(['statut' => 'loué']);

        // 3. AJOUTÉ : On récupère l'utilisateur qui a fait la demande et on change son rôle
        $locataire = $contrat->locataire;
        if ($locataire) {
            $locataire->update(['roles' => 'locataire']);
        }
        // $locataire->update(['roles' => 'locataire']);

        // 3. Optionnel : Annuler automatiquement les AUTRES demandes en attente sur CE MÊME logement
        Contrat::where('logement_id', $contrat->logement_id)
            ->where('statut', 'en_attente')
            ->update(['statut' => 'refuse']);

        return redirect()->back()->with('success', 'Le contrat a été validé. Le logement est désormais occupé.');
    }

    // Refuser le contrat
    public function adminRefuser(Contrat $contrat)
    {
        $contrat->update(['statut' => 'refuse']);

        return redirect()->back()->with('success', 'La demande de location a été refusée.');
    }

    public function monContrat()
    {
        // On cherche le contrat actif du locataire connecté
        $contrat = Contrat::with('logement')
            ->where('user_id', Auth::id())
            ->where('statut', 'actif')
            ->first();

        // 🚀 Si aucun contrat n'est trouvé, on retourne directement un message
        if (!$contrat) {
            return redirect()->route('locataire.dashboard')
                ->with('info', 'Vous n\'avez aucun contrat de location actif pour le moment.');
        }

        return view('contrat.show', compact('contrat'));
    }
}
