<?php

namespace App\Http\Controllers;

use App\Models\Logement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogementController extends Controller
{
    //
    public function pageLogement()
    {
        try {
            //  On récupère tous les logements disponibles pour le catalogue
            $logements = Logement::where('statut', 'disponible')->latest()->get();

            return view('pages.Logement.logement', compact('logements'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur de chargement de la page logement.');
        }
    }




    public function showPublic($id)
    {
        try {
            $logement = Logement::findOrFail($id);

            // Renvoie vers une vue publique pour les détails (ex: pages/vitrine/detail.blade.php)
            return view('pages.Logement.detail', compact('logement'));
        } catch (\Exception $e) {
            return redirect()->route('logement.detail')->with('error', 'Ce logement n\'est plus disponible.');
        }
    }





    public function index()
    {
        try {
            $user = Auth::user();

            if ($user->roles === 'admin') {
                // 🤵 L'admin voit absolument tout
                $logements = Logement::all();
            } elseif ($user->roles === 'gestionnaire') {
                // 💼 Le gestionnaire ne voit que ses logements mis en gestion
                $logements = Logement::where('gestionnaire_id', $user->id)->get();
            } else {
                // 🔑 Le locataire voit uniquement le(s) logement(s) lié(s) à ses contrats actifs
                // On passe par une requête relationnelle ou un filtre direct sur la table des contrats
                $logements = Logement::whereHas('contrats', function ($query) use ($user) {
                    $query->where('user_id', $user->id)->where('statut', 'actif');
                })->get();
            }

            return view('pages.Logement.list', compact('logements'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la récupération des logements.');
        }
    }



    public function create()
    {
        try {
            return view('pages.Logement.create');
        } catch (\Exception $e) {
            // Gérer les erreurs, par exemple en affichant un message d'erreur
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'affichage du formulaire de création de logement.');
        }
    }

    public function store(Request $request)
    {
        // 1️⃣ ÉTAPE 1 : Valider obligatoirement les données (évite les crashs SQL cachés)
        $validated = $request->validate([
            'titre'         => 'required|string|max:255',
            'description'   => 'required|string',
            'addresse'       => 'required|string',
            'type'          => 'required|string',
            'superficie'    => 'required|numeric',
            'nombre_pieces' => 'required|integer',
            'prix'          => 'required|numeric',
            'image1'        => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // Image 1 obligatoire
            'image2'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Optionnelle
            'image3'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Optionnelle
        ]);

        try {
            $logement = new Logement();
            $logement->titre         = $request->input('titre');
            $logement->description   = $request->input('description');
            $logement->addresse       = $request->input('addresse');
            $logement->type          = $request->input('type');
            $logement->superficie    = $request->input('superficie');
            $logement->nombre_pieces = $request->input('nombre_pieces');
            $logement->prix          = $request->input('prix');
            $logement->statut        = 'disponible';

            // 2️⃣ ÉTAPE 2 : Traitement correct et sécurisé des fichiers téléversés
            if ($request->hasFile('image1')) {
                $logement->image1 = $request->file('image1')->store('logement_images', 'public');
            }

            if ($request->hasFile('image2')) {
                $logement->image2 = $request->file('image2')->store('logement_images', 'public');
            } else {
                $logement->image2 = null;
            }

            if ($request->hasFile('image3')) {
                $logement->image3 = $request->file('image3')->store('logement_images', 'public');
            } else {
                $logement->image3 = null;
            }

            // Associer au gestionnaire connecté
            $logement->gestionnaire_id = Auth::id();

            // Enregistrer dans la base de données
            $logement->save();

            if (Auth::user()->roles === 'admin') {
                return redirect()->route('admin.logement.list')->with('success', 'Logement créé par l\'admin');
            } else {
                return redirect()->route('gestionnaire.logement.list')->with('success', 'Votre logement a bien été ajouté');
            }
        } catch (\Exception $e) {

            //dd($e->getMessage());

            return redirect()->back()->with('errors', 'Une erreur est survenue lors de la création du logement.');
        }
    }

    public function show($id)
    {
        try {
            $logement = Logement::findOrFail($id);
            $user = Auth::user();

            // 🔒 SÉCURITÉ COMPLÈTE SELON LES RÔLES
            if ($user->roles === 'gestionnaire' && $logement->gestionnaire_id !== $user->id) {
                // 1. Le gestionnaire ne peut voir que SES logements
                return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à voir ce logement.');
            }

            if ($user->roles === 'locataire') {
                // 2. Le locataire ne peut voir le logement QUE s'il y a un contrat lié à son compte
                $aUnContrat = $logement->contrats()->where('user_id', $user->id)->exists();

                if (!$aUnContrat) {
                    return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à voir ce logement.');
                }
            }

            // Si l'utilisateur est Admin, il passe tout droit sans blocage.

            return view('pages.Logement.detail', compact('logement'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la récupération du logement.');
        }
    }

    public function edit($id)
    {
        try {
            $logement = Logement::findOrFail($id);

            // 🔒 SÉCURITÉ : Un gestionnaire ne peut pas modifier le logement d'un autre
            if (Auth::user()->roles !== 'admin' && $logement->gestionnaire_id !== Auth::id()) {
                return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à modifier ce logement.');
            }

            return view('pages.Logement.edit', compact('logement'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la récupération du logement pour l\'édition.');
        }
    }

    public function update(Request $request, $id)
    {
        // 1️⃣ Toujours valider les données, comme dans le store !
        $request->validate([
            'titre'         => 'required|string|max:255',
            'description'   => 'required|string',
            'addresse'       => 'required|string',
            'type'          => 'required|string',
            'superficie'    => 'required|numeric',
            'nombre_pieces' => 'required|integer',
            'prix'          => 'required|numeric',
            'image1'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image2'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image3'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        try {
            $logement = Logement::findOrFail($id);

            // 🔒 SÉCURITÉ : Empêcher la modification malveillante via l'API/URL
            if (Auth::user()->roles !== 'admin' && $logement->gestionnaire_id !== Auth::id()) {
                return redirect()->back()->with('error', 'Action non autorisée.');
            }

            $logement->titre = $request->input('titre');
            $logement->description = $request->input('description');
            $logement->addresse = $request->input('addresse');
            $logement->type = $request->input('type');
            $logement->superficie = $request->input('superficie');
            $logement->nombre_pieces = $request->input('nombre_pieces');
            $logement->prix = $request->input('prix');

            // Sauvegarde des nouvelles images si elles sont fournies
            if ($request->hasFile('image1')) {
                $logement->image1 = $request->file('image1')->store('logement_images', 'public');
            }
            if ($request->hasFile('image2')) {
                $logement->image2 = $request->file('image2')->store('logement_images', 'public');
            }
            if ($request->hasFile('image3')) {
                $logement->image3 = $request->file('image3')->store('logement_images', 'public');
            }

            $logement->save();

            // 🚀 REDIRECTION DYNAMIQUE SELON LE RÔLE
            if (Auth::user()->roles === 'admin') {
                return redirect()->route('admin.logement.list')->with('succes', 'Logement mis à jour par l\'administrateur.');
            } else {
                return redirect()->route('gestionnaire.logement.list')->with('succes', 'Votre logement a bien été mis à jour.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour du logement.');
        }
    }

    public function destroy($id)
    {
        try {
            $logement = Logement::findOrFail($id);

            // 🔒 SÉCURITÉ : Un gestionnaire ne peut pas supprimer le logement d'un autre
            if (Auth::user()->roles !== 'admin' && $logement->gestionnaire_id !== Auth::id()) {
                return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à supprimer ce logement.');
            }

            $logement->delete();

            // 🚀 REDIRECTION DYNAMIQUE SELON LE RÔLE
            if (Auth::user()->roles === 'admin') {
                return redirect()->route('admin.logement.list')->with('succes', 'Logement supprimé avec succès.');
            } else {
                return redirect()->route('gestionnaire.logement.list')->with('succes', 'Votre logement a été supprimé.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression du logement.');
        }
    }
}
