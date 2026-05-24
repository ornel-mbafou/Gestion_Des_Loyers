<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Gère la requête entrante.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // 2. Vérifier si son rôle est dans la liste autorisée
        if (in_array(Auth::user()->roles, $roles)) {
            return $next($request);
        }

        // 3. Sinon, on le bloque et on envoie l'erreur pour SweetAlert2
        return redirect()->route('login')->withErrors(['access' => 'Accès non autorisé à cet espace.']);
    }
}
