@extends('layouts.app')

@section('title', 'À propos')

@section('content')

<!-- HERO -->
<section class="bg-gray-900 py-24">

    <div class="max-w-7xl mx-auto px-4 lg:px-8 text-center">

        <div class="inline-block bg-white px-4 py-2 text-sm font-medium uppercase mb-6">
            Accueil / À propos
        </div>

        <h1 class="text-4xl lg:text-5xl font-bold text-white mb-6">
            À propos de GEST-IMMO
        </h1>

        <p class="text-gray-300 max-w-3xl mx-auto leading-8">
            Une plateforme simple développée dans le cadre d’un projet académique
            pour faciliter la gestion des logements et des loyers.
        </p>

    </div>

</section>

<!-- ABOUT -->
<section class="py-20 bg-white">

    <div class="max-w-6xl mx-auto px-4 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">

            <!-- IMAGE -->
            <div>

                <img
                    src="{{ asset('images/maison1.jpg')}}"
                    alt="Gestion immobilière"
                    class="rounded-2xl shadow-lg">

            </div>


            <div>

                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Notre projet
                </h2>

                <p class="text-gray-600 leading-8 mb-6">
                    GEST-IMMO est une application web conçue pour améliorer la gestion
                    des logements et des paiements des loyers.
                    Ce projet a été réalisé par des étudiants dans le but de proposer
                    une solution moderne et simple d’utilisation.
                </p>

                <p class="text-gray-600 leading-8 mb-6">
                    L’application permet de gérer les informations des logements,
                    des locataires ainsi que le suivi des paiements afin de réduire
                    les erreurs liées à la gestion manuelle.
                </p>

                <p class="text-gray-600 leading-8">
                    Grâce à cette plateforme, les utilisateurs peuvent accéder rapidement
                    aux informations importantes et mieux organiser la gestion locative.
                </p>

            </div>

        </div>

    </div>

</section>

<!-- OBJECTIFS -->
<section class="py-20 bg-gray-100">

    <div class="max-w-6xl mx-auto px-4 lg:px-8">

        <div class="text-center mb-14">

            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                Nos objectifs
            </h2>

            <p class="text-gray-600">
                Quelques objectifs principaux de notre plateforme.
            </p>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- CARD -->
            <div class="bg-white p-8 rounded-2xl shadow-sm text-center">

                <div
                    class="w-16 h-16 bg-orange-100 text-orange-500 rounded-full flex items-center justify-center mx-auto mb-5 text-2xl">

                    <i class="fa-solid fa-building"></i>

                </div>

                <h3 class="text-xl font-semibold mb-4">
                    Gestion des logements
                </h3>

                <p class="text-gray-600 leading-7">
                    Enregistrer et consulter facilement les logements disponibles.
                </p>

            </div>

            <!-- CARD -->
            <div class="bg-white p-8 rounded-2xl shadow-sm text-center">

                <div
                    class="w-16 h-16 bg-orange-100 text-orange-500 rounded-full flex items-center justify-center mx-auto mb-5 text-2xl">

                    <i class="fa-solid fa-users"></i>

                </div>

                <h3 class="text-xl font-semibold mb-4">
                    Gestion des locataires
                </h3>

                <p class="text-gray-600 leading-7">
                    Suivre les informations des locataires et leurs contrats.
                </p>

            </div>

            <!-- CARD -->
            <div class="bg-white p-8 rounded-2xl shadow-sm text-center">

                <div
                    class="w-16 h-16 bg-orange-100 text-orange-500 rounded-full flex items-center justify-center mx-auto mb-5 text-2xl">

                    <i class="fa-solid fa-money-bill-wave"></i>

                </div>

                <h3 class="text-xl font-semibold mb-4">
                    Suivi des paiements
                </h3>

                <p class="text-gray-600 leading-7">
                    Contrôler les loyers payés et identifier les impayés.
                </p>

            </div>

        </div>

    </div>

</section>

@endsection
