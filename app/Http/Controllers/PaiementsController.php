<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Paiements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaiementsController extends Controller
{
    //
    //POUR LE LOCATAIRE : Voir ses paiements et accéder au formulaire
    public function indexLocataire()
    {
        // On récupère les paiements du locataire connecté
        $paiements = Paiements::where('user_id', Auth::id())->latest()->get();

        // On cherche son contrat actif pour connaître son logement et le montant à payer
        $contrat = Contrat::where('user_id', Auth::id())->where('statut', 'actif')->first();

        return view('Paement.locataire', compact('paiements', 'contrat'));
    }

    //  POUR LE LOCATAIRE : Enregistrer sa déclaration de paiement
    public function storePaiement(Request $request)
    {
        $request->validate([
            'montant' => 'required|numeric',
            'mois' => 'required|string',
            'methode' => 'required|string',
            'logement_id' => 'required'
        ]);

        Paiements::create([
            'user_id' => Auth::id(),
            'logement_id' => $request->logement_id,
            'montant' => $request->montant,
            'mois' => $request->mois,
            'methode' => $request->methode,
            'statut' => 'en_attente', // Par défaut
        ]);

        return redirect()->back()->with('succes', 'Votre déclaration de paiement a bien été envoyée au gestionnaire.');
    }

    // POUR LE GESTIONNAIRE / ADMIN : Voir tous les paiements à valider
    public function indexGestionnaire()
    {
        // On récupère tous les paiements pour les afficher sur le tableau de bord
        $paiements = Paiements::with(['user', 'logement'])->latest()->get();
        return view('Paement.gestionnaire', compact('paiements'));
    }

    // Valider le paiement
    public function valider($id)
    {
        $paiement = Paiements::findOrFail($id);
        $paiement->update(['statut' => 'valide']);

        return redirect()->back()->with('succes', 'Le paiement a été validé avec succès.');
    }
}
