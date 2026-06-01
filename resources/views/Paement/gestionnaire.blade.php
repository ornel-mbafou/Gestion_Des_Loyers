@extends('layouts.dashboard')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-950 uppercase">Gestion des Paiements</h1>
        <p class="text-sm text-gray-500">Suivez, vérifiez et validez les déclarations de loyer soumises par les locataires.</p>
    </div>

    {{-- Message de succès après validation --}}
    @if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl flex items-center gap-2 shadow-sm">
        <i class="fa-solid fa-circle-check text-lg"></i>
        <p class="text-sm font-medium">{{ session('success') }}</p>
    </div>
    @endif

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
            <h2 class="font-bold text-gray-800 text-lg flex items-center gap-2">
                <i class="fa-solid fa-list-check text-orange-500"></i> Toutes les déclarations
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600 border-collapse">
                <thead>
                    <tr class="border-b bg-gray-50 text-xs font-semibold uppercase text-gray-500 tracking-wider">
                        <th class="p-4">Locataire</th>
                        <th class="p-4">Logement</th>
                        <th class="p-4">Période (Mois)</th>
                        <th class="p-4">Montant</th>
                        <th class="p-4">Méthode</th>
                        <th class="p-4">Statut</th>
                        <th class="p-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($paiements as $p)
                    <tr class="hover:bg-gray-50/80 transition duration-150">
                        <td class="p-4">
                            <div class="font-semibold text-gray-900">{{ $p->user->name }}</div>
                            <div class="text-xs text-gray-400">{{ $p->user->telephone ?? 'Pas de numéro' }}</div>
                        </td>

                        <td class="p-4">
                            <div class="font-medium text-gray-800">{{ $p->logement->titre }}</div>
                            <div class="text-xs text-gray-400 truncate max-w-[180px]">{{ $p->logement->type }}</div>
                        </td>

                        <td class="p-4 font-medium text-gray-700">
                            {{ $p->mois }}
                        </td>

                        <td class="p-4 font-bold text-gray-900 text-base">
                            {{ number_format($p->montant, 0, ',', ' ') }} <span class="text-xs font-normal text-gray-500">FCFA</span>
                        </td>

                        <td class="p-4">
                            <span class="px-2.5 py-1 bg-gray-100 border border-gray-200 rounded-lg text-xs font-medium text-gray-700">
                                {{ $p->methode }}
                            </span>
                        </td>

                        <td class="p-4">
                            @if($p->statut === 'valide')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-bold">
                                <span class="w-1.5 h-1.5 bg-green-600 rounded-full"></span> Validé
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-bold">
                                <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full"></span> En attente
                            </span>
                            @endif
                        </td>

                        <td class="p-4 text-center">
                            @if($p->statut === 'en_attente')
                            {{-- Formulaire sécurisé pour valider le paiement --}}
                            <form action="{{ route('gestionnaire.paiements.valider', $p->id) }}" method="POST" onsubmit="return confirm('Avez-vous bien vérifié votre compte ? Confirmer la réception de ce paiement ?')">
                                @csrf
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs px-4 py-2.5 rounded-xl shadow-sm transition duration-150 flex items-center justify-center gap-2 mx-auto whitespace-nowrap">
                                    <i class="fa-solid fa-check"></i>
                                    <span>Valider</span>
                                </button>
                            </form>
                            @else
                            <span class="text-xs text-gray-400 italic">
                                <i class="fa-solid fa-circle-check text-green-500"></i> Aucun traitement requis
                            </span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="p-8 text-center italic text-gray-400 bg-gray-50/50">
                            Aucune déclaration de paiement n'a été soumise pour le moment.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
