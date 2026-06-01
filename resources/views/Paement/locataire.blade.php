@extends('layouts.dashboard')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Mes Paiements de Loyer</h1>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-xl">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl border shadow-sm h-fit">
            <h2 class="font-bold text-lg mb-4 text-gray-800">Déclarer un paiement</h2>

            @if($contrat)
                <form action="{{ route('locataire.paiements.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="logement_id" value="{{ $contrat->logement_id }}">

                    <div>
                        <label class="block text-xs font-semibold uppercase text-gray-500 mb-1">Montant Versé (FCFA)</label>
                        <input type="number" name="montant" value="{{ $contrat->loyer_total }}" class="w-full p-2 border rounded-xl outline-none focus:border-orange-500" required>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase text-gray-500 mb-1">Pour quel mois ?</label>
                        <select name="mois" class="w-full p-2 border rounded-xl outline-none" required>
                            <option value="Janvier 2026">Janvier 2026</option>
                            <option value="Février 2026">Février 2026</option>
                            <option value="Mars 2026">Mars 2026</option>
                            <option value="Avril 2026">Avril 2026</option>
                            <option value="Mai 2026" selected>Mai 2026</option>
                            <option value="Juin 2026">Juin 2026</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase text-gray-500 mb-1">Mode de paiement</label>
                        <select name="methode" class="w-full p-2 border rounded-xl outline-none" required>
                            <option value="Orange Money">Orange Money</option>
                            <option value="MTN MoMo">MTN MoMo</option>
                            <option value="Virement Bancaire">Virement Bancaire</option>
                            <option value="Espèces">Espèces</option>
                        </select>
                    </div>

                    <button type="submit" class="w-full bg-orange-500 text-white p-2.5 rounded-xl font-semibold hover:bg-orange-600 transition">
                        Envoyer la déclaration
                    </button>
                </form>
            @else
                <p class="text-sm text-red-500 italic">Vous devez avoir un contrat actif pour déclarer un paiement.</p>
            @endif
        </div>

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
    </div>
</div>
@endsection
