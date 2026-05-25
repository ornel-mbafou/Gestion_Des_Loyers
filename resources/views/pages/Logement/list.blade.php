@extends('layouts.dashboard')

@section('content')

<div class="p-8">

    <h1 class="text-3xl font-bold mb-6">
        Liste des logements
    </h1>

    <a href="{{ route('logement.create') }}"
       class="bg-orange-500 text-white px-4 py-2 rounded inline-block">
        Ajouter logement
    </a>

    <div class="bg-white mt-6 rounded shadow p-6 overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="border-b text-gray-700">

                    <th class="text-left py-3">
                        Image
                    </th>

                    <th class="text-left py-3">
                        Titre
                    </th>

                    <th class="text-left py-3">
                        Type
                    </th>

                    <th class="text-left py-3">
                        Superficie
                    </th>

                    <th class="text-left py-3">
                        Prix
                    </th>

                    <th class="text-left py-3">
                        Statut
                    </th>

                    <th class="text-left py-3">
                        Actions
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($logements as $logement)

                <tr class="border-b hover:bg-gray-50 transition">

                    <td class="py-4">
                        @if($logement->image1)
                            <img src="{{ asset('storage/' . $logement->image1) }}" 
                                 alt="{{ $logement->titre }}" 
                                 class="w-16 h-12 object-cover rounded-md shadow-sm">
                        @else
                            <div class="w-16 h-12 bg-gray-200 text-gray-400 flex items-center justify-center text-xs rounded-md">
                                Pas d'image
                            </div>
                        @endif
                    </td>

                    <td class="py-4 font-medium text-gray-800">
                        {{ $logement->titre }}
                    </td>

                    <td class="py-4 text-gray-600">
                        {{ $logement->type }}
                    </td>

                    <td class="py-4 text-gray-600">
                        {{ $logement->superficie }} m²
                    </td>

                    <td class="py-4 font-semibold text-gray-700">
                        {{ number_format($logement->prix, 0, ',', ' ') }} {{-- Formatage propre du prix --}}
                    </td>

                    <td class="py-4">
                        <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                            {{ ucfirst($logement->statut) }}
                        </span>
                    </td>

                    <td class="py-4 flex gap-3 items-center">

                        <a href="{{ route('logement.detail', $logement->id) }}"
                           class="text-green-600 hover:underline">
                            Voir
                        </a>

                        <a href="{{ route('logement.edit', $logement->id) }}"
                           class="text-blue-500 hover:underline">
                            Modifier
                        </a>

                        <form action="{{ route('logement.delete', $logement->id) }}"
                              method="POST"
                              onsubmit="return confirm('Voulez-vous vraiment supprimer ce logement ?');">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="text-red-500 hover:underline">
                                Supprimer
                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection 