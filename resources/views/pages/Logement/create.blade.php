@extends('layouts.dashboard')

@section('title', 'create-logement')

@section('content')

<div class="p-8 ml-40">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Ajouter un logement
        </h1>
        <p class="text-gray-500 mt-2">
            Remplissez les informations ci-dessous pour enregistrer un nouveau logement
        </p>
    </div>

    <div class="bg-white rounded-xl shadow p-6 max-w-2xl">

        {{-- 🚀 AFFICHAGE DES ERREURS DE VALIDATION --}}
        @if ($errors->any())
        <div class="mb-5 p-4 bg-red-50 border border-red-200 text-red-600 rounded-lg text-sm">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- 🚀 DESTINATION DYNAMIQUE : Admin ou Gestionnaire --}}
        <form action="@if(auth()->user()->roles === 'admin') {{ route('admin.logement.store') }} @else {{ route('gestionnaire.logement.store') }} @endif"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Titre du logement
                </label>
                <input type="text"
                    name="titre"
                    value="{{ old('titre') }}"
                    placeholder="Ex: Bel appartement T3 au centre-ville"
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" required>
            </div>

            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Description
                </label>
                <textarea name="description" rows="4"
                    placeholder="Décrivez les spécificités du logement..."
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" required>{{ old('description') }}</textarea>
            </div>

            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Adresse
                </label>
                <input type="text"
                    name="addresse"
                    value="{{ old('addresse') }}"
                    placeholder="Numéro, rue, ville..."
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" required>
            </div>

            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Type de logement
                </label>
                <select name="type" class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                    <option value="">Choisir un type</option>
                    <option value="Appartement" {{ old('type') == 'Appartement' ? 'selected' : '' }}>Appartement</option>
                    <option value="Villa" {{ old('type') == 'Villa' ? 'selected' : '' }}>Villa</option>
                    <option value="Studio" {{ old('type') == 'Studio' ? 'selected' : '' }}>Studio</option>
                    <option value="Chambre" {{ old('type') == 'Chambre' ? 'selected' : '' }}>Chambre</option>
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5">
                <div>
                    <label class="block mb-2 font-medium text-gray-700">
                        Superficie (m²)
                    </label>
                    <input type="number"
                        name="superficie"
                        value="{{ old('superficie') }}"
                        placeholder="Ex: 75"
                        class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700">
                        Nombre de pièces
                    </label>
                    <input type="number"
                        name="nombre_pieces"
                        value="{{ old('nombre_pieces') }}"
                        placeholder="Ex: 3"
                        class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                </div>
            </div>

            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Prix / Loyer
                </label>
                <input type="number"
                    name="prix"
                    value="{{ old('prix') }}"
                    placeholder="Montant en FCFA"
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" required>
            </div>

            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Image principale (Obligatoire)
                </label>
                <input type="file"
                    name="image1"
                    accept="image/*"
                    class="w-full border rounded-lg px-4 py-2.5 bg-gray-50 text-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-500" required>
            </div>

            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Image 2 (Optionnelle)
                </label>
                <input type="file"
                    name="image2"
                    accept="image/*"
                    class="w-full border rounded-lg px-4 py-2.5 bg-gray-50 text-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>

            <div class="mb-6">
                <label class="block mb-2 font-medium text-gray-700">
                    Image 3 (Optionnelle)
                </label>
                <input type="file"
                    name="image3"
                    accept="image/*"
                    class="w-full border rounded-lg px-4 py-2.5 bg-gray-50 text-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>

            <div class="flex gap-4">
                <button type="submit"
                    class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg transition font-medium">
                    Ajouter le logement
                </button>

                <a href="@if(auth()->user()->roles === 'admin') {{ route('admin.logement.list') }} @else {{ route('gestionnaire.logement.list') }} @endif"
                    class="bg-gray-100 text-gray-600 px-6 py-3 rounded-lg hover:bg-gray-200 transition text-center flex items-center">
                    Annuler
                </a>
            </div>

        </form>

    </div>

</div>

@endsection
