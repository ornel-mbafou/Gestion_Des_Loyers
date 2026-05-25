{{-- resources/views/gestionnaire/dashboard.blade.php --}}

@extends('layouts.dashboard')

@section('content')

<div class="p-8 bg-gray-100 min-h-screen">

    <!-- HEADER -->
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-gray-800">
            Dashboard Gestionnaire
        </h1>

        <p class="text-gray-500 mt-2">
            Bienvenue sur votre espace de gestion GEST-IMMO
        </p>

    </div>

    <!-- CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

        <!-- CARD -->
        <div class="bg-white p-6 rounded-2xl shadow">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500 text-sm">
                        Logements
                    </p>

                    <h2 class="text-3xl font-bold text-gray-800 mt-2">
                        25
                    </h2>

                </div>

                <div class="w-14 h-14 rounded-xl bg-orange-100 flex items-center justify-center text-orange-500 text-2xl">

                    <i class="fa-solid fa-building"></i>

                </div>

            </div>

        </div>

        <!-- CARD -->
        <div class="bg-white p-6 rounded-2xl shadow">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500 text-sm">
                        Visites
                    </p>

                    <h2 class="text-3xl font-bold text-gray-800 mt-2">
                        12
                    </h2>

                </div>

                <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center text-blue-500 text-2xl">

                    <i class="fa-solid fa-calendar-check"></i>

                </div>

            </div>

        </div>

        <!-- CARD -->
        <div class="bg-white p-6 rounded-2xl shadow">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500 text-sm">
                        Locataires
                    </p>

                    <h2 class="text-3xl font-bold text-gray-800 mt-2">
                        18
                    </h2>

                </div>

                <div class="w-14 h-14 rounded-xl bg-green-100 flex items-center justify-center text-green-500 text-2xl">

                    <i class="fa-solid fa-users"></i>

                </div>

            </div>

        </div>

        <!-- CARD -->
        <div class="bg-white p-6 rounded-2xl shadow">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500 text-sm">
                        Paiements
                    </p>

                    <h2 class="text-3xl font-bold text-gray-800 mt-2">
                        2.4M FCFA
                    </h2>

                </div>

                <div class="w-14 h-14 rounded-xl bg-red-100 flex items-center justify-center text-red-500 text-2xl">

                    <i class="fa-solid fa-money-bill-wave"></i>

                </div>

            </div>

        </div>

    </div>

    <!-- TABLE + ACTIVITES -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        <!-- TABLE -->
        <div class="xl:col-span-2 bg-white rounded-2xl shadow p-6">

            <div class="flex items-center justify-between mb-6">

                <h2 class="text-xl font-bold text-gray-800">
                    Dernières visites
                </h2>

                <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-xl transition">

                    Voir tout

                </button>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr class="border-b">

                            <th class="text-left pb-4 text-gray-500">
                                Client
                            </th>

                            <th class="text-left pb-4 text-gray-500">
                                Logement
                            </th>

                            <th class="text-left pb-4 text-gray-500">
                                Date
                            </th>

                            <th class="text-left pb-4 text-gray-500">
                                Statut
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y">

                        <!-- ROW -->
                        <tr>

                            <td class="py-4">
                                Jean Dupont
                            </td>

                            <td class="py-4">
                                Appartement A12
                            </td>

                            <td class="py-4">
                                12 Juin 2026
                            </td>

                            <td class="py-4">

                                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">

                                    Confirmée

                                </span>

                            </td>

                        </tr>

                        <!-- ROW -->
                        <tr>

                            <td class="py-4">
                                Marie Claire
                            </td>

                            <td class="py-4">
                                Studio B04
                            </td>

                            <td class="py-4">
                                15 Juin 2026
                            </td>

                            <td class="py-4">

                                <span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-sm">

                                    En attente

                                </span>

                            </td>

                        </tr>

                        <!-- ROW -->
                        <tr>

                            <td class="py-4">
                                Paul Ndzi
                            </td>

                            <td class="py-4">
                                Villa C21
                            </td>

                            <td class="py-4">
                                18 Juin 2026
                            </td>

                            <td class="py-4">

                                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm">

                                    Annulée

                                </span>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

        <!-- ACTIVITES -->
        <div class="bg-white rounded-2xl shadow p-6">

            <h2 class="text-xl font-bold text-gray-800 mb-6">
                Activités récentes
            </h2>

            <div class="space-y-5">

                <!-- ITEM -->
                <div class="flex gap-4">

                    <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-500">

                        <i class="fa-solid fa-house"></i>

                    </div>

                    <div>

                        <p class="text-sm text-gray-800">
                            Nouveau logement ajouté
                        </p>

                        <span class="text-xs text-gray-500">
                            Il y a 2 heures
                        </span>

                    </div>

                </div>

                <!-- ITEM -->
                <div class="flex gap-4">

                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-500">

                        <i class="fa-solid fa-calendar-check"></i>

                    </div>

                    <div>

                        <p class="text-sm text-gray-800">
                            Nouvelle visite programmée
                        </p>

                        <span class="text-xs text-gray-500">
                            Aujourd’hui
                        </span>

                    </div>

                </div>

                <!-- ITEM -->
                <div class="flex gap-4">

                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-500">

                        <i class="fa-solid fa-money-bill-wave"></i>

                    </div>

                    <div>

                        <p class="text-sm text-gray-800">
                            Paiement reçu
                        </p>

                        <span class="text-xs text-gray-500">
                            Il y a 5 heures
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
