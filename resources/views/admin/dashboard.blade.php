@extends('layouts.dashboard')
@section('title', 'Admin - Dashboard')

@section('content')

<div class="p-8 bg-gray-100 min-h-screen">

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Dashboard
        </h1>
    
        <p class="text-gray-500 mt-1">
            Bienvenue sur le tableau de bord GEST-IMMO, <span class="font-semibold text-gray-700">{{ auth()->user()->name }}</span>
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">

        <div class="bg-white rounded-2xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Total Logements</p>
                    <h2 class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $totalLogements ?? 0 }}
                    </h2>
                </div>
                <div class="w-14 h-14 rounded-xl bg-orange-100 flex items-center justify-center text-orange-500 text-2xl">
                    <i class="fa-solid fa-building"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Locataires</p>
                    <h2 class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $totalLocataires ?? 0 }}
                    </h2>
                </div>
                <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center text-blue-500 text-2xl">
                    <i class="fa-solid fa-users"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Revenus</p>
                    <h2 class="text-3xl font-bold text-gray-800 mt-2">
                        {{ number_format($totalRevenus ?? 0, 0, ',', ' ') }} FCFA
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
                    <p class="text-gray-500 text-sm">Loyers Impayés</p>
                    <h2 class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $loyersImpayes ?? 0 }}
                    </h2>
                </div>
                <div class="w-14 h-14 rounded-xl bg-red-100 flex items-center justify-center text-red-500 text-2xl">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
            </div>
        </div>

    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        <div class="xl:col-span-2 bg-white rounded-2xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-800">
                    Paiements récents
                </h2>
                @if(($paiementsRecents ?? collect())->isNotEmpty())
                    <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-xl text-sm transition cursor-pointer">
                        Voir tout
                    </button>
                @endif
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b text-sm text-gray-500 font-medium">
                            <th class="pb-4">Locataire</th>
                            <th class="pb-4">Logement</th>
                            <th class="pb-4">Montant</th>
                            <th class="pb-4">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y text-sm text-gray-600">
                        @forelse($paiementsRecents ?? collect() as $paiement)
                            <tr>
                                <td class="py-4 font-medium text-gray-800">{{ $paiement->user->name }}</td>
                                <td class="py-4">{{ $paiement->logement->titre }}</td>
                                <td class="py-4 font-semibold">{{ number_format($paiement->montant, 0, ',', ' ') }} FCFA</td>
                                <td class="py-4">
                                    @if($paiement->statut === 'paye')
                                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-bold">Payé</span>
                                    @else
                                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-bold">Impayé</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-8 text-center text-gray-400 italic">
                                    Aucun paiement récent enregistré.
                                </td>
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
                <div class="flex gap-4">
                    <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-500">
                        <i class="fa-solid fa-house"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-800 font-medium">Suivi du parc immobilier</p>
                        <span class="text-xs text-gray-400">{{ $totalLogements ?? 0 }} logements enregistrés au total.</span>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-500">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-800 font-medium">Communauté</p>
                        <span class="text-xs text-gray-400">{{ $totalLocataires ?? 0 }} locataires actifs sur la plateforme.</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
