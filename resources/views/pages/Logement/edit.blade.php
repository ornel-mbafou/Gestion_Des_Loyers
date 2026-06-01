@extends('layouts.dashboard')

@section('title', 'edit-logement')

@section('content')

<div class="p-8 ml-40">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Modifier le logement
        </h1>
        <p class="text-gray-500 mt-2">
            Modifiez les informations du logement ci-dessous
        </p>
    </div>

    <div class="bg-white rounded-xl shadow p-6 max-w-2xl">

        {{-- 🚀 AFFICHAGE DES ERREURS DE VALIDATION SI BESOIN --}}
        @if ($errors->any())
        <div class="mb-5 p-4 bg-red-50 border border-red-200 text-red-600 rounded-lg text-sm">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- 🚀 ACTION DYNAMIQUE : Admin ou Gestionnaire --}}
        <form action="@if(auth()->user()->roles === 'admin') {{ route('admin.logement.update', $logement->id) }} @else {{ route('gestionnaire.logement.update', $logement->id) }} @endif"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Titre du logement
                </label>
                <input type="text"
                    name="titre"
                    value="{{ old('titre', $logement->titre) }}"
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" required>
            </div>

            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Description
                </label>
                <textarea name="description" rows="4"
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" required>{{ old('description', $logement->description) }}</textarea>
            </div>

            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Adresse
                </label>
                <input type="text"
                    name="addresse"
                    value="{{ old('addresse', $logement->addresse) }}"
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
                        value="{{ old('superficie', $logement->superficie) }}"
                        class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700">
                        Nombre de pièces
                    </label>
                    <input type="number"
                        name="nombre_pieces"
                        value="{{ old('nombre_pieces', $logement->nombre_pieces) }}"
                        class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                </div>
            </div>

            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Prix / Loyer
                </label>
                <input type="number"
                    name="prix"
                    value="{{ old('prix', $logement->prix) }}"
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" required>
            </div>

            <hr class="my-6 border-gray-200">

            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Image principale (Image 1)
                </label>
                @if($logement->image1)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $logement->image1) }}" alt="Image 1" class="w-32 h-20 object-cover rounded-lg shadow-sm border">
                    <span class="text-xs text-gray-400">Image actuelle</span>
                </div>
                @endif
                <input type="file"
                    name="image1"
                    accept="image/*"
                    class="w-full border rounded-lg px-4 py-2.5 bg-gray-50 text-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>

            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Image secondaire (Image 2)
                </label>
                @if($logement->image2)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $logement->image2) }}" alt="Image 2" class="w-32 h-20 object-cover rounded-lg shadow-sm border">
                    <span class="text-xs text-gray-400">Image actuelle</span>
                </div>
                @endif
                <input type="file"
                    name="image2"
                    accept="image/*"
                    class="w-full border rounded-lg px-4 py-2.5 bg-gray-50 text-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>

            <div class="mb-6">
                <label class="block mb-2 font-medium text-gray-700">
                    Image secondaire (Image 3)
                </label>
                @if($logement->image3)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $logement->image3) }}" alt="Image 3" class="w-32 h-20 object-cover rounded-lg shadow-sm border">
                    <span class="text-xs text-gray-400">Image actuelle</span>
                </div>
                @endif
                <input type="file"
                    name="image3"
                    accept="image/*"
                    class="w-full border rounded-lg px-4 py-2.5 bg-gray-50 text-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>

            <div class="flex gap-4">
                <button type="submit"
                    class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg transition font-medium">
                    Enregistrer les modifications
                </button>

                {{-- 🚀 BOUTON ANNULER DYNAMIQUE --}}
                <a href="@if(auth()->user()->roles === 'admin') {{ route('admin.logement.list') }} @else {{ route('gestionnaire.logement.list') }} @endif"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-lg transition font-medium text-center flex items-center">
                    Annuler
                </a>
            </div>

        </form>

    </div>

</div>

@endsection
