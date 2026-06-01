@extends('layouts.app')

@section('title', 'Planifier une visite')

@section('content')

<section class="bg-gray-900 py-24">
    <div class="max-w-7xl mx-auto px-4 lg:px-8 text-center">
        <div class="inline-block bg-white px-4 py-2 text-sm font-medium uppercase mb-6 text-gray-800 rounded">
            Accueil / Visite
        </div>
        <h1 class="text-4xl lg:text-5xl font-bold text-white mb-6">
            Planifier une visite
        </h1>
        <p class="text-gray-300 max-w-2xl mx-auto leading-8">
            Remplissez ce formulaire pour demander une visite du logement .
        </p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 lg:px-8">
        <div class="bg-gray-100 rounded-2xl shadow-sm p-10">

            <form action="{{ route('visites.store') }}" method="POST" class="space-y-6">

                @csrf <input type="hidden" name="logement_id" value="{{ $logement->id }}">

                <div>
                    <label class="block mb-2 font-medium text-gray-700">Nom complet</label>
                    <input type="text"
                        name="nom_visiteur" value="{{ old('nom_visiteur') }}"
                        required
                        placeholder="Entrez votre nom"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">

                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700">Téléphone</label>
                    <input type="tel"
                        name="telephone_visiteur" value="{{ old('telephone_visiteur') }}"
                        required
                        placeholder="Ex : +237 6 99 99 99 99"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">

                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Adresse Email</label>
                    <input type="email" name="email_visiteur" required class="w-full border px-4 py-3 rounded-lg" placeholder="exemple@gmail.com">
                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700">Date et Heure de visite</label>
                    <input type="datetime-local" name="date_visite" value="{{ old('date_visite') }}"
                        required
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700">Message (optionnel)</label>
                    <textarea rows="5"
                        name="commentaire" placeholder="Donnez des détails si nécessaire..."
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">{{ old('commentaire') }}</textarea>
                </div>

                <button type="submit"
                    class="w-full bg-black text-white py-4 rounded-full hover:bg-orange-500 transition duration-300 font-semibold">
                    Envoyer la demande de visite
                </button>

            </form>

        </div>
    </div>
</section>

@endsection
