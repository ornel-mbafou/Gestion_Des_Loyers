@extends('layouts.app')

@section('title', 'Détails du logement')

@section('content')

<!-- HERO -->
<section class="bg-cover bg-center py-24"
    style="background-image: url('{{asset('images/maison3.jpg')}}');">

    <div class="max-w-7xl mx-auto px-4 lg:px-8 text-center">

        <div class="inline-block bg-white px-4 py-2 text-sm font-medium uppercase mb-6">
            Accueil / Detail

        </div>

        <h1 class="text-4xl lg:text-6xl font-extrabold text-white uppercase">
            Détails du logement
        </h1>

    </div>

</section>

<!-- PROPERTY DETAILS -->
<section class="py-20 bg-white">

    <div class="max-w-7xl mx-auto px-4 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <!-- LEFT CONTENT -->
            <div class="lg:col-span-2">

                <!-- Image -->
                <div class="overflow-hidden rounded-2xl mb-8 shadow-lg">

                    <img
                        src="{{ asset('images/maison2.jpg')}}"
                        alt="Villa"
                        class="w-full h-[500px] object-cover">

                </div>

                <!-- Category -->
                <span
                    class="bg-orange-100 text-orange-500 px-4 py-2 rounded-md text-sm font-semibold inline-block mb-5">
                    Villa
                </span>

                <!-- Title -->
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Villa Luxueuse à Yaoundé
                </h2>

                <!-- Address -->
                <div class="flex items-center gap-3 text-gray-500 mb-8">

                    <i class="fa-solid fa-location-dot text-orange-500"></i>

                    <span>Yaoundé, Cameroun</span>

                </div>

                <!-- Description -->
                <div class="space-y-6 text-gray-600 leading-8">

                    <p>
                        Cette villa moderne offre un cadre de vie confortable et sécurisé.
                        Elle dispose de plusieurs chambres spacieuses, d’un grand salon,
                        d’une cuisine équipée et d’un parking privé.
                    </p>

                    <p>
                        Située dans un quartier calme et accessible, cette propriété est idéale
                        pour les familles recherchant un logement haut standing.
                    </p>

                    <p>
                        Le logement bénéficie également d’un système de sécurité moderne,
                        d’un espace extérieur agréable et d’une excellente luminosité.
                    </p>

                </div>

            </div>

            <!-- SIDEBAR -->
            <div>

                <div class="bg-white rounded-2xl shadow-lg p-8 border">

                    <!-- Price -->
                    <div class="mb-8">

                        <h3 class="text-4xl font-bold text-orange-500">
                            500 000 FCFA
                        </h3>

                        <p class="text-gray-500 mt-2">
                            Prix mensuel
                        </p>

                    </div>

                    <!-- Infos -->
                    <div class="space-y-6">

                        <div class="flex items-center justify-between border-b pb-4">

                            <span class="text-gray-500">
                                Chambres
                            </span>

                            <span class="font-bold text-gray-900">
                                5
                            </span>

                        </div>

                        <div class="flex items-center justify-between border-b pb-4">

                            <span class="text-gray-500">
                                Salles de bain
                            </span>

                            <span class="font-bold text-gray-900">
                                4
                            </span>

                        </div>

                        <div class="flex items-center justify-between border-b pb-4">

                            <span class="text-gray-500">
                                Surface
                            </span>

                            <span class="font-bold text-gray-900">
                                300m²
                            </span>

                        </div>

                        <div class="flex items-center justify-between border-b pb-4">

                            <span class="text-gray-500">
                                Parking
                            </span>

                            <span class="font-bold text-gray-900">
                                Oui
                            </span>

                        </div>

                        <div class="flex items-center justify-between pb-2">

                            <span class="text-gray-500">
                                Wi-Fi
                            </span>

                            <span class="font-bold text-gray-900">
                                Disponible
                            </span>

                        </div>

                    </div>

                    <!-- Button -->
                    <a href="{{route('visit')}}"
                        class="mt-10 bg-black text-white py-4 rounded-full flex items-center justify-center gap-3 hover:bg-orange-500 transition duration-300">

                        <span
                            class="bg-orange-500 w-10 h-10 rounded-full flex items-center justify-center text-white">

                            <i class="fa-solid fa-calendar-days"></i>

                        </span>

                        Réserver une visite

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
