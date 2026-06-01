@extends('layouts.dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    {{-- Le titre s'adapte dynamiquement avec l'assistant global auth() et ton champ 'roles' --}}
    <h1 class="text-3xl font-black text-gray-900 mb-8">
        @if(auth()->user()->roles === 'admin')
        Supervision Globale des Contrats (Admin)
        @else
        Gestion de mes Demandes Locatives
        @endif
    </h1>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-200">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-gray-700 text-sm font-bold uppercase">
                    <th class="p-4">Locataire</th>
                    <th class="p-4">Logement</th>
                    <th class="p-4">Loyer Mensuel</th>
                    <th class="p-4">Statut</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm text-gray-600">
                @forelse($contrats as $contrat)
                <tr>
                    <td class="p-4">
                        <div class="flex flex-col">
                            {{-- Le ?-> évite le crash si le locataire est introuvable ou null --}}
                            <span class="font-bold text-gray-900">{{ $contrat->locataire?->name ?? 'Locataire inconnu' }}</span>
                            <span class="text-xs text-gray-400">{{ $contrat->locataire?->email ?? 'Pas d\'email' }}</span>
                        </div>
                    </td>
                    <td class="p-4">
                        <span class="font-medium text-gray-900">{{ $contrat->logement->titre }}</span><br>
                        <span class="text-xs text-orange-500">{{ $contrat->logement->addresse }}</span>
                    </td>
                    <td class="p-4 font-bold text-gray-900">
                        {{ number_format($contrat->loyer_mensuel, 0, ',', ' ') }} FCFA
                    </td>
                    <td class="p-4">
                        @if($contrat->statut == 'en_attente')
                        <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs font-bold">En attente</span>
                        @elseif($contrat->statut == 'actif')
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-bold">Actif (Occupé)</span>
                        @else
                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-bold capitalize">{{ $contrat->statut }}</span>
                        @endif
                    </td>
                    <td class="p-4 text-right flex justify-end gap-2">
                        @if($contrat->statut == 'en_attente')

                        {{-- CONDITION : Génération dynamique des préfixes selon la colonne 'roles' --}}
                        @php
                        $prefixRoute = auth()->user()->roles === 'admin' ? 'admin' : 'gestionnaire';
                        @endphp

                        <form action="{{ route($prefixRoute . '.contrats.valider', $contrat->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1.5 rounded text-xs font-bold transition cursor-pointer">
                                Accepter
                            </button>
                        </form>

                        <form action="{{ route($prefixRoute . '.contrats.refuser', $contrat->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded text-xs font-bold transition cursor-pointer">
                                Refuser
                            </button>
                        </form>

                        @else
                        <span class="text-xs text-gray-400 italic">Aucune action requise</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-8 text-center text-gray-400">Aucune demande ou contrat enregistré pour le moment.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
