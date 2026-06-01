@extends('layouts.dashboard')

@section('content')

<div class="p-6 lg:p-8 bg-gray-100 mt-2 min-h-screen">

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Tableau de bord Locataire
        </h1>
        <p class="text-gray-500 mt-2">
            Bienvenue sur votre espace GEST-IMMO, <span class="font-semibold text-gray-700">{{$user->name}}</span>
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">

        <div class="bg-white rounded-2xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Mon Logement</p>
                    <h2 class="text-xl font-bold text-gray-800 mt-2">
                        {{ $contratActif ? $contratActif->logement->titre : 'Aucun logement actif' }}
                    </h2>
                    @if($contratActif)
                    <span class="text-xs text-orange-500 font-medium block mt-1">
                        <i class="fa-solid fa-location-dot mr-1"></i>{{ $contratActif->logement->addresse }}
                    </span>
                    @endif
                </div>
                <div class="w-14 h-14 rounded-xl bg-orange-100 flex items-center justify-center text-orange-500 text-2xl">
                    <i class="fa-solid fa-house"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Loyer Mensuel</p>
                    <h2 class="text-2xl font-bold text-gray-800 mt-2">
                        {{ $contratActif ? number_format($contratActif->loyer_mensuel, 0, ',', ' ') . ' FCFA' : '0 FCFA' }}
                    </h2>
                </div>
                <div class="w-14 h-14 rounded-xl bg-green-100 flex items-center justify-center text-green-500 text-2xl">
                    <i class="fa-solid fa-money-bill-wave"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Paiements Effectués</p>
                    <h2 class="text-2xl font-bold text-gray-800 mt-2">
                        {{ $nbPaiements }}
                    </h2>
                </div>
                <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center text-blue-500 text-2xl">
                    <i class="fa-solid fa-credit-card"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Signalements</p>
                    <h2 class="text-2xl font-bold text-gray-800 mt-2">
                        {{ $nbSignalements }}
                    </h2>
                </div>
                <div class="w-14 h-14 rounded-xl bg-red-100 flex items-center justify-center text-red-500 text-2xl">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
            </div>
        </div>

    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        <!-- historique des paiement -->
        <div class="md:col-span-2 bg-white p-6 rounded-2xl border shadow-sm">
            <h2 class="font-bold text-lg mb-4 text-gray-800">Historique de mes paiements</h2>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead>
                        <tr class="border-b bg-gray-50 text-xs font-semibold uppercase text-gray-500">
                            <th class="p-3">Mois</th>
                            <th class="p-3">Montant</th>
                            <th class="p-3">Méthode</th>
                            <th class="p-3">Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($paiements as $p)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3 font-medium text-gray-900">{{ $p->mois }}</td>
                            <td class="p-3">{{ number_format($p->montant, 0, ',', ' ') }} FCFA</td>
                            <td class="p-3">{{ $p->methode }}</td>
                            <td class="p-3">
                                <span class="px-2 py-1 rounded-full text-xs font-bold {{ $p->statut === 'valide' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ $p->statut === 'valide' ? 'Validé' : 'En attente' }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-3 text-center italic text-gray-400">Aucun paiement déclaré pour l'instant.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-6">
                Activités récentes
            </h2>

            <div class="space-y-5">

                {{-- 1. ACTIVITÉ DU CONTRAT (Reste inchangée) --}}
                @if($contratActif)
                <div class="flex gap-4">
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-500 shrink-0">
                        <i class="fa-solid fa-file-contract"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-800 font-medium">Contrat de location actif</p>
                        <span class="text-xs text-gray-400">Généré le {{ $contratActif->updated_at->format('d/m/Y') }}</span>
                    </div>
                </div>
                @else
                <div class="flex gap-4">
                    <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-500 shrink-0">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-800 font-medium">En attente d'attribution de logement</p>
                        <span class="text-xs text-gray-400">Aujourd'hui</span>
                    </div>
                </div>
                @endif

                {{-- 2. AJOUT DYNAMIQUE DES PAIEMENTS DANS L'ACTIVITÉ --}}
                @foreach($paiements as $p)
                <div class="flex gap-4">
                    {{-- Icône dynamique selon le statut du paiement (Vert si validé, Orange si en attente) --}}
                    @if($p->statut === 'valide')
                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 shrink-0">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-800 font-medium">
                            Paiement validé pour le mois de <span class="font-semibold text-gray-950">{{ $p->mois }}</span>
                        </p>
                        <span class="text-xs text-gray-400">
                            {{ number_format($p->montant, 0, ',', ' ') }} FCFA par {{ $p->methode }} • {{ $p->updated_at->format('d/m/Y à H:i') }}
                        </span>
                    </div>
                    @else
                    <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-500 shrink-0">
                        <i class="fa-solid fa-spinner fa-spin"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-800 font-medium">
                            Déclaration de paiement envoyée (<span class="text-orange-600 font-medium">En attente</span>)
                        </p>
                        <span class="text-xs text-gray-400">
                            Pour {{ $p->mois }} • {{ number_format($p->montant, 0, ',', ' ') }} FCFA • {{ $p->created_at->format('d/m/Y à H:i') }}
                        </span>
                    </div>
                    @endif
                </div>
                @endforeach

            </div>



            <div>

                {{-- 2. ÉLÉMENTS VISITES (DYNAMIQUE ET SÉCURISÉ) --}}
                @foreach($mesVisites ?? collect() as $visite)
                <div class="flex gap-4">
                    {{-- Changement de couleur d'icône selon le statut de la visite --}}
                    @if($visite->statut === 'effectuee')
                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-500 shrink-0">
                        <i class="fa-solid fa-calendar-check"></i>
                    </div>
                    @elseif($visite->statut === 'annulee')
                    <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center text-red-500 shrink-0">
                        <i class="fa-solid fa-calendar-xmark"></i>
                    </div>
                    @else
                    <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-500 shrink-0">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                    @endif

                    <div>
                        <p class="text-sm text-gray-800 font-medium">
                            Visite {{ $visite->statut === 'effectuee' ? 'confirmée' : ($visite->statut === 'annulee' ? 'annulée' : 'programmée') }}
                            <span class="text-gray-500 font-normal"> pour {{ $visite->logement->titre ?? 'un logement' }}</span>
                        </p>
                        <span class="text-xs text-gray-400">
                            Prévue le {{ \Carbon\Carbon::parse($visite->date_visite)->format('d/m/Y à H:i') }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

@endsection
