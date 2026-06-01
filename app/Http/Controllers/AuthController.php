<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\CodeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    public function register()
    {
        return view('Authentification.register');
    }

    //function pour cree un utilisateur


    public function store(RegisterRequest $request)
    {
        $data = $request->validated();

        //generation du code aleatoire
        $code = rand(100000, 999999);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'telephone' => $data['telephone'],
            'roles' => 'user',
            'verification_code' => $code,

        ]);

        //envoie du mail
        Mail::to($user->email)->send(new CodeMail($user, $code));
        return redirect()->route('code.page')->with('succes', 'Un code de vérification vous a été envoyé par email !');
    }

    //fonction de verification
    //afficher la page de saisie du code
    public function showverify()
    {
        return view('verifycode');
    }


    public function Verify(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'verification_code' => ['required', 'numeric', 'digits:6'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // On cherche l'utilisateur avec son email
        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Utilisateur introuvable.']);
        }

        // On vérifie le code à 6 chiffres
        if ($user->verification_code == $data['verification_code']) {

            $user->email_verified_at = now();
            $user->verification_code = null;

            // ON RAJOUTE : On enregistre le vrai mot de passe choisi par l'utilisateur !
            $user->password = Hash::make($data['password']);

            $user->save();



            // 🔴 REVOLUTION : On connecte l'utilisateur AUTOMATIQUEMENT ici
            Auth::login($user);

            // Et on le renvoie là où il était (sur le détail du logement)
            // ou par défaut sur l'accueil du site s'il n'y a pas de page précédente
            return redirect()->intended('/')->with('succes', 'Votre compte est validé ! Vous pouvez maintenant demander votre location.');
        }


        // Si le code tapé est faux
        return redirect()->back()
            ->withErrors(['verification_code' => 'Le code de vérification est incorrect.'])
            ->withInput();
    }


    //fonction pour afficher la page de login

    public function login()
    {
        return view('Authentification.login');
    }

    public function Authentificate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Vérification du code d'activation

            if ($user->email_verified_at === null) {
                //On stocke l'email avant de déconnecter pour ne pas le perdre
                $email = $user->email;

                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                // On redirige vers la page du code en conservant l'adresse e-mail saisie
                return redirect()->route('code.page')
                    ->with('temporary_email', $email)
                    ->withErrors(['email' => 'Votre compte n’est pas encore activé. Veuillez entrer le code reçu par e-mail.']);
            }

            $request->session()->regenerate();

            // REDIRECTION SÉCURISÉE SELON LE RÔLE
            if ($user->roles === 'admin') {
                return redirect()->route('admin.dashboard')->with('succes', 'Bienvenue sur votre espace Administrateur.');
            } elseif ($user->roles === 'gestionnaire') {
                return redirect()->route('gestionnaire.dashboard')->with('succes', 'Bienvenue sur votre espace Gestionnaire.');
            } elseif ($user->roles === 'locataire') {
                // ICI, on vérifie STRICTEMENT que c'est un vrai locataire
                return redirect()->route('dash-locataire')->with('succes', 'Bienvenue sur votre espace Locataire.');
            } else {
                // SÉCURISÉ & PRO : Le rôle est inconnu ou vide, on l'envoie sur la page d'attente
                // return redirect()->route('attente.role');
                // Dans ton AuthController (ou ton middleware) au moment de bloquer le simple user :
                return redirect()->route('attente.role', ['logement_id' => $request->input('logement_id')]);
            }
        }

        return redirect()->back()->withErrors(['email' => 'Identifiants incorrects.'])->withInput();
    }


    //fonction logout

    public function logout(Request $request)
    {
        // Déconnexion de l'utilisateur de l'application
        Auth::logout();

        //Destruction complète de la session actuelle (efface les données)
        $request->session()->invalidate();

        // 3. Régénération du jeton CSRF (sécurité contre le vol de session)
        $request->session()->regenerateToken();

        // 4. Redirection vers la page de connexion avec un message de succès
        return redirect()->route('home')->with('succes', 'Vous avez été déconnecté avec succès.');
    }
}
