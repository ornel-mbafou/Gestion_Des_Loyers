@extends('layouts.app')

@section('title', 'Planifier une visite')

@section('content')

<!-- HERO -->
<section class="bg-gray-900 py-24">

    <div class="max-w-7xl mx-auto px-4 lg:px-8 text-center">

        <div class="inline-block bg-white px-4 py-2 text-sm font-medium uppercase mb-6">
            Accueil / Visite
        </div>

        <h1 class="text-4xl lg:text-5xl font-bold text-white mb-6">
            Planifier une visite
        </h1>

        <p class="text-gray-300 max-w-2xl mx-auto leading-8">
            Remplissez ce formulaire pour demander une visite d’un logement.
        </p>

    </div>

</section>

<!-- FORM SECTION -->
<section class="py-20 bg-white">

    <div class="max-w-4xl mx-auto px-4 lg:px-8">

        <div class="bg-gray-100 rounded-2xl shadow-sm p-10">

            <form action="#" method="POST" class="space-y-6">

                <!-- NOM -->
                <div>

                    <label class="block mb-2 font-medium text-gray-700">
                        Nom complet
                    </label>

                    <input type="text"
                        placeholder="Entrez votre nom"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">

                </div>

                <!-- TELEPHONE -->
                <div>

                    <label class="block mb-2 font-medium text-gray-700">
                        Téléphone
                    </label>

                    <input type="tel"
                        placeholder="Ex : +237 6 99 99 99 99"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">

                </div>

                <!-- DATE -->
                <div>

                    <label class="block mb-2 font-medium text-gray-700">
                        Date de visite
                    </label>

                    <input type="date"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        

                </div>

                <!-- MESSAGE -->
                <div>

                    <label class="block mb-2 font-medium text-gray-700">
                        Message (optionnel)
                    </label>

                    <textarea rows="5"
                        placeholder="Donnez des détails si nécessaire..."
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500"></textarea>

                </div>

                <!-- BUTTON -->
                <button type="submit"
                    class="w-full bg-black text-white py-4 rounded-full hover:bg-orange-500 transition duration-300">

                    Envoyer la demande

                </button>

            </form>

        </div>

    </div>

</section>

@endsection
