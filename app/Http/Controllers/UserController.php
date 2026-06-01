<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\StoreUserRequest;
use App\Mail\CodeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    // public function list()
    // {

    //     $users = User::latest()->get();
    //     return view('users.list', compact('users'));
    // }

    public function list(Request $request)
    {
        $query = User::query();

        // Le cloisonnement intelligent pour le Gestionnaire
        if (Auth::user()->roles !== 'admin') {
            $gestionnaireId = Auth::id();

            $query->where(function ($q) use ($gestionnaireId) {
                // Condition A : Les utilisateurs que le gestionnaire a créés lui-même
                $q->where('gestionnaire_id', $gestionnaireId)

                    // OU Condition B : Les utilisateurs qui ont créé un compte en choisissant un logement de ce gestionnaire
                    // (On passe par la table 'contrats' ou la table 'logements' selon ta logique)
                    ->orWhereHas('contrats.logement', function ($subQuery) use ($gestionnaireId) {
                        $subQuery->where('gestionnaire_id', $gestionnaireId);
                        // Note : si ta colonne s'appelle user_id dans logements, remplace par 'user_id'
                    });
            });
        }

        // 2. Filtre par rôle si présent dans l'URL
        if ($request->has('role') && !empty($request->role)) {
            $query->where('roles', $request->role);
        }

        // 3. Récupération des données
        $users = $query->latest()->get();

        // 4. Renvoi vers la vue
        return view('users.list', compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(StoreUserRequest $request)
    {

        $data = $request->validated();

        //generation du code aleatoire
        $code = rand(100000, 999999);


        //upload dimage
        if ($request->hasFile('image')) { //verifier si le fichier a ete envoyer
            $images = $request->file('image')->store('users', 'public');
        } else {
            $images = null;
        }


        // 🚀 L'ASTUCE SÉCURITÉ : On récupère l'id de la personne actuellement connectée
        // auth()->id() permet de savoir quel gestionnaire est en train de cliquer sur le bouton
        $gestionnaireConnecteId = Auth::id();

        // dd($images);
        // 3. Création de l'utilisateur avec un mot de passe temporaire aléatoire
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'telephone' => $data['telephone'],
            'roles' => $data['roles'],
            'verification_code' => $code,
            'image' => $images,
            'password' => Hash::make(Str::random(16)), // mot de passe temporaire
            // 🚀 ON LIE LE LOCATAIRE AU GESTIONNAIRE ICI :
            // On remplit la colonne 'gestionnaire_id' avec l'ID du gestionnaire connecté
            'gestionnaire_id' => $gestionnaireConnecteId,
        ]);
        Mail::to($user->email)->send(new CodeMail($user, $code));

        // 🚀 NOUVELLE REDIRECTION DYNAMIQUE :
        if (Auth::user()->roles === 'admin') {
            // Si c'est l'admin connecté, on le redirige vers la liste de l'admin
            return redirect()->route('admin.users.list')
                ->with('succes', 'Utilisateur ajouté avec succès');
        } else {
            // Si c'est le gestionnaire, on le redirige vers sa propre liste à lui
            return redirect()->route('gestionnaire.users.list')
                ->with('succes', 'Locataire ajouté avec succès');
        }
    }



    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }



    public function update(StoreUserRequest $request, User $user)
    {
        // 1. Validation des données à la volée (sans mot de passe obligatoire)
        $data = $request->validated();

        // 2. Gestion de l'image
        if ($request->hasFile('image')) {
            // Supprime l'ancienne image du disque si elle existe
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            // Stocke la nouvelle image
            $data['image'] = $request->file('image')->store('users', 'public');
        } else {
            // Si aucune image n'est envoyée, on garde l'ancienne intacte
            $data['image'] = $user->image;
        }

        // 3. Application des modifications en base de données
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'telephone' => $data['telephone'],
            'roles' => $data['roles'],
            'image' => $data['image'], // 🔥 Ne pas oublier d'ajouter l'image ici !
        ]);
        // 🚀 REDIRECTION DYNAMIQUE APRÈS MODIFICATION :
        if (Auth::user()->roles === 'admin') {
            return redirect()->route('admin.users.list')
                ->with('succes', 'Utilisateur modifié avec succès');
        } else {
            return redirect()->route('gestionnaire.users.list')
                ->with('succes', 'Informations du locataire mises à jour');
        }
    }


    public function destroy(User $user)
    {
        $user->delete();

        if (Auth::user()->roles === 'admin') {
            return redirect()->route('admin.users.list')
                ->with('succes', 'Utilisateur supprimé avec succès');
        } else {
            return redirect()->route('gestionnaire.users.list')
                ->with('succes', 'Utilisateur supprimé avec succès');
        }
    }
}
