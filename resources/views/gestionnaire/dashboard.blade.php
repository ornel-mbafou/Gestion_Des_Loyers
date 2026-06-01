{{-- resources/views/gestionnaire/dashboard.blade.php --}}

@extends('layouts.dashboard')

@section('content')

<div class="p-8 bg-gray-100 min-h-screen">

    <!-- HEADER -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Dashboard Gestionnaire
        </h1>
        <p class="text-gray-500 mt-2">
            Bienvenue sur votre espace de gestion GEST-IMMO
        </p>
    </div>

    <!-- CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

        <div class="bg-white p-6 rounded-2xl shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Logements</p>
                    <h2 class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $totalLogements }}
                    </h2>
                </div>
                <div class="w-14 h-14 rounded-xl bg-orange-100 flex items-center justify-center text-orange-500 text-2xl">
                    <i class="fa-solid fa-building"></i>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Visites</p>
                    <h2 class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $totalVisites }}
                    </h2>
                </div>
                <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center text-blue-500 text-2xl">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Locataires</p>
                    <h2 class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $totalLocataires }}
                    </h2>
                </div>
                <div class="w-14 h-14 rounded-xl bg-green-100 flex items-center justify-center text-green-500 text-2xl">
                    <i class="fa-solid fa-users"></i>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Paiements</p>
                    <h2 class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $totalPaiements }}
                    </h2>
                </div>
                <div class="w-14 h-14 rounded-xl bg-red-100 flex items-center justify-center text-red-500 text-2xl">
                    <i class="fa-solid fa-money-bill-wave"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- TABLE + ACTIVITES -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        <!-- TABLE DYNAMIQUE -->
        <div class="xl:col-span-2 bg-white rounded-2xl shadow p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-800">
                    Dernières visites
                </h2>
                <!-- Lien vers la grande page de traitement des visites -->
                <a href="{{ route('gestionnaire.visites.index') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-xl transition text-sm font-medium">
                    Voir tout
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b text-sm">
                            <th class="text-left pb-4 text-gray-500">Client</th>
                            <th class="text-left pb-4 text-gray-500">Logement</th>
                            <th class="text-left pb-4 text-gray-500">Date</th>
                            <th class="text-left pb-4 text-gray-500">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y text-sm text-gray-700">
                        @forelse($dernieresVisites as $visite)
                        <tr>
                            <td class="py-4 font-medium text-gray-900">{{ $visite->nom_visiteur }}</td>
                            <td class="py-4 text-orange-500 font-medium">{{ $visite->logement->titre ?? 'Inconnu' }}</td>
                            <td class="py-4">{{ date('d/m/Y H:i', strtotime($visite->date_visite)) }}</td>
                            <td class="py-4">
                                @if($visite->statut == 'en_attente')
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">En attente</span>
                                @elseif($visite->statut == 'confirmee')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">Confirmée</span>
                                @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">Annulée</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="py-6 text-center text-gray-500">
                                Aucune demande de visite enregistrée.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ACTIVITES (Fictif pour la déco, ou à lier plus tard) -->
        <div class="bg-white rounded-2xl shadow p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-6">
                Activités récentes
            </h2>
            <div class="space-y-5">

                @forelse($dernieresVisites as $visite)
                <div class="flex gap-4 items-start">
                    {{-- Icône dynamique bleue pour les visites --}}
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-500 shrink-0">
                        <i class="fa-solid fa-calendar-check"></i>
                    </div>
                    <div>
                        {{-- Message dynamique avec les relations --}}
                        <p class="text-sm text-gray-800">
                            Demande de visite pour : <span class="font-medium text-gray-900">{{ $visite->logement->titre ?? 'Logement inconnu' }}</span>
                        </p>

                        {{-- Date formatée automatiquement de manière humaine (ex: il y a 2 heures) --}}
                        <span class="text-xs text-gray-500 block mt-0.5">
                            {{ $visite->created_at ? $visite->created_at->diffForHumans() : 'Date inconnue' }}
                        </span>
                    </div>
                </div>
                @empty
                {{-- Message de secours si aucune visite n'est enregistrée --}}
                <div class="text-center py-4 text-sm text-gray-400">
                    <i class="fa-solid fa-circle-info mb-2 text-lg block"></i>
                    Aucune activité récente pour le moment.
                </div>
                @endforelse

            </div>
        </div>

    </div>

</div>

@endsection
