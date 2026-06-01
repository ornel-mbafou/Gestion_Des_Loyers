@extends('layouts.dashboard')

@section('content')

<div class="p-8">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            {{ auth()->user()->roles === 'locataire' ? 'Mon logement actuel' : 'Liste des logements' }}
        </h1>

        {{-- BOUTON AJOUTER DYNAMIQUE : Masqué pour le locataire --}}
        @if(auth()->user()->roles === 'admin')
        <a href="{{ route('admin.logement.create') }}"
            class="bg-orange-500 text-white px-4 py-2 rounded inline-block hover:bg-orange-600 transition">
            Ajouter logement
        </a>
        @elseif(auth()->user()->roles === 'gestionnaire')
        <a href="{{ route('gestionnaire.logement.create') }}"
            class="bg-orange-500 text-white px-4 py-2 rounded inline-block hover:bg-orange-600 transition">
            Ajouter logement
        </a>
        @endif
    </div>

    <div class="bg-white mt-6 rounded shadow p-6 overflow-x-auto">

        <table class="w-full">

            <thead>
                <tr class="border-b text-gray-700">
                    <th class="text-left py-3">Image</th>
                    <th class="text-left py-3">Titre</th>
                    <th class="text-left py-3">Type</th>
                    <th class="text-left py-3">Superficie</th>
                    <th class="text-left py-3">Prix</th>
                    <th class="text-left py-3">Statut</th>
                    <th class="text-left py-3">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($logements as $logement)
                <tr class="border-b hover:bg-gray-50 transition">

                    {{-- Image --}}

                    <td class="py-4">
                        @if($logement->image1)
                        {{-- Cas 1 : C'est une image ajoutée via le formulaire (Contrôleur) --}}
                        @if(str_starts_with($logement->image1, 'logement_images/'))
                        <img src="{{ asset('storage/' . $logement->image1) }}"
                            alt="{{ $logement->titre }}"
                            class="w-16 h-12 object-cover rounded-md shadow-sm">

                        {{-- Cas 2 : C'est une image locale du Seeder (Dossier public/images) --}}
                        @else
                        <img src="{{ asset($logement->image1) }}"
                            alt="{{ $logement->titre }}"
                            class="w-16 h-12 object-cover rounded-md shadow-sm">
                        @endif
                        @else
                        <div class="w-16 h-12 bg-gray-200 text-gray-400 flex items-center justify-center text-xs rounded-md">
                            Pas d'image
                        </div>
                        @endif
                    </td>

                    {{-- Titre --}}
                    <td class="py-4 font-medium text-gray-800">
                        {{ $logement->titre }}
                    </td>

                    {{-- Type --}}
                    <td class="py-4 text-gray-600">
                        {{ $logement->type }}
                    </td>

                    {{-- Superficie --}}
                    <td class="py-4 text-gray-600">
                        {{ $logement->superficie }} m²
                    </td>

                    {{-- Prix --}}
                    <td class="py-4 font-semibold text-gray-700">
                        {{ number_format($logement->prix, 0, ',', ' ') }} FCFA
                    </td>

                    {{-- Statut --}}
                    <td class="py-4">
                        <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                            {{ $logement->statut }}
                        </span>
                    </td>

                    {{-- ACTIONS DYNAMIQUES SELON LE RÔLE --}}
                  {{-- ACTIONS AVEC ICÔNES FONT AWESOME PARFAITEMENT ALIGNÉES --}}
                    <td class="py-3 px-2 align-middle">
                        <div class="flex items-center gap-4 h-12">

                            @if(auth()->user()->roles === 'admin')
                                {{-- ICÔNES POUR L'ADMIN --}}
                                <a href="{{ route('admin.logement.detail', $logement->id) }}"
                                   class="text-green-600 hover:text-green-800 transition text-lg"
                                   title="Voir les détails">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.logement.edit', $logement->id) }}"
                                   class="text-blue-500 hover:text-blue-700 transition text-lg"
                                   title="Modifier">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a >
                                <form action="{{ route('admin.logement.delete', $logement->id) }}" method="POST" class="inline-flex m-0 p-0 items-center" onsubmit="return confirm('Voulez-vous vraiment supprimer ce logement ?');">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            class="text-red-500 hover:text-red-700 transition text-lg align-middle"
                                            title="Supprimer">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                            @elseif(auth()->user()->roles === 'gestionnaire')
                                {{-- ICÔNES POUR LE GESTIONNAIRE --}}
                                <a href="{{ route('gestionnaire.logement.detail', $logement->id) }}"
                                   class="text-green-600 hover:text-green-800 transition text-lg"
                                   title="Voir les détails">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ route('gestionnaire.logement.edit', $logement->id) }}"
                                   class="text-blue-500 hover:text-blue-700 transition text-lg"
                                   title="Modifier">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('gestionnaire.logement.delete', $logement->id) }}" method="POST" class="inline-flex m-0 p-0 items-center" onsubmit="return confirm('Voulez-vous vraiment supprimer ce logement ?');">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            class="text-red-500 hover:text-red-700 transition text-lg align-middle"
                                            title="Supprimer">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                            @else
                                {{-- BOUTON UNIQUE POUR LE LOCATAIRE (Inchangé mais propre) --}}
                                <a href="{{ route('locataire.logement.detail', $logement->id) }}"
                                    class="bg-gray-100 text-gray-700 px-3 py-1.5 rounded-lg text-xs font-medium hover:bg-gray-200 transition border border-gray-200 inline-flex items-center whitespace-nowrap">
                                    <i class="fa-solid fa-eye mr-1"></i> Consulter la fiche
                                </a>
                            @endif

                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>

@endsection
