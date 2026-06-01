@extends('layouts.dashboard')

@section('title', 'Gestion des Visites')

@section('content')
<div class="max-w-7xl mx-auto px-4 lg:px-8 py-12 mt-10">
    <h1 class="text-3xl font-bold text-gray-950 mb-8 uppercase">
        {{ auth()->user()->roles === 'locataire' ? 'Mes demandes de visites' : 'Demandes de visites reçues' }}
    </h1>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-gray-600 text-sm font-semibold">
                    <th class="p-5">Visiteur</th>
                    <th class="p-5">Téléphone</th>
                    <th class="p-5">Logement ciblé</th>
                    <th class="p-5">Date & Heure</th>
                    <th class="p-5">Statut</th>
                    {{-- On cache l'en-tête Actions pour le locataire --}}
                    @if(auth()->user()->roles !== 'locataire')
                        <th class="p-5 text-center">Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                @forelse($visites as $visite)
                <tr>
                    <td class="p-5 font-semibold text-gray-900">{{ $visite->nom_visiteur }}</td>

                    <td class="p-5">{{ $visite->telephone_visiteur }}</td>

                    <td class="p-5">
                        <span class="font-medium text-orange-500">{{ $visite->logement->titre ?? 'Logement inconnu' }}</span>
                        <br><span class="text-xs text-gray-400">{{ $visite->logement->addresse ?? '' }}</span>
                    </td>

                    <td class="p-5 font-medium">{{ date('d/m/Y à H:i', strtotime($visite->date_visite)) }}</td>

                    <td class="p-5">
                        @if($visite->statut == 'en_attente')
                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold capitalize">En attente</span>
                        @elseif($visite->statut == 'effectuee')
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold capitalize">Confirmée</span>
                        @else
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold capitalize">Annulée</span>
                        @endif
                    </td>

                    {{-- Section d'actions : Visible uniquement par l'admin et le gestionnaire --}}
                    @if(auth()->user()->roles !== 'locataire')
                    <td class="p-5 text-center">
                        @if($visite->statut == 'en_attente')
                        <div class="flex items-center justify-center gap-4">

                            <form action="{{ route('gestionnaire.visites.accepter', $visite->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                    title="Accepter la visite"
                                    class="w-9 h-9 rounded-xl bg-green-50 hover:bg-green-100 text-green-600 flex items-center justify-center transition duration-200 shadow-sm border border-green-100 cursor-pointer">
                                    <i class="fa-solid fa-check text-lg"></i>
                                </button>
                            </form>

                            <form action="{{ route('gestionnaire.visites.refuser', $visite->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                    title="Refuser la visite"
                                    class="w-9 h-9 rounded-xl bg-red-50 hover:bg-red-100 text-red-600 flex items-center justify-center transition duration-200 shadow-sm border border-red-100 cursor-pointer">
                                    <i class="fa-solid fa-xmark text-lg"></i>
                                </button>
                            </form>

                        </div>
                        @else
                        <span class="text-gray-400 italic bg-gray-50 px-3 py-1 rounded-lg border border-gray-100">
                            Traité
                        </span>
                        @endif
                    </td>
                    @endif
                </tr>
                @empty
                <tr>
                    {{-- On ajuste le colspan dynamiquement (5 colonnes pour le locataire, 6 pour les autres) --}}
                    <td colspan="{{ auth()->user()->roles === 'locataire' ? 5 : 6 }}" class="p-10 text-center text-gray-500 font-medium">
                        Aucune demande de visite pour le moment.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
