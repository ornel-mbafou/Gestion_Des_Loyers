<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfilController extends Controller
{
    //
    /**
     * Afficher le profil de l'utilisateur connecté
     */
    public function show()
    {
        // On récupère directement l'utilisateur actuellement connecté
        $user = Auth::user();

        return view('Profil.show', compact('user'));
    }

    /**
     * Mettre à jour les informations du profil
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // 1. Validation des champs reçus
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:20'],

            // Validation optionnelle du mot de passe (uniquement s'il est rempli)
            'current_password' => ['nullable', 'required_with:new_password'],
            'new_password' => ['nullable', 'confirmed', Password::min(8)->mixedCase()->numbers()],
        ], [
            // 'name.required' => 'Le nom est obligatoire.',
            'new_password.confirmed' => 'La confirmation du nouveau mot de passe ne correspond pas.',
            'current_password.required_with' => 'Vous devez saisir votre mot de passe actuel pour le modifier.',
        ]);

        // 2. Mise à jour des informations de base
        $user->name = $request->name;
        $user->telephone = $request->telephone;

        // 3. Gestion de la sécurité (Changement de mot de passe)
        if ($request->filled('new_password')) {
            // Vérifier si le mot de passe actuel fourni est correct
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()
                    ->withErrors(['current_password' => 'Votre mot de passe actuel est incorrect.'])
                    ->withInput();
            }

            // Si c'est bon, on hache et on sauvegarde le nouveau mot de passe
            $user->password = Hash::make($request->new_password);
        }

        // 4. Sauvegarde en Base de Données
        $user->save();

        return redirect()->back()->with('succes', 'Votre profil a été mis à jour avec succès !');
    }
}
