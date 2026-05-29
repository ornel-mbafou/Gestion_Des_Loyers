<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\StoreUserRequest;
use App\Mail\CodeMail;
use App\Models\User;
use Illuminate\Http\Request;
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
    // 1. On prépare la requête de base pour récupérer les utilisateurs
    $query = User::query();

    // 2. 🚀 On vérifie si un filtre "role" est présent dans l'URL (ex: ?role=locataire)
    if ($request->has('role') && !empty($request->role)) {
        // On filtre la requête : la colonne 'roles' doit être égale au paramètre reçu
        $query->where('roles', $request->role);
    }

    // 3. On récupère les utilisateurs (triés du plus récent au plus ancien)
    $users = $query->latest()->get(); // ou ->paginate(10) si tu veux une pagination

    // 4. On renvoie vers ta vue habituelle de listing
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
        ]);
        Mail::to($user->email)->send(new CodeMail($user, $code));

        return redirect()->route('users.list')
            ->with('succes', 'Utilisateur ajouté avec succès');
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

    return redirect()->route('users.list')
        ->with('succes', 'Utilisateur modifié avec succès');
}


    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.list')
            ->with('succes', 'Utilisateur supprimé avec succès');
    }
}
