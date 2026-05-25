<!DOCTYPE html>
<html lang="fr" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte en attente - GEST-IMMO</title>
    <!-- Intégration de Tailwind CSS via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Police d'écriture moderne -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="flex min-h-full items-center justify-center p-4">

    <div class="w-full max-w-md rounded-3xl border border-slate-200 bg-white p-8 text-center shadow-lg sm:p-10">
        <!-- Icône Sablier Animée ou Statique -->
        <div class="mb-5 inline-flex h-20 w-20 items-center justify-center rounded-full bg-orange-50 text-4xl text-orange-500 animate-pulse">
            ⏳
        </div>

        <!-- Titre -->
        <h1 class="mb-4 text-2xl font-bold tracking-tight text-slate-900">
            Compte en attente de configuration
        </h1>

        <!-- Message principal -->
        <p class="text-[15px] leading-relaxed text-slate-600">
            Bonjour <span class="font-semibold text-slate-900">{{ auth()->user()->name }}</span>,<br><br>
            Votre inscription sur <span class="font-semibold text-orange-500">GEST-IMMO</span> a bien été prise en compte, mais aucun rôle (Locataire, Gestionnaire) ne vous a encore été attribué.
        </p>

        <!-- Note d'information -->
        <p class="mt-4 text-sm text-slate-400">
            Veuillez contacter votre gestionnaire ou l'administrateur du site pour activer vos accès.
        </p>

        <!-- Bouton Déconnexion / Retour -->
        <div class="mt-8">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="inline-block w-full rounded-xl bg-slate-900 px-6 py-3.5 text-sm font-semibold text-white shadow-xs hover:bg-slate-800 transition-colors duration-200 cursor-pointer">
                Retour
            </a>
        </div>

        <!-- Formulaire de déconnexion Laravel caché -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>

</body>
</html>
